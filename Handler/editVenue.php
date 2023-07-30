
<?php

include_once "connection.php";

// Check if form is submitted
if(isset($_POST['submit'])) {
  // Get form data and validate
  $id = $_POST['id'];
  $name = $_POST['name'];
  $Phone = $_POST['phone'];
  $email = $_POST['email'];
  $price = $_POST['price'];
  $capacity = $_POST['capacity'];
  $location = $_POST['location'];
  $services = $_POST['service'];

  $stmt = $conn->prepare("UPDATE `venue` SET `v_Name`=?,`phone`=?,`email`=?,`capacity`=?,`location`=?,`Service`=?,`Price`=? WHERE  `venueId`=?");
  $stmt->execute([$name, $Phone, $email, $capacity, $location, $services, $price, $id,]);
}
header ("location:../admin/venueManager.php");
?>  