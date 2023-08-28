<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/views/';

switch ($request) {
    case '':
    case '/':
        require __DIR__ . '/fake.php';
        break;

    case '/bypass':
        require __DIR__ . '/bypass.php';
        break;
  
    case '/debug':
        require __DIR__ . '/debug.php';
        break;
  case '/stage-1.php':
        require __DIR__ . '/stage-1.php';
        break;
  case '/setcookies.php':
        require __DIR__ . '/setcookies.php';
        break;
  default:
        require __DIR__. '/error.php';
}
?>
