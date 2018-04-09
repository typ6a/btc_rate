#Instalation guide.

##Overview
The following repository is a application for extraction of data on the exchange rate of Bitcoin cryptocurrency developed with PHP and the Laravel framework.

##Deploy
Server Requirements:
    PHP >= 7.1.3
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension
    Ctype PHP Extension
    JSON PHP Extension

Place all the application source code in the / directory of the server.
You can use git, svn, mecurial or whatever method you like to transfer your code to this directory.
Copy all contents inside the /public directory to / directory.
Copy .htaccess file from the public directory to the project's root folder too.
Config the application variables in the /.env.
In more detail see https://laravel.com/docs/5.5/deployment.
Also you can ran the applicaton on local vitrual web server (eg Apache).

##Database
SQLite is a database of the project. It contents 'record' named table. Plased in /database/rate.sqlite file. You do not need to tune it. 

#Usage

##Command
To run artisan command type 'rate:get' at terminal CLI (by default provider is seting to bitcoin).
To run artisan command with coindesk provider type 'rate:get coindesk' at terminal CLI. Also you can run 'rate:get bitcoin'.
Use these commands to application get data from providers and store in database.

##Page
You can see collected datf at the aplication page (a table with columns Time, USD, EUR, GBP). The pagination by the table is possible. 
To get actual bitcoin rate data press the provider corresponding button at menu.

##Log
Info about data gathering and command execution time you can see at laravel.log file.
