import asyncio
import csv
import html
import os
import re

import aiofiles as aiofiles
import httpx as httpx
import requests
import base64
import lxml.etree as ET  # Changed to lxml

import mimetypes
from PIL import Image

# API stuff
domain = "http://localhost:8080"
key = "K1TQX9S3AMSY1DCRWCQM5UAPHCTEUYQ5"
encodedKey = base64.b64encode((key + ':').encode()).decode()
headers = {
    "Authorization": "Basic " + encodedKey,
}
xmlHeaders = {
    "Authorization": "Basic " + encodedKey,
    "Content-Type": "application/xml"
}

outputJSONSuffix = "?output_format=JSON"

# FILE NAMES
categoryInputName = "../ScrapedData/categories.csv"
productsInputName = "../ScrapedData/productsWithImages.csv"

imageFolderRelativePath = "../ScrapedData/images/"


maxAllowedTimeout = 8.0


ourIDToPrestashopID = {}
prestashopIDToOurID = {}


def getAllCategories():
    url = domain + "/api/categories" + outputJSONSuffix

    res = requests.get(url, headers=headers, timeout=maxAllowedTimeout)

    if res.status_code == 200:
        resJson = res.json()
        return resJson['categories']
    else:
        print("failed to get categories")


async def deleteCategory(client, id, semaphor):
    async with semaphor:
        if id <= 2:
            return

        baseURL = domain + "/api/categories"
        thisURL = baseURL + f"/{id}"

        res = await client.delete(thisURL, headers=headers, timeout=maxAllowedTimeout)

        if res.status_code == 200:
            print(f"category {id} deleted")


async def deleteAllCategories():
    categories = getAllCategories()
    if len(categories) <= 0:
        return

    semaphor = asyncio.Semaphore(10)
    async with httpx.AsyncClient() as asyncClient:
        deletionTasks = [deleteCategory(asyncClient, category['id'], semaphor) for category in categories]
        await asyncio.gather(*deletionTasks)


def getAllProducts():
    url = domain + "/api/products" + outputJSONSuffix

    res = requests.get(url, headers=headers, timeout=maxAllowedTimeout)
    if res.text == "[]":
        return []

    if res.status_code == 200:
        resJson = res.json()
        return resJson['products']
    else:
        print("failed to get products")


async def deleteProduct(client, id, semaphor):
    async with semaphor:
        baseURL = domain + "/api/products"
        thisURL = baseURL + f"/{id}"

        try:
            res = await client.delete(thisURL, headers=headers, timeout=maxAllowedTimeout)

            if res.status_code == 200:
                print(f"product {id} deleted")
        except:
            pass


async def deleteAllProducts():
    products = getAllProducts()
    if len(products) <= 0:
        return

    semaphor = asyncio.Semaphore(10)
    async with httpx.AsyncClient() as asyncClient:
        deletionTasks = [deleteProduct(asyncClient, product['id'], semaphor) for product in products]
        await asyncio.gather(*deletionTasks)


async def addCategory(client, category, semaphor):
    global ourIDToPrestashopID
    global prestashopIDToOurID

    async with semaphor:
        url = domain + "/api/categories"

        res = await client.post(url, data=category['xml'], headers=xmlHeaders, timeout=maxAllowedTimeout)

        if res.status_code == 200 or res.status_code == 201:
            print(f"category added")

            root = ET.fromstring(res.content)

           # print(res.content)

            prestashopID = root.find("./category/id").text

            #print(prestashopID)

            ourIDToPrestashopID[str(category['ourID'])] = str(prestashopID)
            prestashopIDToOurID[str(prestashopID)] = str(category['ourID'])




        else:
            print(res.status_code)
            print(res.text)
            print(category)


async def addCategoriesAsync(categories):
    semaphor = asyncio.Semaphore(10)
    async with httpx.AsyncClient() as asyncClient:
        addTasks = [addCategory(asyncClient, category, semaphor) for category in categories]
        await asyncio.gather(*addTasks)


