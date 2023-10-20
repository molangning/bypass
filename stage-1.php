<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
  die();
}
  require "common_functions.php";
  require "parse_urls.php";

  function error_redirect(){
    echo '<!DOCTYPE HTML><html><head><title>redirector v1.0 </title><meta charset="utf-8"><meta name="viewport" content="width=device-width"><meta charset="utf-8"><meta name="viewport" content="width=device-width"><link rel="icon" sizes="16x16" href="/favicon/16x16.png"><link rel="icon" sizes="32x32" href="/favicon/32x32.png"><link rel="icon" sizes="192x192" href="/favicon/192x192.png"><link rel="icon" sizes="512x512" href="/favicon/512x512.png"><link rel="icon" href="/favicon/favivon.ico"><title>redirecting</title><script>var timezone=Intl.DateTimeFormat().resolvedOptions().timeZone;document.cookie="timezone="+timezone+";path=/";window.location.replace(window.location.href);</script></head><body><p>Setting cookies...</p></body></html>';
  }

function error_page(){
    echo '<!DOCTYPE HTML><html><head><title>redirector v1.0 </title><meta charset="utf-8"><meta name="viewport" content="width=device-width"><meta charset="utf-8"><meta name="viewport" content="width=device-width"><link rel="icon" sizes="16x16" href="/favicon/16x16.png"><link rel="icon" sizes="32x32" href="/favicon/32x32.png"><link rel="icon" sizes="192x192" href="/favicon/192x192.png"><link rel="icon" sizes="512x512" href="/favicon/512x512.png"><link rel="icon" href="/favicon/favivon.ico"><title>redirecting</title><meta http-equiv="refresh" content="10; url='."'/'".'" /></head><body><p>We have detected that you are a bot, please enable javascript and cookies to continue. Redirecting you back to the <a href="/">main page</a></p></body></html>';
  }

  function log_redirects($loc, $redirect_status, $status) {
    date_default_timezone_set('Asia/Singapore');

    if (!isset($_COOKIE["uuid"])){
      $uuid="N/A";
    } else {
      $uuid=$_COOKIE["uuid"];
    }
            
    if (!isset($_COOKIE["timezone"])){
      $timezone="N/A";
    } else {
      $timezone=$_COOKIE["timezone"];
    }
        $country_code="";
    if (!in_array($timezone, timezone_identifiers_list(),true)) {
      $timezone="N/A";
      $country_code="N/A";
    } else {
      $country_code=timezone_location_get(timezone_open($timezone))["country_code"];
    }

    if (strlen($uuid) !== 37){
      $uuid="N/A";
    } else if (!str_starts_with($uuid, "uuid_")){
      $uuid="N/A";
    }
    
    
    $log="Timestamp: ".date("\S\G\T h:i:s A").PHP_EOL.
      "Requested link: ".$loc.PHP_EOL.
      "Request type: ".$_SERVER['REQUEST_METHOD'].PHP_EOL.
      "Status: ".$redirect_status.PHP_EOL.
      "UUID: ".$uuid.PHP_EOL.
      "Timezone: ".$timezone.PHP_EOL.
      "Country code: ".$country_code.PHP_EOL.
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

  if (!isset($_COOKIE["uuid"]) or !isset($_COOKIE["timezone"])){
    error_redirect();      
    log_redirects($_SERVER['REQUEST_URI'],"Error, cookies were not set",true);
  }

  if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    error_redirect();
    log_redirects($_SERVER['REQUEST_URI'],"Error, ". $_SERVER['REQUEST_METHOD']. " request was sent to stage-1.php.",true);
  }

  if (isset($_GET["url"]) === false) {
    if (!in_array($_SERVER['REQUEST_METHOD'], ['GET','HEAD'],true)) {
      error_redirect();
      log_redirects($_SERVER['REQUEST_URI'], "Error, url param was not set.", true);
    }
  }    

  if (strlen($_GET["url"])===0){
    error_redirect();
    log_redirects($_SERVER['REQUEST_URI'], "Error, url param is empty", true);
  }

  if (filter_var($_GET["url"], FILTER_VALIDATE_URL) === false) {
    if ($_SERVER['REQUEST_METHOD'] === "HEAD"){
      die();
    }
    error_redirect();
    log_redirects($_GET["url"], "Error, invalid url.",true);
  }
  $loc=parse_redirect_urls($_GET["url"]);
  header("Cache-Control: no-cache, must-revalidate");
  header('Location: '.$loc,true,301);
  log_redirects($loc, "Successful redirect.",false);
?>
