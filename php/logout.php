<?php
session_start();
session_destroy() or die("waerd");
echo '<script> window.location="http://localhost/WT/OEP.php"</script>';
?>