async def updateCategoryParent(client, category, categoryNameData, semaphor):
    async with semaphor:
        thisID = category['id']
        url = domain + "/api/categories" + f"/{thisID}"

        for i in range(0, 2):
            res = await client.get(url, headers=headers, timeout=maxAllowedTimeout)
            if res.status_code == 200:
                break

        # Parse the response in bytes if there's an encoding declaration
        resXML = ET.fromstring(res.content)  # Use .content to get bytes, not string

        thisName = resXML.find('./category/name/language').text

        if thisName.strip() == "Home" or thisID <=2:
            return




        ourID = prestashopIDToOurID[str(thisID)]
        ourParentID = categoryNameData[str(ourID)]

        if ourParentID == "1":
            prestashopParentID = 2
        else:
            prestashopParentID = ourIDToPrestashopID[str(ourParentID)]


        activeValue = resXML.find('./category/active').text
        nameValue = resXML.find('./category/name/language').text
        isRoot = resXML.find('./category/is_root_category').text
        linkRewrite = resXML.find('./category/link_rewrite/language').text

        updateXML = f"""
            <prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
               <category>
                        <id><![CDATA[{thisID}]]></id>
                        <active><![CDATA[{activeValue}]]></active>
                        <name>
                            <language id="1"><![CDATA[{nameValue}]]></language>
                            <language id="2"><![CDATA[{nameValue}]]></language>
                        </name>
                        <id_parent><![CDATA[{prestashopParentID}]]></id_parent>
                        <is_root_category><![CDATA[{isRoot}]]></is_root_category>
                        <link_rewrite>
                            <language id="1"><![CDATA[{linkRewrite}]]></language>
                            <language id="2"><![CDATA[{linkRewrite}]]></language>
                        </link_rewrite>
                    </category>
            </prestashop>
            """

        res = await client.put(url, data=updateXML, headers=xmlHeaders, timeout=maxAllowedTimeout)

        if res.status_code == 200:
            print(f"Updated parents for {thisID}")
        else:
            print(res.status_code)
            print(res.text)


async def updateCategoryParentsAsync(categories, categoryNameData):
    semaphor = asyncio.Semaphore(10)
    async with httpx.AsyncClient() as asyncClient:
        updateTasks = [updateCategoryParent(asyncClient, category, categoryNameData, semaphor) for category in categories]
        await asyncio.gather(*updateTasks)


def addCategories():
    categories = []
    categoryNameData = {}

    with open(categoryInputName, newline='', encoding='utf-8') as file:
        csvReader = csv.DictReader(file, delimiter=';')

        for row in csvReader:

            if row.get("Name *").strip().lower() == "home":
                continue

            categories.append(
                {
                    "xml":  f"""<?xml version="1.0" encoding="UTF-8"?>
                        <prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
                            <category>
                                <active><![CDATA[{int(row.get("Active (0/1)", 0))}]]></active>
                                <name>
                                    <language id="1"><![CDATA[{row.get("Name *").strip()}]]></language>
                                    <language id="2"><![CDATA[{row.get("Name *").strip()}]]></language>
                                </name>
                                <id_parent><![CDATA[0]]></id_parent>
                                <is_root_category><![CDATA[{int(row.get("Root category (0/1)", 0))}]]></is_root_category>
                                <link_rewrite>
                                    <language id="1"><![CDATA[{row.get("URL rewritten").strip()}]]></language>
                                    <language id="2"><![CDATA[{row.get("URL rewritten").strip()}]]></language>
                                </link_rewrite>
                            </category>
                        </prestashop>
                    """,

                    "ourID": str(row.get("ID"))
                 }

               )

            categoryNameData[str(row.get("ID"))] = str(row.get("ParentID"))


    asyncio.run(addCategoriesAsync(categories))

    categories = getAllCategories()

    asyncio.run(updateCategoryParentsAsync(categories, categoryNameData))


def preserveCData(thisElement):
    if thisElement.text and len(thisElement) == 0:
        thisElement.text = ET.CDATA(thisElement.text)

    for child in thisElement:
        preserveCData(child)

