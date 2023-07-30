<?php

include_once "connection.php";

// Check if form is submitted
if(isset($_POST['submit'])) {
  // Get form data and validate
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $cuId = $_POST['customerId'];
  
  // SQL query to update customer information
  $stmt = $conn->prepare("UPDATE cutomers, users SET fullName=?, Phone=?, Email=? WHERE cutomers.userId=users.userId  AND cutomers.customerId =?");
  $stmt->execute([$name, $phone, $email, $cuId]);
}
header ("location:../admin/customerManager.php");

?>  