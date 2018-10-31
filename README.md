# ThunderStorm

## Especificación del proyecto

### 1. Introducción

* **Título del proyecto**: ThunderStorm
* **Objetivos**: 
  * Implantar la página web de una empresa de hosting de servidores de juegos.
* **Descripción**: La web consistirá en una página principal con el logo, información de la empresa y notícias, una página productos dónde podremos visualizar los diferentes servicios de hosting que ofrece, una página para registrarse cómo usuario y otra para acceder al sistema.
Una vez hayamos accedido al sistema, dispondremos de un nuevo enlace en el menú de navegación para obtener información de nuestros servidores contratados y, en caso de ser administrador, dispondremos de otras 2 páginas para gestionar los diferentes usuarios y añadir notícias a la página principal.
* **Desarrollador**: @xaviciscar
* **Dirección web en Github:** https://github.com/2ASIX2018/ThunderStorm

### 2. Diseño

La aplicación constará de una tabla para gestionar las diferentes noticias, una segunda tabla para almacenar los usuarios, una tercera para almacenar los datos de los servidores y otra para 

#### 2.1. Descripción de la base de datos

L'esquema de la base de dades és la següent:

![Base de dades](database-schema.png)

#### 2.2. Descripció de la interfície 

Les diferents pàgines de què es composarà l'aplicació seran:

* **Pàgina inicial**: Mostra les últimes notícies publicades, amb el títol, l'editor i el ressum de la notícia, més un paginador per accedir a notícies antigues.

![Pàgina principal](imgs/principal.png)

* **Post**: Quan fem clic a "Llegeix més", de la pàgina principal, accedim a una pàgina on es mostra la notícia completa. També disposarem d'un buscador per categoríes de notícies.

![Pàgina principal](imgs/post.png)

* **Formulari d'accés**: Quan un usuari registrat vol accedir a l'aplicació, ho farà a través del següent formulari:

![Pàgina principal](imgs/login.png)

* **Redacció de notícies**: Els usuaris registrats podran redactar notícies a partir del següent formulari. Per tal de formatar les notícies, farem ús de sintaxi Markdown.

![Pàgina principal](imgs/redacta.png)

* **Pàgina d'Administració**: L'usuari administrador podrà gestionar els diferents usuaris a través de la següent pàgina d'administració:

![Pàgina principal](imgs/admin.png)
ThunderStorm es el nombre que recibe de mi proyeto de Implantación de Aplicaciones Web de 2º de ASIX.
EL proyecto consistirá en la implantación de una página web cuyo contenido se distribuira según el siguiente esquema:
|                |ASCII                          |HTML                         |
|----------------|-------------------------------|-----------------------------|
|Single backticks|`'Isn't this fun?'`            |'Isn't this fun?'            |
|Quotes          |`"Isn't this fun?"`            |"Isn't this fun?"            |
|Dashes          |`-- is en-dash, --- is em-dash`|-- is en-dash, --- is em-dash|

En este repositorio subiré todo el progreso que se lleve a cabo.
