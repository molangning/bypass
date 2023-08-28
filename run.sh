#!/bin/bash
export PHPRC=./php.ini 
if [ ! -f "./logs/php/php-error.log" ]; then
  touch ./logs/php/php-error.log
fi
git pull
php -S 0.0.0.0:8000 -t .