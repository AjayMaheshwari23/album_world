<?php
$redirectindex = "http://localhost/proj3/index.php";
session_start();
session_unset();
session_destroy();
header("location: $redirectindex");
exit();

?>