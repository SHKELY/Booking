<?php

include_once "connection.php";

// Check if form is submitted
if(isset($_GET['confirm'])) {
    $BId = $_GET['confirm'];
    $stmt=$conn->prepare("UPDATE booking_t SET status = 1 WHERE BookingId='$BId'");
    $stmt->execute();

}
if(isset($_GET['cencel'])) {
    $BId = $_GET['cencel'];
    $stmt=$conn->prepare("UPDATE booking_t SET status = 0 WHERE BookingId='$BId'");
    $stmt->execute();

}
header ("location:../admin/allBooking.php");
?>  