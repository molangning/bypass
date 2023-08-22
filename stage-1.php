<?php
  function error_redirect(){
    echo '<!DOCTYPE HTML><html><head><title>redirector v1.0 </title><meta charset="utf-8"><meta name="viewport" content="width=device-width"><meta charset="utf-8"><meta name="viewport" content="width=device-width"><link rel="icon" sizes="16x16" href="/favicon/16x16.png"><link rel="icon" sizes="32x32" href="/favicon/32x32.png"><link rel="icon" sizes="192x192" href="/favicon/192x192.png"><link rel="icon" sizes="512x512" href="/favicon/512x512.png"><link rel="icon" href="/favicon/favivon.ico"><title>redirecting</title><meta http-equiv="refresh" content="3; url='."'/'".'" /></head><body><p>Redirecting you back to the <a href="/">main page</a></p></body></html>';
  }

  function log_redirects($loc, $redirect_status){
    $log="Timestamp: ".date("\S\G\T h:i:s A").PHP_EOL.
      "Requested link: ".$loc.PHP_EOL.
      "Status: ".$redirect_status.PHP_EOL.
      "-------------------------------------------".PHP_EOL;
    file_put_contents('./logs/log_'.date("o-m-d").'.log', $log, FILE_APPEND);
    die();
  }

  date_default_timezone_set('Asia/Singapore');

  if (!in_array($_SERVER['REQUEST_METHOD'] ,['GET','HEAD'],true)) {
    error_redirect();
    log_redirects("","Error, ". $_SERVER['REQUEST_METHOD']. " request was sent to stage-1.php.");
  }

  if (isset($_GET["url"]) === false) {
    error_redirect();
    log_redirects("", "Error, url param was not set.");
  }

  $loc=htmlspecialchars($_GET["url"]);    

  if (strlen($loc)===0){
    error_redirect();
    log_redirects($loc, "Error, url param is empty");
  }
    
  if (filter_var($loc, FILTER_VALIDATE_URL) === false) {
    error_redirect();
    log_redirects($loc, "Error, invalid url.");
  }
      
  header("Cache-Control: no-cache, must-revalidate");
  header('Location: '.$loc,true,301);
  log_redirects($loc, "Successful redirect.");

?>