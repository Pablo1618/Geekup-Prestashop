import itertools
import os
import re
import time
from concurrent.futures import as_completed

from selenium.webdriver import ActionChains
from selenium.webdriver.edge import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC

from unidecode import unidecode

import requests
from bs4 import BeautifulSoup
import concurrent.futures

from tqdm import tqdm

siteURL = "https://geekup.pl"
threadNum = 5

session = requests.Session()

### This is geekup's robots.txt
# User-agent: *
# Crawl-delay: 1
# Request-rate: 1/1s




def categoryCrawlHelper(parentName, currentLi):
    categoriesHere = []

    try:
        thisTitle = currentLi.find_element(By.TAG_NAME, "a").get_attribute('title')
        if thisTitle is None:
            thisTitle = ""

        categoriesHere.append(parentName + "|" + thisTitle)
    except:
        pass

    try:
        currentUl = currentLi.find_element(By.TAG_NAME, "ul")

        if currentUl is not None:
            ulChildren = currentUl.find_elements(By.TAG_NAME, 'li')

            for child in ulChildren:
                #we skip those categories because they have nothing inside, annoying as all hell
                categoriesThere = categoryCrawlHelper(thisTitle, child)
                categoriesHere.extend(categoriesThere)
    except:
        pass



    return categoriesHere




def getAllCategories():
    driver = webdriver.WebDriver()
    driver.get("https://geekup.pl/zakupy-wedlug-kategorii.html")

    consentButton = WebDriverWait(driver, 20).until(EC.element_to_be_clickable((By.CSS_SELECTOR, '.btn.btn-red.js__accept-all-consents')))
    consentButton.click()


    standard = driver.find_element(By.CSS_SELECTOR, ".innerbox.current_parent")

    #now we need to expand all categories since they are not loaded automatically :(
    #furthermore, expanding one category can expand more, so we need to just keep getting the next one

    while True:
        try:
            submenu = WebDriverWait(driver, 3).until(
                EC.element_to_be_clickable((By.CSS_SELECTOR, '.wce_submenu-trigger:not(.wce_close)')))
            submenu.click()
        except:
            break

    categories = []
    for li in standard.find_elements(By.TAG_NAME, 'li'):
        categories.extend(categoryCrawlHelper("", li))




    return categories

def scrapeProduct(link):
    try:
        pageContent = session.get(link)
        html = BeautifulSoup(pageContent.text, "html.parser")

        name = html.find('h1', attrs={"class": "name"}).get_text(strip = True)
        price = html.find('em', attrs={"class": "main-price"}).get_text(strip = True)
        brand = html.find('meta', attrs={"itemprop": "brand"})['content']

        availabilityDiv = html.find('div', attrs={"class": "row availability"})
        availability = availabilityDiv.find('span' ,attrs={"class": "second"}).get_text(strip = True)

        deliveryDiv = html.find('div', attrs={"class": "delivery"})
        delivery = deliveryDiv.find('span', attrs={"class": "second"}).get_text(strip = True)

        innerSmallGalleryList = html.find('div', attrs={"class":"innersmallgallery"})
        imageLinksElements = innerSmallGalleryList.findAll("a")

        folder = f'images/{name}'
        if not os.path.exists(folder):
            os.makedirs(folder)


        for imageLinkElement in imageLinksElements:
            imageLink = siteURL + imageLinkElement['href']

            fileName = imageLinkElement['href'].split('/')[-1]

            dataOfImage = session.get(imageLink).content
            with open(f'{folder}/{fileName}', 'wb') as handler:
                handler.write(dataOfImage)




        allCategories = [brand]
        categoryMetas = html.findAll("meta", attrs={"itemprop": "category"})

        descriptionHolder = html.find("div", attrs={"itemprop": "description"})
        description = str(descriptionHolder)


        for meta in categoryMetas:
            allCategories.append(meta['content'])




        #stuff for the categories:
        # one is the brand, and the other is from the category tag

        #we are using brand twice here (wasting space) for simplicity later.
        productJSON = {
            "name": name,
            "price": price.replace('\xa0', ''),
            "brand": brand,
            "availability": availability,
            "delivery": delivery,
            "description": description,
            "categories": allCategories,

        }

        return productJSON

    except  Exception as error:
        pass

