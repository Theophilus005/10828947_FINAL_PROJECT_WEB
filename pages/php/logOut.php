<?php
session_start();

unset($_SESSION["username"]);
unset($_SESSION["email"]);
unset($_SESSION["status"]);

session_destroy();
header("location: ../refer.php");

?>