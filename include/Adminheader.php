<?php
session_start();
$user = $_SESSION['user'];
$role = $_SESSION['role'];

if(!isset($role)){
    header('location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>
    
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/bootsrtap1.css" rel="stylesheet">
    <link rel="stylesheet" href="../Asset/css/style.css">

</head>

<body id="page-top">
    <div id="wrapper">