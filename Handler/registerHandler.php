<?php

require_once('./connection.php');
if (isset($_POST['regiter'])) {

    $name = $_POST['name'];
    $phone = $_POST['tell'];
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);
    $rep_pass = sha1($_POST['re_pass']);

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `Email` = :email");
    $stmt->execute(array(":email" => $email));

    if ($stmt->rowCount() == 0) {
        $stmt = $conn->prepare("INSERT INTO `users`(`Email`, `Password`, `roleID`)
         VALUES (:email,:pass, 2)");
        $stmt->execute(array(":email" => $email, ":pass" => $pass));
        $userID = $conn->lastInsertId();


        $stmt = $conn->prepare("INSERT INTO `cutomers`(`fullName`, `Phone`, `userId`)
         VALUES (:fname,:phone,:userId)");
        $stmt->execute(array(":fname" => $name, ":phone" => $phone, ":userId" => $userID));
        echo "<script>alert('Success!')</script>";
        header("location: ../login.php");
    }{
         header("location: ../register.php?error=true");
       
    }

    

}else{
    // echo "<script>alert('Success!')</script>";
    // header("location: ../register.php");
   
}
