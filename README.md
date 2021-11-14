# Blog video juegos

## Comenzando 🚀

Nuestra idea es crear un blog que vaya sobre videojuegos en general. Dondé incluiremos funciones para que los usuarios puedan hacer login, posts y puedan ver sus perfiles, también habrá un formulario de contacto a la empresa. En la parte de posts que haya comentarios. Y en la parte del perfil del usuario que el usuario pueda modificar sus datos, ver sus posts, y pueda eliminar su cuenta si el usuario lo desea. 

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

### Run project detach
```
docker-compose up -d
```
### Install dependencies 
```
docker exec blog-php composer install
```
### Open container bash
```
docker exec -ti blog-php bash
```
### Run test
```
docker exec blog-php ./vendor/bin/phpunit tests/
```
```
docker exec blog-php ./vendor/bin/phpunit tests/ --filter=testFunction
```
### Run Generate code coverage
Per veure el coverage de la aplicació, hi ha una carpeta Coverage que tenen arxius HTML sobre el code coverage.
```
docker exec -ti blog-php bash

XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-html coverage
```
