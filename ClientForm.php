<?php

require_once("./Handler/connection.php");
// session_start();

if (isset($_POST['submit'])) {

    $cusId = $_POST['cusID'];
    $venueId = $_POST['venueID'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $s_time = $_POST['s_time'];
    $e_time = $_POST['e_time'];
    $name = $_POST['name'];
    $location = $_POST['address'];
    $part = $_POST['participant'];
    $requrement = $_POST['req'];
    // $image = $_FILES['image'];

    $qir = $conn->prepare("SELECT * FROM `booking_t` WHERE `Date` = :date AND venueId =:Vid");
    $qir->execute(array(":date" => $date,":Vid"=>$venueId));
    if ($qir->rowCount() == 0) {


    $stmt = $conn->prepare("INSERT INTO `booking_t`( `customerId`, `name`, `service_type`, `Participants`, `VenueId`, `requament`, `Date`, `S_time`, `E_time`, `letter`)
     VALUES (:cusId,:nam,:typ,:participant,:venueId,:req,:dat,:s_time,:e_time,:letter)");
    $stmt->execute(array(":cusId" => $cusId, ":nam" => $name, ":typ" => $type, ":participant" => $part, ":venueId" => $venueId, ":req" => $requrement, ":dat" => $date, ":s_time" => $s_time, ":e_time" => $e_time, ":letter" => "default"));
    $Id = $conn->lastInsertId();


    $user = $_SESSION['user'];
    // require_once("connection.php");
    if (isset($_FILES["letter"])) {
        $letter = $_FILES["letter"];

        if (($letter["type"] == "application/pdf") and $letter["error"] == 0) {

            $arr = explode(".", $letter["name"]);
            $name = "file_" . $user . "_" . time() . "." . end($arr);
            $path = "./Admin/Letter/" . $name;
            if (move_uploaded_file($letter["tmp_name"], $path)) {
                $stmt = $conn->prepare("UPDATE `booking_t` SET `letter`=:letter WHERE `BookingId`=:id");
                $stmt->execute(array(":letter" => $name, ":id" => $Id));
            }
        }
    }

header("location: ./AllVenue.php");

}else{
   echo  "<script>alert('Venue is alredy booked ')</script>";

}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Asset/js/bootstrap.js">
    <link rel="stylesheet" href="Asset/css/bootstrap.css">
    <link rel="stylesheet" href="Asset/css/style.css">
</head>

<body>

    <?php include('navigation.php');
    include('include/header.php');
    include('include/topbar.php');
    ?>

    <hr class="sidebar-divider">
    <!-- form start -->
    <div class="container row">
        <div class="col-12 text-center">
        <h1 class="display-4">BOOKING FORM</h1>
        <hr class="sidebar-divider">
        </div>
        
        <div class="col-lg-12 col-12">
            
           
            <form class="row g-3 " action="#" method="post">

                <div class="col-12">
                    <label for="typeofservice" class="form-label">Type of service:</label>
                    <input type="text" name="type" class="form-control" id="typeofservice" placeholder="Type of Services">
                </div>
                <div class="col-12">
                    <label for="date" class="form-label">Date of Event:</label>
                    <input type="date" name="date" class="form-control" id="date" placeholder="">
                </div>
                <div class="col-md-6">
                    <label for="start" class="form-label">Start Time:</label>
                    <input type="time" name="s_time" class="form-control" id="#">
                </div>
                <div class="col-md-6">
                    <label for="end" class="form-label">End Time:</label>
                    <input type="time" name="e_time" class="form-control" id="#">
                </div>

                <hr>

                <?php
                // session_start();
                $whatever = $_SESSION['user'];
                $qir = $conn->prepare("SELECT * FROM users, cutomers WHERE users.userID = cutomers.userID AND users.Email = :Email");
                $qir->execute(array(":Email" => $whatever));
                $res = $qir->fetch();
                $Cst_Id = $res['customerId']

                ?>
                <input type="number" name="cusID" value="<?php echo $Cst_Id; ?>" class="form-control" id="#" readonly hidden>

                <input type="number" name="venueID" value="<?php echo $_GET['id']; ?>" class="form-control" id="#" readonly hidden>


                <div class="col-12">
                    <label for="name" class="form-label">Name of Organization/Individual:</label>
                    <input type="text" name="name" class="form-control" id="#" placeholder="Name">
                </div>

                <div class="col-12">
                    <label for="Address" class="form-label">Address:</label>
                    <input type="text" name="address" class="form-control" id="Address" placeholder="Address">
                </div>

                <div class="col-12">
                    <label for="number" class="form-label">Number of participants expected:</label>
                    <input type="number" name="participant" class="form-control" id="#" placeholder="Participants">
                </div>

                <div class="col-12">
                    <label for="letter" class="form-label">Upload Letter(for organisation):</label>
                    <input type="file" name="letter" class="form-control" id="letetr" placeholder="">
                </div>

                <div class="col-md-12">
                    <label for="req" class="form-label">Specific requirement:</label>
                    <p>Specific requirement cannot be guaranteed - but the property will do its best to meet your needs.</p>
                    <textarea class="form-control" id="req" name="req" rows="5"></textarea>
                </div>

                <div class="col-12">

                    <button class="btn btn-dark mybg" type="submit" name="submit"><i class="fas fa-forward"></i> Submit</button>
                </div>

        </div>
        </form>
    </div>
    <div class="ocl-4"></div>
    </div>

    <!-- divider -->
    <hr class="sidebar-divider">
   
</body>
<?php include('include/footer.php');
include('include/scripts.php');
?>
</html>