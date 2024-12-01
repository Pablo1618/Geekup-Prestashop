import itertools
import json
import os
import re
import shutil
import time
from concurrent.futures import as_completed, ThreadPoolExecutor
import random

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
threadNum = 6

session = requests.Session()

### This is geekup's robots.txt
# User-agent: *
# Crawl-delay: 1
# Request-rate: 1/1s


categoryPageLinks = []


#this is a simple dict mapping href to product data
#this is needed because GEEK-UP is written like ****, and I absolutely ******* hate it.
productDictionary = {

}

imageResultPromises =[]

idCounter = 1

def getNewID():
    global idCounter

    idCounter+=1

    return idCounter


#No idea if this actually helps, but supposedly this was a popular exploit sometime ago, so might help
def getRandomIP():
    return f"{random.randint(1, 255)}.{random.randint(1, 255)}.{random.randint(1, 255)}.{random.randint(1, 255)}"

def getCustomHeaders():
    return {
        'X-Forwarded-Host': siteURL,
        'X-Forwarded-For': getRandomIP(),
        'X-Real-IP': getRandomIP(),
        "Referer": "https://www.google.com/",
        'User-Agent': random.choice([
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36',
        ])
    }



def categoryCrawlHelper(parentName, currentLi, lastID):
    global categoryPageLinks

    categoriesHere = []

    try:
        element = currentLi.find_element(By.TAG_NAME, "a")
        thisTitle = element.get_attribute('title')

        idHere = getNewID()
        if thisTitle is None:
            thisTitle = ""
        else:
            categoryPageLinks.append(
                {
                    "href":element.get_attribute("href"),
                    "name": thisTitle,
                    "parentName": parentName,
                    "id": idHere,
                    "parentID": lastID
                }
            )
            categoriesHere.append(parentName + "|" + thisTitle)
    except:
        pass

    try:
        currentUl = currentLi.find_element(By.TAG_NAME, "ul")

        if currentUl is not None:
            ulChildren = currentUl.find_elements(By.XPATH, './li')

            for child in ulChildren:
                categoriesThere = categoryCrawlHelper(thisTitle, child, idHere)
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
            submenu = WebDriverWait(driver, 7).until(
                EC.element_to_be_clickable((By.CSS_SELECTOR, '.wce_submenu-trigger:not(.wce_close)')))
            submenu.click()
        except:
            break

    categories = []

    ul = standard.find_element(By.XPATH, './ul')
    #get only children of standard
    for li in ul.find_elements(By.XPATH, './li'):

        categories.extend(categoryCrawlHelper("Home", li, 1))




    return categories

def downloadImage(imageLink, folder):
    try:
        fileName = imageLink.split('/')[-1]
        dataOfImage = session.get(imageLink, headers=getCustomHeaders(), timeout=10).content
        with open(f'{folder}/{fileName}', 'wb') as file:
            file.write(dataOfImage)
    except:
        pass

def scrapeProduct(fullURL, id):
    global productDictionary



    try:


        pageContent = session.get(fullURL, headers=getCustomHeaders(), timeout=10)
        html = BeautifulSoup(pageContent.content, "lxml")

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

        imageLinks = [siteURL + element['href'] for element in imageLinksElements]

        with ThreadPoolExecutor(max_workers=threadNum) as executor:
            imageResultPromises.extend([executor.submit(downloadImage, imageLink, folder) for imageLink in imageLinks])



        descriptionHolder = html.find("div", attrs={"itemprop": "description"})
        description = str(descriptionHolder)



        imageUrls = []

        for link in imageLinks:
            imageUrls.append(link.split('/')[-1].replace(" ", "_"))

        categoryIDs = [id]

        #we are using brand twice here (wasting space) for simplicity later.
        productJSON = {
            "name": name,
            "price": price.replace('\xa0', ''),
            "brand": brand,
            "availability": availability,
            "delivery": delivery,
            "description": description,
            "categoryIDs": categoryIDs,
            "imageUrls":imageUrls,
            "url": fullURL,


        }

        if fullURL in productDictionary:
            if id not in productDictionary[fullURL]['categoryIDs']:
                productDictionary[fullURL]['categoryIDs'].append(id)
                print("\t in scrapingOneProduct")
                print(productDictionary[fullURL]['categoryIDs'])
        else:
            productDictionary[fullURL] = productJSON

        return productJSON

    except  Exception as error:
        pass

def scrapeProductsPage(pageLink, id):
    global productDictionary

    try:
        pageContent = session.get(pageLink, headers=getCustomHeaders(), timeout=10)
        html = BeautifulSoup(pageContent.text, "lxml")
    except:
        return []

    productsLinks = html.findAll('a', attrs={"class": "prodimage"})
    productPages = []

    for link in productsLinks:
        href = link['href']

        fullURL = siteURL + href

        if fullURL not in productDictionary:
            productPages.append(fullURL)
        else:
            if id not in productDictionary[fullURL]['categoryIDs']:
                productDictionary[fullURL]['categoryIDs'].append(id)
                print("\t before scrapingOneProduct")
                print(productDictionary[fullURL]['categoryIDs'])


    with tqdm(total=len(productPages), desc=f"Progress of {pageLink}", position=0) as pageProgress:
        with concurrent.futures.ThreadPoolExecutor(max_workers=threadNum) as executor:
            results = []
            resultFutures = [executor.submit(scrapeProduct, productLink, id) for productLink in productPages]
            for future in as_completed(resultFutures):
                pageProgress.update(1)
                results.append(future.result())



    return results

