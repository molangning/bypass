<?php
  $tz="not set";
  $uuid="not set";
  if (isset($_COOKIE["timezone"])){
    $tz=$_COOKIE["timezone"];
  }
  if (isset($_COOKIE["uuid"])){
    $uuid=$_COOKIE["uuid"];
  }
  echo "timezone: ".$tz."<br>uuid: ".$uuid."<br>time generated:".time();
?>