# [Slim Framework](https://www.slimframework.com/)

[![Build Status](https://travis-ci.org/slimphp/Slim.svg?branch=3.x)](https://travis-ci.org/slimphp/Slim)
[![Coverage Status](https://coveralls.io/repos/github/slimphp/Slim/badge.svg?branch=3.x)](https://coveralls.io/github/slimphp/Slim?branch=3.x)
[![Total Downloads](https://poser.pugx.org/slim/slim/downloads)](https://packagist.org/packages/slim/slim)
[![License](https://poser.pugx.org/slim/slim/license)](https://packagist.org/packages/slim/slim)

[Slim](https://www.slimframework.com/) is a PHP micro-framework that helps you quickly write simple yet powerful web applications and APIs.

## Slim Framework 3 Skeleton Application for API's

Use this skeleton application to quickly setup and start working on a new Slim Framework 3 application. This application uses the latest Slim 3 with the PHP-View template renderer. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.


## Install the Application

Run this command from the directory in which you want to download your new Slim Framework application.

https://github.com/jhonvegamas/Slim-REST-API-Skeleton.git

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.

To run the application in development, you can run these commands 

	cd [my-app-name]
	composer install
	composer start `or` php -S localhost:80 -t public

That's it! Now go build something cool.

use app `https://[domain-server]/[route]/`


### Create Database

Import the [TEST-SCHEMA.sql](https://raw.githubusercontent.com/jhonvegamas/tools-projects/master/mysql-scripts/test-schema.sql) file.
 
Or run the following SQL script

```SQL
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `test`;

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

```
Import the [TEST-DATA.sql](https://raw.githubusercontent.com/jhonvegamas/tools-projects/master/mysql-scripts/test-data.sql) file.

<div align="center">
	<h3> Database Schema </h3>
	<a href="">
		<img src="https://raw.githubusercontent.com/jhonvegamas/tools-projects/master/img/schema-database-test.png" alt="schema">
	</a>
</div>

## Test

Use the Postman application to test the API or anyone that allows you to make requests of type GET, POST, PUT, DELETE.

URL: `https://[domain-server]/[route]/`
EXAMPLE: `https://localhost/test/` 

-or- `https://localhost/public/test/` If you do not point the virtual host document root to the new application

## :eyeglasses: Authors

  * **Jhon Vega** - *Initial work* - [Jhon Vega](https://github.com/jhonvegamas) 

See also the list of [contributors](https://github.com/jhonvegamas/Slim-REST-API-Skeleton/graphs/contributors)
 who participated in this project.

<a name="license"></a>
## :memo: License

This API is licensed under the MIT License - see the
 [MIT License](https://opensource.org/licenses/MIT) for details.
