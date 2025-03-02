<h1>Requisitos</h1>
Tienes que instalar laravel y composer
<h1>Inicializar pagina web</h1>
Para inicializar el proyecto tenemos que estar dentro de la carpeta del proyecto,
"php artisan migrate" 
para que se migren las tablas de la base de datos, si sale un fallo de que no existe la base de datos hacer  lo siguiente: 
ir a localhost/phpmyadmin y ejecutar el sql create database nombre que salga en el .env
luego para rellenar las bases de datos utilizar:
"php artisan db:seed"
y para que los enlaces relativos de las imagenes funcionen en laravel ejecutaremos : 
"php artisan storage:link"
y para poner la pagina up ejecutamos :
"php artisan serve"