def scrapeProductsPage(pageLink):

    pageContent = session.get(pageLink)
    html = BeautifulSoup(pageContent.text, "html.parser")

    productsLinks = html.findAll('a', attrs={"class": "prodimage"})
    productPages = []

    for link in productsLinks:
        href = link['href']
        productPages.append(siteURL + href)

    with tqdm(total=len(productPages), desc=f"Progress of {pageLink}", position=0) as pageProgress:
        with concurrent.futures.ThreadPoolExecutor(max_workers=threadNum) as executor:
            results = []
            resultFutures = [executor.submit(scrapeProduct, productLink) for productLink in productPages]
            for future in as_completed(resultFutures):
                pageProgress.update(1)
                results.append(future.result())



    return results

def saveProductsInfo(products):
    with open('products.csv', 'w') as file:
        # name, price, brand, availability, delivery, description, categories

        header = "ID;Active (0/1);Name *;Categories (x,y,z...);Wholesale price;Brand;Delivery;Availability;Description"

        file.write(header + '\n')

        for product in products:
            if product is None:
                continue
            else:
                isActive = 1
                productName = product['name']

                categories = "("
                for category in product['categories']:
                    categories+=category + ","

                categories = categories[:-1]
                categories += ')'

                price = product['price']
                brand = product['brand']
                delivery = product['delivery']
                availability = product['availability']
                description = product['description'].replace("\n", "")

                thisLine = f";{isActive};{productName};{categories};{price};{brand};{delivery};{availability};{description}"
                file.write(thisLine + '\n')


def scrapeAllProducts():
    link = siteURL + "/zakupy-wedlug-kategorii.html"
    pageContent = session.get(link)
    html = BeautifulSoup(pageContent.text, "html.parser")

    paginator = html.find('ul', attrs={"class":"paginator"})
    pagesHere = paginator.findAll('a')

    lastPageNum = 0
    for page in pagesHere:
        try:
            href = page['href']
            num = int(href.split('/')[-1])
            if num > lastPageNum:
                lastPageNum = num
        except:
            pass

    pageUrls = [f"{link}/{i}" for i in range(1, lastPageNum + 1)]
    with concurrent.futures.ThreadPoolExecutor(max_workers=threadNum) as executor:
        promisedResults = executor.map(scrapeProductsPage, pageUrls)
        results = list(itertools.chain.from_iterable(promisedResults))


    saveProductsInfo(results)



def fixCategoryURL(url):
    split = []
    if "|" in url:
        split = url.split("|")
    else:
        split = [url]

    fixedParts = []

    for part in split:
        part = part.strip()
        part = part.replace(' ', '-')
        part = part.lower()
        #this is just regex that should leave only alphanumeric stuff + '-'
        part = unidecode(part)
        part = re.sub(r'[^a-z0-9\s-]', '', part)
        fixedParts.append(part)

    finalURL = '/'.join(fixedParts)

    if finalURL[0] != '/':
        finalURL = "/" + finalURL

    return finalURL

def scrapeCategories():
    categories = getAllCategories()
    print(categories)
    with open('categories.csv', 'w') as file:
        header = "ID;Active (0/1);Name *;Parent category;Root category (0/1);URL rewritten"

        file.write(header + '\n')

        for category in categories:
            isActive = 1

            categoryName = re.sub(r'/', '', category)

            parentCategoryName = categoryName.split("|")
            if len(parentCategoryName) <= 1:
                parentCategoryName = "Home"
            else:
                parentCategoryName = parentCategoryName[-2].title()

            categoryName = categoryName.split("|")[-1].title()

            categoryName = re.sub(r'\|', '', categoryName)
            parentCategoryName = re.sub(r'\|', '', parentCategoryName)

            isRoot = 0

            newUrl = fixCategoryURL(category.split("/")[-1])

            thisLine = f";{isActive};{categoryName};{parentCategoryName};{isRoot};{newUrl}"
            file.write(thisLine + '\n')


def scrapeEverything():
    scrapeCategories()
    scrapeAllProducts()



startTime = time.time()

scrapeAllProducts()

endTime = time.time()

howMuchTimePassed = endTime - startTime
print(f"Total time taken: {howMuchTimePassed:.2f} seconds")