async def addProduct(client, product, manufacturerNameToID, semaphor):
    async with semaphor:
        url = domain + "/api/products"

        thisXML = ET.fromstring(product.encode('utf-8'))

        manufacturerIDField = thisXML.find(".//id_manufacturer")
        manufacturerID = manufacturerNameToID[manufacturerIDField.text]
        manufacturerIDField.text = str(manufacturerID)

        preserveCData(thisXML)


        product = ET.tostring(thisXML, encoding="utf-8", method="xml").decode("utf-8")


        res = await client.post(url, data=product, headers=xmlHeaders, timeout=maxAllowedTimeout)

        if res.status_code == 200 or res.status_code == 201:
            print(f"product added")
        else:
            print("\t\t" + str(res.status_code))
            print(res.text)


async def addProductsAsync(products, manufacturerNameToID):
    semaphor = asyncio.Semaphore(10)
    async with httpx.AsyncClient() as asyncClient:
        additionTasks = [addProduct(asyncClient, product, manufacturerNameToID, semaphor) for product in products]
        await asyncio.gather(*additionTasks)


async def addManufacturer(client, manufacturer_name, manufacturerNameToID, semaphore):
    async with semaphore:
        url = domain + "/api/manufacturers"
        manufacturer_xml = f"""<?xml version="1.0" encoding="UTF-8"?>
        <prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
            <manufacturer>
                <name><![CDATA[{manufacturer_name}]]></name>
                <active><![CDATA[1]]></active>
            </manufacturer>
        </prestashop>
"""

        res = await client.post(url, data=manufacturer_xml, headers=xmlHeaders, timeout=maxAllowedTimeout)

        if res.status_code == 200 or res.status_code == 201:
            print(f"Manufacturer {manufacturer_name} added.")
            resText = res.content  # Use bytes content
            resXML = ET.fromstring(resText)  # Use .content to get bytes

            manufacturerNameToID[manufacturer_name] = resXML.find(".//id").text
        else:
            print(res.status_code)
            print(res.text)


async def addManufacturersAsync(manufacturers, manufacturerNameToID):
    semaphor = asyncio.Semaphore(10)
    async with httpx.AsyncClient() as asyncClient:
        additionTasks = [addManufacturer(asyncClient, manufacturer, manufacturerNameToID, semaphor) for manufacturer in manufacturers]
        await asyncio.gather(*additionTasks)


def getAllManufacturers():
    url = domain + "/api/manufacturers" + outputJSONSuffix

    res = requests.get(url, headers=headers)
    if res.text == "[]":
        return []

    if res.status_code == 200:
        resJson = res.json()
        print(resJson)
        return resJson['manufacturers']
    else:
        print("failed to get manufacturers")


async def deleteManufacturer(client, id, semaphor):
    async with semaphor:
        baseURL = domain + "/api/manufacturers"
        thisURL = baseURL + f"/{id}"

        res = await client.delete(thisURL, headers=headers, timeout=maxAllowedTimeout)

        if res.status_code == 200:
            print(f"manufacturer {id} deleted")


async def deleteAllManufacturers():
    manufacturers = getAllManufacturers()
    if len(manufacturers) <= 0:
        return

    semaphor = asyncio.Semaphore(10)
    async with httpx.AsyncClient() as asyncClient:
        deletionTasks = [deleteManufacturer(asyncClient, manufacturer['id'], semaphor) for manufacturer in manufacturers]
        await asyncio.gather(*deletionTasks)


