<?php

  if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    die();
  }

  require "common_functions.php";
  require "parse_urls.php";


  function log_redirects($loc, $redirect_status, $status) {
    
    $log="Timestamp: ".date("\S\G\T h:i:s A").PHP_EOL.
      "Requested link: ".$loc.PHP_EOL.
      "Request type: ".$_SERVER['REQUEST_METHOD'].PHP_EOL.
      "Status: ".$redirect_status.PHP_EOL.
      "-------------------------------------------".PHP_EOL;

   if ($status===False){
      if (!file_exists("./logs/info")){
        mkdir("./logs/info",0700,true);
      }
      file_put_contents('./logs/info/log_'.date("o-m-d").'.log', $log, FILE_APPEND);
      die();
    } else {
     if (!file_exists("./logs/error")){
        mkdir("./logs/error",0700,true);
      }
      file_put_contents('./logs/error/log_'.date("o-m-d").'.log', $log, FILE_APPEND);
      die();
    }
  }

  if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    echo("Invalid request type");
    log_redirects($_SERVER['REQUEST_URI'],"Error, ". $_SERVER['REQUEST_METHOD']. " request was sent to stage-1.php.",true);
  }
  
  if (isset($_GET["url"]) === false) {
    if (!in_array($_SERVER['REQUEST_METHOD'], ['GET','HEAD'],true)) {
      echo("Url parameters is not set");
      log_redirects($_SERVER['REQUEST_URI'], "Error, url param was not set.", true);
    }
    die();    
  }    

  if (strlen($_GET["url"])===0){
    echo("Url parameters is not set");
    log_redirects($_SERVER['REQUEST_URI'], "Error, url param is empty", true);
  }

  if (filter_var($_GET["url"], FILTER_VALIDATE_URL) === false) {
    if ($_SERVER['REQUEST_METHOD'] === "HEAD"){
      die();
    }
    echo("Invalid url parameter");
    log_redirects($_GET["url"], "Error, invalid url.",true);
  }
  $loc=parse_redirect_urls($_GET["url"]);
  header("Cache-Control: no-cache, must-revalidate");
  header('Location: '.$loc,true,301);
  log_redirects($loc, "Successful redirect.",false);
?>
