
<?php

include_once "connection.php";

// Check if form is submitted
if(isset($_POST['submit'])) {
  // Get form data and validate
  $id = $_POST['id'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $capacity = $_POST['capacity'];
  $location = $_POST['location'];
  $availability = $_POST['availability'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  
  // SQL query to update venue
  $sql = "UPDATE venues SET name=?, type=?, capacity=?, location=?, availability=?, description=?, price=? WHERE id=?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$name, $type, $capacity, $location, $availability, $description, $price, $id]);
}
?>  