<?php
require_once("connection.php");

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $location = $_POST['location'];
    $service = $_POST['service'];
    $descrip = $_POST['description'];
    $image = $_FILES['image'];

    $stmt = $conn->prepare("INSERT INTO `venue`(`v_Name`, `phone`, `email`, `Price`, `capacity`, `location`, `Service`, `description`, `image`)
     VALUES (:vName,:tel,:email,:price,:capacity,:locat,:services,:descr,'default')");
    $stmt->execute(array(":vName" => $name, ":tel" => $phone, ":email" => $email, ":price" => $price, ":capacity" => $capacity, ":locat" => $location, ":services" => $service, ":descr" => $descrip));
    $Id = $conn->lastInsertId(); 
    
    
}
session_start();

$user = $_SESSION['user'];
require_once("connection.php");
if (isset($_FILES["image"])) {
    $picture = $_FILES["image"];

    if (($picture["type"] == "image/png" or $picture["type"] == "image/jpeg" or $picture["type"] == "image/jpg" or $picture["type"] == "image/gif") and $picture["error"] == 0) {
      
        $arr = explode(".", $picture["name"]);       
        $name = "img_".$user. "_" .time(). "." . end($arr);
        $path = "../uploads/".$name;      
        if (move_uploaded_file($picture["tmp_name"], $path)) {
            $stmt = $conn->prepare("UPDATE `venue` SET `image`=:img WHERE `venueId`=:id");
            $stmt->execute(array(":img" => $name, ":id" => $Id));
        }
    }
}
header("location: ../admin/venueManager.php");

?>