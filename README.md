# Posty

## This is a project I followed from this [youtube video](https://www.youtube.com/watch?v=MFh0Fd7BsjE)

## prerequisites

- node > 10.* & npm 

- Composer

- PHP > 7.3.*

## How to install this project

after cloning this repository the first thing you need to do is to install the composer packages by running `composer install` and the node modules by running `npm i` or `npm install` in the integrated terminal in of your IDE or in a separate terminal window. After installing all the packages the first thing you need to do is changing all the values in the .env file and creating the database. After that you are ready to run the migrations to setup the database with the correct tables.

## How to run this project

To run this project you need to run 2 separate commands the first one is to start the php server and the application `php artisan serve` and the second one is `npm run watch` to automatically compile the css and js if it changes  