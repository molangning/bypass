<?php

  function set_uuid(){
    $bytes = random_bytes(16);
    $uuid = "uuid_".bin2hex($bytes);
    setcookie("uuid",$uuid);
    header("Refresh: 0");
  }

date_default_timezone_set('Asia/Singapore');

  if (isset($_COOKIE["uuid"])){
    $uuid=$_COOKIE["uuid"];

    if (strlen($uuid) !== 37){
      set_uuid();
      
    } else if (!str_starts_with($uuid, "uuid_")){
      set_uuid();
    }
  } else {
    set_uuid();
  }

  if (isset($_COOKIE["timezone"])){
    $timezone=$_COOKIE["timezone"];
    if (!in_array($timezone, timezone_identifiers_list(),true)) {
      require "setcookies.php";
    }
  }

?>
    
