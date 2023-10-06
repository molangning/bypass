#!/bin/bash
# env variables
export PHPRC=./php.ini 

# functions

# funntion confirm
# takes two arguments, prompt string and default condition.
function confirm() {

  default="Y"
  q_string="[Y/n]"

  case "$2" in 
  
    no)
      default="n"
      q_string="[y/N]"
      ;;

    *)
      default="y"
      q_string="[Y/n]"
      ;;
  esac

  #change prompt
  read -r -p "$1 $q_string: " response
  case "$response" in
  
    "")
      if [$default == "y"]; then
        true
      else
        false
      fi
      ;;
      
    [yY][eE][sS]|[yY]) 
      true
      ;;
          
    [nN][oO]|[nN])
      false
      ;;
      
    *)
      false
      ;;
  esac

}

if [ ! -f ".setup_done" ]; then
  if confirm "Do you want to use the development branch?" n; then
    git pull
    git checkout dev
  fi
  touch .setup_done
fi

if [ ! -f "./logs/php/php-error.log" ]; then
  touch ./logs/php/php-error.log
fi
git pull
php -S 0.0.0.0:8000 -t .