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
}
?>
