# Loan Management App

<!-- [![Build Status](https://img.shields.io/travis/gothinkster/laravel-realworld-example-app/master.svg)](https://travis-ci.org/gothinkster/laravel-realworld-example-app) [![Gitter](https://img.shields.io/gitter/room/realworld-dev/laravel.svg)](https://gitter.im/realworld-dev/laravel) [![GitHub stars](https://img.shields.io/github/stars/gothinkster/laravel-realworld-example-app.svg)](https://github.com/gothinkster/laravel-realworld-example-app/stargazers) [![GitHub license](https://img.shields.io/github/license/gothinkster/laravel-realworld-example-app.svg)](https://raw.githubusercontent.com/gothinkster/laravel-realworld-example-app/master/LICENSE) -->

> ### This a Lumen application codebase (Laravel's microframe API) containing auth, account checking, loan acquistion et cetera and adheres to standard development practices of APIs.

This repo is functionality complete — PRs and issues welcome!

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official documentation](https://laravel.com/docs/10.x)


Clone the repository

    git clone git@github.com:otim22/loan-management.git

Switch to the repo folder

    cd loan-management

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:otim22/loan-management.git
    
    cd loan-management
    
    composer install
    
    cp .env.example .env
    
    php artisan key:generate
    
    php artisan jwt:generate 
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, articles, comments, tags, favorites and follows. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**

Open the DummyDataSeeder and set the property values as per your requirement

    database/seeds/UsersTableSeeder.php

Run the database seeder and you're done

    php artisan db:seed --class=UsersTableSeeder

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh
    
The api can be accessed at [http://localhost:8000/api](http://localhost:8000).

----------

# Code overview

## Dependencies

- [jwt-auth](https://github.com/tymondesigns/jwt-auth) - For authentication using JSON Web Tokens
- [lumen-generator](https://github.com/flipboxstudio/lumen-generator) - To add any Laravel code generator on your Lumen project
- [redis](https://github.com/illuminate/redis) - To handle any application caching 
- [inspector-laravel](https://github.com/inspector-apm/inspector-laravel) - To connect your Lumen application to Inspector.

## Folders

- `app/Models` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the api controllers
- `app/Http/Middleware` - Contains the JWT auth middleware
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the api routes defined in api.php file
- `storage` - Contains all the api storage, logging details
- `tests` - Contains all the application tests

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000

Find an invite to Postman below and test the endpoints

    https://app.getpostman.com/join-team?invite_code=9f59467bbf22d370bf0b010a4b66fdb3&target_code=bcacafe6133e03ca7339a31e70d18a92

Request headers

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| Yes      	| Content-Type     	| application/json 	|
| Yes      	| X-Requested-With 	| XMLHttpRequest   	|
| Yes 	    | Authorization    	| Token {JWT}      	|

Refer the [api specification](#api-specification) for more info.

----------
 
# Authentication
 
This applications uses JSON Web Token (JWT) to handle authentication. The token is passed with each request using the `Authorization` header with `Token` scheme. The JWT authentication middleware handles the validation and authentication of the token. Please check the following sources to learn more about JWT.
 
- https://jwt.io/introduction/
- https://self-issued.info/docs/draft-ietf-oauth-json-web-token.html


----------
 
# Deployment
 
Make you install deployer on your local machine. By running the following 
    composer require --dev deployer/deployer
 
To initialize deployer in your project run:
    vendor/bin/dep init

Add next alias to your .bashrc file:
    alias dep='vendor/bin/dep'

Now lets cd into the project and run the following command:
    dep init

Check a sample of deploy script in the root project called "deploy.sample.php"

To deploy the project:
    dep deploy

Ssh to the host, for example, for editing .env file:
    dep ssh

**TL;DR command list**  

    composer require --dev deployer/deployer
    
    vendor/bin/dep init
    
    alias dep='vendor/bin/dep'
    
    dep init
    
    dep deploy

Please find the deployer documentation below here 
- https://deployer.org/docs/7.x/getting-started


----------

# Done!!

Yah! You are finally done.