def addProducts():
    products = []
    manufacturers = []
    manufacturerNameToID = {}

    categoryNameToID, IDToCategoryName = asyncio.run(getCatNameToIDAndReverse())

    print(categoryNameToID)

    with open(productsInputName, newline='', encoding='utf-8') as file:
        csvReader = csv.DictReader(file, delimiter=';')

        for row in csvReader:
            name = row.get("Name *").strip()
            oldCategories = row.get("Categories (x,y,z...)").split('|')
            wholesale_price = row.get("Wholesale price").replace(",", ".").replace("zł", "")
            brand = row.get("Brand").strip()
            description = row.get("Description").strip()
            active = int(row.get("Active (0/1)", 0))
            delivery = row.get("Delivery").strip()
            availability = row.get("Availability").strip()
            image_urls = row.get("Image URLs (x,y,z...)").split('|')
            link = re.sub(r'[^a-zA-Z0-9\s]', '', name)
            link = link.replace(" ", "-")

            categories = []
            for oldCategory in oldCategories:

                #oldCategory contains ourIDs, we need to convert to presta

                prestashopID = ourIDToPrestashopID[str(oldCategory)]

                categories.append(prestashopID)






            if categories == []:
                continue


            if brand not in manufacturers:
                manufacturers.append(brand)

            thisXML = f"""<?xml version="1.0" encoding="UTF-8"?>
            <prestashop xmlns:xlink="http://www.w3.org/1999/xlink">
                <product>
                    <active><![CDATA[{active}]]></active>
                    <name>
                        <language id="1"><![CDATA[{name}]]></language>
                        <language id="2"><![CDATA[{name}]]></language>
                    </name>
                    <description>
                        <language id="1"><![CDATA[{description}]]></language>
                        <language id="2"><![CDATA[{description}]]></language>
                    </description>
                    <price><![CDATA[{wholesale_price}]]></price>
                    <wholesale_price><![CDATA[{wholesale_price}]]></wholesale_price>
                    <id_manufacturer><![CDATA[{brand}]]></id_manufacturer>
                    <available_for_order><![CDATA[1]]></available_for_order>
                    <show_price><![CDATA[1]]></show_price>
                    <delivery_in_stock>
                        <language id="1"><![CDATA[{delivery}]]></language>
                    </delivery_in_stock>
                    <available_now>
                        <language id="1"><![CDATA[{availability}]]></language>
                    </available_now>
                    <link_rewrite>
                        <language id="1"><![CDATA[{link}]]></language>
                    </link_rewrite>
                    <id_category_default><![CDATA[{categories[0]}]]></id_category_default>
                    <associations>
                        <categories>
                            {''.join([f"<category><id><![CDATA[{categoryID}]]></id></category>" for categoryID in categories])}
                        </categories>
                        <images>
                            {''.join([f"<image><url><![CDATA[{url}]]></url></image>" for url in image_urls])}
                        </images>
                    </associations>
                    <state><![CDATA[1]]></state>

                </product>
            </prestashop>"""

            products.append(thisXML)

    asyncio.run(deleteAllManufacturers())
    asyncio.run(addManufacturersAsync(manufacturers, manufacturerNameToID))
    asyncio.run(addProductsAsync(products, manufacturerNameToID))


async def getCatNameToIDAndReverse():
    url = domain + "/api/categories?display=[id,name,id_parent]&limit=1000&offset=0"
    async with httpx.AsyncClient() as client:
        res = await client.get(url, headers=xmlHeaders, timeout=maxAllowedTimeout)

        if res.status_code == 200:
            resXML = ET.fromstring(res.content)  # Use .content to get bytes

            nameToIDDict = {}
            IDToNameDict ={}

            for category in resXML.findall(".//category"):
                categoryID = category.find("id").text
                parentID = category.find("id_parent").text
                categoryName = category.find("./name/language").text

                IDToNameDict[str(categoryID)] = categoryName

                if categoryName.strip().lower() in nameToIDDict:
                    nameToIDDict[categoryName.strip().lower()].append({"id": categoryID, "parentID": parentID})

                else:
                    nameToIDDict[categoryName.strip().lower()] = [{"id":categoryID, "parentID": parentID}]



            return nameToIDDict, IDToNameDict
        else:
            print(res.status_code)
            print(res.text)
            return None


async def getProductNameToID():
    url = domain + "/api/products?display=[id,name]&limit=10000&offset=0"
    async with httpx.AsyncClient() as client:
        res = await client.get(url, headers=xmlHeaders, timeout=maxAllowedTimeout)

        if res.status_code == 200:
            resXML = ET.fromstring(res.content)

            productDict = {}

            for product in resXML.findall(".//product"):
                productID = product.find("id").text
                productName = product.find("./name/language").text
                productDict[productName.strip().lower()] = productID

            return productDict
        else:
            print(res.status_code)
            print(res.text)
            return None


