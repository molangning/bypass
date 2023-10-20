<!DOCTYPE html>
<html lang="en-GB">
  <script>
    var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone
    document.cookie = "timezone=" + timezone + ";path=/";
    history.go(-1);
  </script>
</html>