function newTab() {
  const re = new RegExp(/[-a-zA-Z0-9:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}([-a-zA-Z0-9()!@:%_\+.~#?&\/\/=]*)/);
  var link = document.getElementById('link').value;
  alert(link);
  if (re.test(link) === true){
    if (link.startsWith("https://") === false && link.startsWith("http://") === false){
      link="https://"+link;
    }
    openUrl(link);
  } else {
    alert("Invalid link")
  } 
}

function openUrl(link) { 
  if (link.length>0) {
    window.open("/stage-1.php?url="+encodeURIComponent(link), "_blank");  
  }
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function createPermalink() {
  const re = new RegExp(/[-a-zA-Z0-9:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}([-a-zA-Z0-9()!@:%_\+.~#?&\/\/=]*)/);
  var link = document.getElementById('link').value;
  if (re.test(link) === true){
    if (link.startsWith("https://")===false && link.startsWith("http://")===false){
      link="https://"+link;
    }
    link = "https://"+location.hostname+"/permalink.php?url="+encodeURIComponent(link);
    navigator.clipboard.writeText(link);
    alert("Copied permalink to clipboard")
  } else {
    alert("Invalid link");
  }
}
