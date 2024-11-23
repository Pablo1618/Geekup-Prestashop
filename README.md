
![Logo](https://i.ibb.co/PQg4dLN/logo.jpg)


# Geekup-Prestashop

Copy of website geekup.pl in PrestaShop


## Team members

- Michał Grabowski 193314
- Patryk Sawuk 193059
- Paweł Wawrzyński 193270
- Dominika Zaorska 193266
- Filip Jezierski 196333


## How to run it locally

Firstly, you have to install Docker and Git if you dont have them already
#### Pull this repository from GitHub and then:

##### Start docker container (while being in directory with docker-compose.yml file):
```
docker compose up -d
```
##### It is possible that you will have to give access to the files:
```
sudo chmod -R 777 Geekup-Prestashop
```
[========]
#### Now you can access the website:
##### [localhost:8080](localhost:8080 "localhost:8080")
#### Also you have access to the admin panel:
##### [localhost:8080/admin2137](localhost:8080/admin2137 "localhost:8080/admin2137")


## Software versions

**Prestashop:** 1.7.8

**Selenium:** 4.26.0

**JUnit**  4.13.2