async def deleteAllImagesOfAProduct(client, id, semaphor):
    async with semaphor:
        url = str(domain) + "/api/images/products/" + str(id)

        try:

            resp = await client.get(url, headers=xmlHeaders, timeout=maxAllowedTimeout)

            if resp.status_code == 200:
                resXML = ET.fromstring(resp.content)
                images = resXML.findall(".//image")

                for img in images:
                    imageID = img.attrib['id']

                    deletionUrl = url + "/" + str(imageID)

                    deleteRes = await client.delete(deletionUrl, headers=xmlHeaders, timeout=maxAllowedTimeout)

                    if deleteRes.status_code == 200 or deleteRes.status_code == 204:
                        print("deleted image")
                    else:
                        print("\tfailed to delete iamge")
                        print(deleteRes.text)





        except Exception as e:
            print(e)


async def deleteAllImages():
    productNameDict = await getProductNameToID()

    semaphor = asyncio.Semaphore(10)

    async with httpx.AsyncClient() as client:
        allDeletionTasks = []

        for productName in productNameDict:
            id = productNameDict[productName]

            allDeletionTasks.append(deleteAllImagesOfAProduct(client, id, semaphor))

        await asyncio.gather(*allDeletionTasks)


async def addImageAsync(client, productData, semaphor):
    id = productData['id']
    name = productData['name'].replace(" ", "_")

    pathToImageFolder = os.path.join(imageFolderRelativePath, str(name))
    print(pathToImageFolder)

    if not os.path.isdir(pathToImageFolder):
        print("Couldn't find image folder")
        return

    for imageFilename in os.listdir(pathToImageFolder):
        pathToThisImage = os.path.join(pathToImageFolder, imageFilename)

        mime_type, _ = mimetypes.guess_type(pathToThisImage)

        #prestashop only supports those three
        if mime_type not in ['image/png', 'image/jpeg', 'image/gif']:
            print("Converting image to proper format!")

            try:
                with Image.open(pathToThisImage) as image:
                    newPath = os.path.splitext(pathToThisImage)[0] + ".png"
                    image.convert("RGBA").save(newPath, "PNG")
                    pathToThisImage = newPath
                    imageFilename = os.path.basename(pathToThisImage)
            except Exception as e:
                print(e)

        try:
            async with semaphor:

                async with aiofiles.open(pathToThisImage, "rb") as file:
                    imageData = await file.read()

                imageDictionary = {
                    "image": (imageFilename, imageData, "image/" + imageFilename.split(".")[-1])
                }

                uploadURL = domain + "/api/images/products/" + str(id)

                res = await client.post(uploadURL, headers=headers, files=imageDictionary)

                if res.status_code == 200:
                    print("image uploaded!")
                else:
                    print("image upload failed!")
                    print(res.status_code)
                    print(res.content)
        except Exception as e:
            print(e)




async def addImagesAsync(productDatas):
    semaphor = asyncio.Semaphore(10)
    async with httpx.AsyncClient() as asyncClient:
        additionTasks = [addImageAsync(asyncClient, productData, semaphor) for productData in productDatas]
        await asyncio.gather(*additionTasks)

def addAllImages():
    productNameToID = asyncio.run(getProductNameToID())



    productDatas = []
    with open(productsInputName, newline='', encoding='utf-8') as file:
        csvReader = csv.DictReader(file, delimiter=';')

        for row in csvReader:
            name = row.get("Name *").strip().lower()

            try:
                id = productNameToID[name]
            except Exception as e:
                #print(name)
                continue



            productDatas.append({
                "id": id,
                "name": name
            })

    asyncio.run(addImagesAsync(productDatas))


if __name__ == "__main__":

    if True:
        asyncio.run(deleteAllCategories())
        addCategories()

    if True:
        asyncio.run(deleteAllProducts())
        addProducts()

    if True:
        asyncio.run(deleteAllImages())
        addAllImages()


