# App Laravel para blog

## Introducción
Esta carpeta contiene la estructura de backend y frontend de laravel, así como la carga para la base de datos.


## Estructura del proyecto
La estructura está basada en MVC (Modelo Vista Controlador). Contiene la lógica de autenticación por roles y una API REST (aún en desarrollo). Además, posee una base de datos basada en MySQL, para efectos de prueba. Próximamente, se incluíran nuevas características, las cuales serán detalladas en el archivo cambios.txt (en un futuro).

## Lo nuevo
* Actualizado laravel a la versión 6.18, antes de usar este repo se recomienda respaldar trabajo de lo realizado y actualizar paquetes con el comando composer update.
* Api de usuarios ya creada y funcionando, se puede usar Postman para realizar pruebas de registro y logueo.


## Instalación y carga de datos.

Importante: Se recomienda realizar un backup de laravel en curso (estructura y base de datos), antes de copiar esta carpeta.

* Crear la base de datos 'laravel' en el administrador de base de datos de laragon.
* Copie y pegue el contenido de la carpeta backend en la raiz del proyecto.
* Copie y pegue el contenido de la carpeta frontend en la raiz del proyecto, sobreescribiendo si es necesario.
* Si es primera vez que trabajará con el proyecto, ejecutar los siguientes comandos para instalar/actualizar componentes:
	- composer install
	- composer update
* Realizar las migraciones requeridas y cargar datos de prueba con el comando: php artisan migrate:refresh --seed

## Problemas conocidos

* El registro en el sistema funciona pero no informa bien de su estado.
* Las vistas pueden no funcionar correctamente. Si usuario trata de ingresar por acceso de login, no puede ingresar. Pero sí puede si va por devinter.test/login. Falta modificar la ruta y/o mensajes necesarios. Pero aún así, permanece logueado.
* Los paquetes se encuentran desactualizados, se puede actualizar con el comando composer update.
