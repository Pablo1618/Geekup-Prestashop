import csv

originalFileName = "products.csv"
newFileName = "productsWithImages.csv"

siteName = "localhost:8080/"

allRecords = []

with open(originalFileName, newline="", encoding='utf-8') as file:
    csvReader = csv.DictReader(file, delimiter=";")

    for thisRow in csvReader:
        imageUrls = thisRow['Image URLs (x,y,z...)']

        imageUrls = imageUrls.split("|")

        record = ""
        for i in range(len(imageUrls)):
            record += siteName + imageUrls[i] + "|"
        record = record[:-1]

        thisRow['Image URLs (x,y,z...)'] = record

        allRecords.append(thisRow)


with open(newFileName, mode="w", newline="", encoding='utf-8') as resultFile:
    header = allRecords[0].keys()

    csvWriter = csv.DictWriter(resultFile, fieldnames = header, delimiter=";")

    csvWriter.writeheader()
    csvWriter.writerows(allRecords)