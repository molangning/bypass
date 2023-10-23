<?php
  require "common_functions.php";
?>
<!DOCTYPE html>

<html lang="en-GB">
  <head>
    <title>redirector v2.0 - a link shortener alternative</title>
    <meta name="description" content="A alternative method for link shortener bypasses">
    <meta name=”robots” content="index, follow">
    <script src="/js/index.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" sizes="16x16" href="/favicon/16x16.png">
    <link rel="icon" sizes="32x32" href="/favicon/32x32.png">
    <link rel="icon" sizes="192x192" href="/favicon/192x192.png">
    <link rel="icon" sizes="512x512" href="/favicon/512x512.png">
    <link rel="icon" href="/favicon/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body class="bg-dark align-itmes-center">
    <h1 class="text-bg-dark pt-3 text-center">The Redirector v2.0</h1>
    <h2 class="text-bg-dark pb-1 text-center">Solver for websites you want to visit!</h2>
    <div class="text-bg-dark text-center">
      <p>Google redirect links now work<br>(https://www.google.com.sg/url?.....&url=.....)</p>
      <p>Join my discord server <a href="https://discord.com/invite/wC92JBb834">here</a></p>
    </div>
    <div class="d-flex px-4 justify-content-center">
      <input type="text" id="link" name="link" size="100" placeholder="Enter url here">
    </div>
    <div class="pt-4 d-flex justify-content-center">      
      <button id="createPermalink" type="button" class="mx-4 btn btn-light" onclick="createPermalink()">Create permalink</button>
      <button id="openNewTab" type="button" class="btn btn-light" onclick="newTab()">Open Tab</button>
    </div>
    <script>
      if (getCookie("timezone") === "") {
        var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone
        document.cookie = "timezone=" + timezone + ";path=/";
      }
      var input = document.getElementById("link");
      input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
          event.preventDefault();
          document.getElementById("openNewTab").click();
        }
      })
    </script>
    <div class="text-bg-dark pt-4 text-center">
      <p id="">
        <b>ATTENTION</b>
      </p>
      <div class="text-bg-dark text-center">
        <p> Bookmark this link and the github link to check for updates. <br>SITE MAY GET BLACKLISTED SO CHECK GITHUB FOR UPDATES. <br>
        </p>
        <p> Please open an issue at the <a href="https://github.com/molangning/bypass" class="text" target="_blank">github</a> repository to report bugs or submit suggestions. <br> Remember to star the GitHub repository if you found it helpful! </p>
      </div>
      <div class="text-bg-dark text-center">
        <p> Quick links: </p>
      </div>
      <!-- https://mdbootstrap.com/docs/standard/components/list-group/#
      -->
      <div class="list-group list-group w-25 m-auto p-10">
        
        <button type="button" class="list-group-item list-group-item-action px-3 border-0 d-flex justify-content-center list-group-item" onclick="openUrl('https://discord.com/app')">
          <img src="/images/discord-ico.png" style="width: auto; height: 30px; margin: 0px 10px 0px 0px;"> Discord </button>
        
        <button type="button" class="list-group-item list-group-item-action px-3 border-0 d-flex justify-content-center list-group-item" onclick="openUrl('https://www.instagram.com')">
          <img src="/images/instagram.png" style="width: auto; height: 25px; margin: 3px 10px 0px 0px;"> Instagram </button>
        
        <button type="button" class="list-group-item list-group-item-action px-3 border-0 d-flex justify-content-center list-group-item" onclick="openUrl('https://web.whatsapp.com')">
          <img src="/images/whatsapp-ico.png" style="width: auto; height: 25px; margin: 0px 5px 5px 0px"> Whatsapp </button>
        
        <button type="button" class="list-group-item list-group-item-action px-3 border-0 d-flex justify-content-center list-group-item" onclick="openUrl('https://poki.com')">
          <img src="/images/pokigames-ico.png" style="width: auto; height: 30px; margin: 0px 5px 5px 0px"> Poki games </button>
      </div>
  </body>
</html>