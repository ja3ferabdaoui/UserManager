 

 
## System Requirements
- PHP > 7.0
- PHP Extensions: PDO, cURL, Mbstring, Tokenizer, Mcrypt, XML, GD

## Installation
1. Install Composer using detailed installation instructions [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
2. Clone repository
```
$ git clone https://github.com/ja3ferabdaoui/UserManager.git
```
4. Change into the working directory
```
$ cd usermanager
```
5. Copy `.env.example` to `.env` and modify according to your environment
```
$ cp .env.example .env
```
6. Install composer dependencies
```
$ composer install --prefer-dist
```
7. An application key can be generated with the command
```
$ php artisan key:generate
```
8. Run these commands to create the tables within the defined database 
```
$ php artisan migrate 
```

## Run

To start the PHP built-in server
```
$ php artisan serve --port=8000

