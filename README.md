# Blog video juegos

## Comenzando 🚀

Nuestra idea es crear un blog que vaya sobre videojuegos en general. Dondé incluiremos funciones para que los usuarios puedan hacer login, posts.

## Construido con 🛠️

* PHP7
* HTML5
* CSS3
* PhpMyAdmin
* Docker
* Compose
* PHP Unit

## Autores ✒️

```
Grupo Jueves 12.30 a 14.30
```
* **Victor Sancho Aguilera - NIU: 1529721** [estufamagica](https://github.com/estufamagica)
* **Jonathan Rojas Granda - NIU: 1533448** [jonaprg](https://github.com/jonaprg)

### 1. Step - Run project detach
```
docker-compose up -d
```
### 2. Step - Install dependencies 
```
docker exec blog-php composer install
```
### 3. Step - Run tests
```
docker exec blog-php ./vendor/bin/phpunit tests/
```
### 3.1 Step - Run specific test
```
docker exec blog-php ./vendor/bin/phpunit tests/ --filter=testFunction
```
### 4. Step - Run Generate code coverage
Per veure el coverage de la aplicació, hi ha una carpeta blog/Coverage que tenen arxius HTML sobre el code coverage.
```
docker exec -ti blog-php bash

XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-html coverage
```

### Open container bash
```
docker exec -ti blog-php bash
```
### Open web and phpmyadmin
```
localhost:8002 and localhost:8003
```
