<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Venue Booking</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../css/bootsrtap1" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php
    include('../include/Adminheader.php');
    include('../include/navbar.php');
    include('../include/AdminTopbar.php');


    include('../Handler/connection.php');
    $stmt = $conn->prepare("SELECT * FROM booking_t, cutomers, venue WHERE booking_t.customerId = cutomers.customerId AND booking_t.VenueId = venue.VenueId");
    $stmt->execute();
    
    ?>
    
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h1 class="h2 text-dark bold text-left">Your Booking History</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Customer Name</th>
                                            <th>Hall Name</th>
                                            <th>Date</th>
                                            <th>Type of Service</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>SN</th>
                                            <th>Customer Name</th>
                                            <th>Hall Name</th>
                                            <th>Date</th>
                                            <th>Type of Service</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sn = 1;
                                            while($show = $stmt->fetch()){

                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $sn?></td>
                                            <td><?php echo $show['fullName']?></td>
                                            <td><?php echo $show['v_Name']?></td>
                                            <td><?php echo $show['Date']?></td>
                                            <td><?php echo $show['service_type']?></td>
                                          
                                        </tr>
                                        <!-- <tr>
                                            <td>2</td>
                                            <td>Garrett Winters</td>
                                            <td>Theater</td>
                                            <td>2011/07/25</td>
                                            <td>Conference</td>
                                           
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Ashton Cox</td>
                                            <td>Room 3</td>
                                            <td>2009/01/12</td>
                                            <td>Meeting</td>
                                
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Cedric Kelly</td>
                                            <td>Main Hall</td>
                                            <td>2012/03/29</td>
                                            <td>Wedding</td>
                                        
                                        </tr> -->
                                        <?php $sn++;
                                             }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            </footer>
        
        <div class="container my-auto ">
      <div class="container text-center mb-4">
        <p class="mb-0">&copy; 2023 Venue Booking System. All rights reserved.</p>
      </div>
    </div>
    </footer>
            <!-- End of Footer -->

        </div>
   </div>
    

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  

    
    <!-- <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../js/script.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script> -->

</body>
<?php include('../include/Adminscript.php');
include('../include/Adminfooter.php');?>
</html>