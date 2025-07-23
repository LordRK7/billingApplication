<?php session_start();

unset($_SESSION["uname"]);
unset($_SESSION["uemail"]);

session_destroy();

header("location:index.php");


?>