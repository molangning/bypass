function NewTab() {
  //alert(1);
  const re = new RegExp('[-a-zA-Z0-9:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}([-a-zA-Z0-9()!@:%_\+.~#?&\/\/=]*)');
  var link = document.getElementById('link').value;
  if (re.test(link)){
    if (link.startsWith("https://")===false && link.startsWith("http://")===false){
      link="https://"+link;
    }
  }
  //alert(link);
        //console.log(link);
  if (link.length>0) {
    window.open("/redirect.php?url="+encodeURIComponent(link), "_blank");  
        
      }
}

function logKey(e) {
  alert(type(e.key));
} 

