#!/bin/bash
#! Limpa chace laravel

php artisan cache:clear & php artisan config:cache

