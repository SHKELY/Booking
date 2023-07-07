<?php
require_once("./connection.php");
session_start();
unset($_SESSION['user']);
unset($_SESSION['role']);
session_destroy();
header("Location:../login.php");


?>