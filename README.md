
![Logo](https://i.ibb.co/PQg4dLN/logo.jpg)


# Geekup-Prestashop

Copy of website https://geekup.pl/ in PrestaShop.


## Team members

- Michał Grabowski 193314
- Patryk Sawuk 193059
- Paweł Wawrzyński 193270
- Dominika Zaorska 193266
- Filip Jezierski 196333


## How to run it locally

Firstly, you have to install Docker and Git if you dont have them already.
<br>If you are using Windows you will also have to install WSL.
#### Pull this repository from GitHub and then:

(All of the scripts are located inside the *scripts* folder)
1. Start the container:
```
./run.sh
```
2. Import the database which is saved in the file *dump.sql*:
```
./import_database.sh
```


#### Now you can access the website:
https://localhost:8443/
#### Also you have access to the admin panel:
https://localhost:8443/admin2137
#### Also you can access the database by using phpMyAdmin:
http://localhost:8081
<br>
Exporting the database to *prestashop/database-dump/dump.sql*:
```
./export_database.sh
```
Stopping the container:
```
./stop.sh
```

## Software versions

**Prestashop:** 1.7.8

**Selenium:** 4.26.0

**JUnit**  4.13.2

