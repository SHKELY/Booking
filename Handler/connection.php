<?php

try{
    $conn = new PDO("mysql:host=localhost; dbname=booking","root","");
    // echo "connected";
}catch(PDOException $e){
    echo "not connected";
}
?>