<?php
  function parse_redirect_urls($url){
    // host, path, param
    $redirect_params=[["google.com", "/url", "url"]];
    $parsed_url=parse_url($url);
    if (!isset($parsed_url["query"])){
      return $url;
    } 
    foreach ($redirect_params as $i) {
      
      if (!str_contains($parsed_url["host"], $i[0])) {
        continue;
      }
      if ($parsed_url["path"] !== $i[1]) {
        continue;
      }
      parse_str($parsed_url["query"], $params);
      
      if (isset($params[$i[2]])) {
        return $params[$i[2]];
      }
    }
    return $url;
  }
?>