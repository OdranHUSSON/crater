#!/bin/bash
git pull origin master
composer install
npm install
npm run prod
php artisan migrate
