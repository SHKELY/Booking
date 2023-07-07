
<?php
// Include database connection
include_once "connection.php";

// Check if venue ID is set and not empty
if(isset($_GET['vid']) && !empty($_GET['vid'])) {
  $id = $_GET['vid'];
  
  // SQL query to delete venue
  $stmt = $conn->prepare("DELETE FROM venue WHERE venueId=:vId");
  $stmt->execute(array(":vId"=>$id));
  
  // Redirect back to venue management page
  header("Location: ../Admin/venueManager.php");
  exit();
} else {
  // If ID is not set or empty, redirect back to venue management page
  header("Location: ../Admin/venueManager.php");
  exit();
}
?>