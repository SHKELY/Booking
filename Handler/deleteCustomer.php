<?php
include_once "connection.php";
if(isset($_GET['cid'])) {
$custId = $_GET['cid'];
$stmt = $conn->prepare("DELETE FROM users WHERE userID = :cId");
$stmt->execute(array(":cId"=>$custId));
}
header('Location: ../Admin/customerManager.php');
?>