def fixField(field):

    field = field.replace('\"','\"\"')
    # field = field.replace(';', '\";\"')

    return '\"' + field + '\"'


def saveProductsInfo(products):
    global productDictionary

    with open('products.csv', 'w',  encoding="utf-8") as file:
        # name, price, brand, availability, delivery, description, categories

        header = "ID;Active (0/1);Name *;Categories (x,y,z...);Wholesale price;Brand;Delivery;Availability;Description;Image URLs (x,y,z...)"

        file.write(header + '\n')

        for product in products:
            if product is None:
                continue
            else:
                isActive = 1
                productName = product['name']


                productHref = product['url']
                actualCategories = productDictionary[productHref]['categoryIDs']
                categories = ""


                for category in actualCategories:
                    categories+=str(category) + "|"

                categories = categories[:-1]

                fixString = '\"'

                price = fixField(product['price'])
                brand =  fixField(product['brand'])
                delivery = fixField(product['delivery'])
                availability = fixField(product['availability'])
                description = fixField(product['description'])


                imageUrls = fixString

                for imageUrl in product['imageUrls']:
                    imageUrls += ("images/"+productName+"/" + imageUrl + "|").replace(" ", "_")
                imageUrls = imageUrls[:-1] + fixString


                thisLine = f';{isActive};{productName};{categories};{price};{brand};{delivery};{availability};{description};{imageUrls}'
                file.write(thisLine + '\n')

                print(thisLine)


def scrapeOneCategory(categoryData):
    link = categoryData['href']

    print(categoryData)
    print(categoryData['name'])

    try:

        pageContent = session.get(link, headers=getCustomHeaders(), timeout=10)
    except:
        return []
    html = BeautifulSoup(pageContent.text, "lxml")

    paginator = html.find('ul', attrs={"class": "paginator"})
    if paginator is None:
        #only this one page exists
        pageUrls = [link]
    else:
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
        promisedResults = executor.map(scrapeProductsPage, pageUrls, itertools.repeat(categoryData['id']))
        results = list(itertools.chain.from_iterable(promisedResults))

    return results


def scrapeAllProducts():
    results = []

    for data in categoryPageLinks:
        results.extend(scrapeOneCategory(data))

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

    finalURL = ''.join(fixedParts)

    return finalURL

def scrapeCategories():
    categories = getAllCategories()
    #print(categories)
    with open('categories.csv', 'w',  encoding="utf-8") as file:
        header = "ID;Active (0/1);Name *;Parent category;Root category (0/1);URL rewritten;ParentID"

        id = 0
        parentID =0

        file.write(header + '\n')

        thisLine = f"0;1;Home;;1;"
        file.write(thisLine + '\n')

        # categoryPageLinks.append(
        #     {
        #         "href": element.get_attribute("href"),
        #         "name": thisTitle,
        #         "parentName": parentName,
        #         "id": getNewID(),
        #         "parentID": lastID
        #     }
        # )

        for category in categoryPageLinks:
            isActive = 1

            categoryName = re.sub(r'/', '', category['name'])
            parentCategoryName = category['parentName']


            categoryName = re.sub(r'\|', '', categoryName)
            parentCategoryName = re.sub(r'\|', '', parentCategoryName)

            isRoot = 0

            newUrl = fixCategoryURL(category['name'])

            id = category['id']
            parentID = category['parentID']

            thisLine = f"{id};{isActive};{categoryName};{parentCategoryName};{isRoot};{newUrl};{parentID}"
            file.write(thisLine + '\n')


def scrapeEverything():
    scrapeCategories()
    scrapeAllProducts()



    #ensuring we save all photos
    for imageResult in as_completed(imageResultPromises):
        try:
            imageResult.result()
        except Exception:
            pass


    fixImageFolderNames()

#this is just temporary, hopefully :)
def fixImageFolderNames():
    base = "images/"
    for folder in os.listdir(base):
        if not os.path.isdir(os.path.join(base, folder)):
            continue

        newFolderName = folder.replace(' ', '_')
        newFolderName = newFolderName.lower()

        try:
            os.rename(os.path.join(base, folder), os.path.join(base, newFolderName))
        except:
            pass

    for folder in os.listdir(base):
        if not os.path.isdir(os.path.join(base, folder)):
            continue

        if " " in folder:
            shutil.rmtree(os.path.join(base,folder))


startTime = time.time()



scrapeEverything()
#fixImageFolderNames()


endTime = time.time()

howMuchTimePassed = endTime - startTime
print(f"Total time taken: {howMuchTimePassed:.2f} seconds")
