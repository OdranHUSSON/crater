#!/bin/bash
composer install
npm install
npm run prod
cp .env.example .env
php artisan key:generate
php artisan passport:keys
