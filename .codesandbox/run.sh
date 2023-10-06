#!/bin/bash
# env variables
# special version for codesandbox
# no prompt
export PHPRC=./php.ini 

git checkout main
if [ ! -f "./logs/php/php-error.log" ]; then
  touch ./logs/php/php-error.log
fi
git pull
php -S 0.0.0.0:8000 -t .
