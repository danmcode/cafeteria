<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

#DEMO DE LA APLICACIÓN
Ingresa al siguiente link: [Cafeteria](http://67.207.82.186/ "Cafeteria")

- **Correo:** danmcode@gmail.com 
- **Contraseña:** d4ab5621

### Caracteristicas
Danmcode, necesita para unas de sus cafeterías que tiene en sede de un software, que permita almacenar y gestionar el inventario de sus productos. Este software debe permitir la creación de productos, la edición de los productos, la eliminación de productos y listar todos los productos registrados en el sistema.

### El desarrollo del proyecto se realizó usando la pila LAMP (Linux, Apache, MariaDb):

Requisitos para la ejecución del proyecto:
1. PHP 8
2. Laravel 9
3. Apache
4. MariaDB
5. Linux
6. NodeJS v18.14.2
7. Composer

Ejecución del proyecto:

Antes de iniciar ya se debe haber configurado la base de datos del proyecto y haber instalado las dependencias necesarias para que se ejecute Laravel.

1. Se debe ingresar a la carpeta raíz del proyecto y hacer una copia de las variables de entorno:

	`$ mv .env.example .env`

	Luego configurar las variables de entorno correspondientes a la base de datos y nombre de la aplicación:
	
	```bash
	APP_NAME=Cafeteria
	...
	DB_DATABASE=cafeteria
	DB_USERNAME=user
	DB_PASSWORD=password
	```
2. Luego instalar las dependencias de composer

	`$ composer install`

3. Se instalan las dependencias de NodeJS para la ejecuión del Front

	`$ npm install`
	
	3.1. Para entorno de desarrollo se ejecutan los siguientes comandos:
	`$ npm run dev`
	
	`$ php artisan serve`
	
	 3.1. Para compilar el front de la App en produción se ejecuta:
	 
	`$ npm run build`
	
4. Gererar las migraciones de la base de datos: 

	`$ php artisan migrate`
	
5. Gereal la llave con la que se cifraran las peticiones: 

	`$ php artisan key:generate`

### Consultas SQL
#### Consulta que permita conocer cuál es el producto que más stock tiene.
```bash
SELECT 
cafeteria.products.name AS producto,
cafeteria.products.stock
FROM cafeteria.products
ORDER BY stock DESC
LIMIT 1;
```

#### Consulta que permita conocer cuál es el producto más vendido.
```bash
SELECT 
A.product_id AS id_producto,
B.name AS producto_mas_vendido,
SUM(A.amount) AS total_ventas
FROM cafeteria.sold_products A
JOIN cafeteria.products B
ON A.product_id = B.id
GROUP BY A.product_id
ORDER BY A.amount DESC
```
###End