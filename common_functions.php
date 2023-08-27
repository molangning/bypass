<?php
  date_default_timezone_set('Asia/Singapore');
  function set_uuid(){
    setcookie("uuid", "", time() - 3600);
    $bytes = random_bytes(16);
    $uuid = "uuid_".bin2hex($bytes);
    setcookie("uuid",$uuid);
    header("Refresh:0");
  }

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

?>
    