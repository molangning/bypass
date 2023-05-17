<?php
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $loc=htmlspecialchars($_GET["url"]);
    if (strlen($loc)>0){
      header("Cache-Control: no-cache, must-revalidate");
      header('Location: ' . $loc , true, 301);
      die();
    }
  }
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>redirector v1.0 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="icon" sizes="16x16" href="/favicon/16x16.png">
    <link rel="icon" sizes="32x32" href="/favicon/32x32.png">
    <link rel="icon" sizes="192x192" href="/favicon/192x192.png">
    <link rel="icon" sizes="512x512" href="/favicon/512x512.png">
    <link rel="icon" href="/favicon/favivon.ico">
    <title>redirecting</title>
    <meta http-equiv="refresh" content="7; url='https://redirect.mical385.repl.co/'" />
  </head>
  <body>
    <p>Redirecting you to the <a href="https://redirect.mical385.repl.co/">main page</a></p>
  </body>
</html>