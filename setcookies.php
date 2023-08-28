<html>
  <script>
      var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone
      document.cookie = "timezone=" + timezone + ";path=/";
      window.location.replace("/bypass");
  </script>
</html>
