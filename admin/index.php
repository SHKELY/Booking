
    <?php
    include('../include/Adminheader.php');
    include('../include/navbar.php');
    include('../include/AdminTopbar.php');
    ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 text-dark">Overview</h1>
                    </div>

                    <?php
            require_once("../Handler/connection.php");
            $cutomer = $conn->prepare("SELECT * FROM cutomers");
            $venue=$conn->prepare("SELECT * FROM venue");
            $book=$conn->prepare("SELECT * FROM booking_t");
            $cutomer->execute();  
            $venue->execute();
            $book->execute();


            
            

            ?>
<hr>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-left-dark mybg shadow h-100 py-5">
                                <div class="card-body ">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                            Registered customers</div>
                                            <div class="h5 mb-0 font-weight-bold text-light-800"><h1><?php echo $cutomer->rowCount() ?></h1></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-left-dark mybg shadow h-100 py-5">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                                All Venue</div>
                                            <div class="h5 mb-0 font-weight-bold text-light-800"><h1><?php echo $venue->rowCount() ?></h1></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-th fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card border-left-dark mybg shadow h-100 py-5">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-light text-uppercase mb-1">
                                                All Booking</div>
                                            <div class="h5 mb-0 font-weight-bold text-light-800"><h1><?php echo $book->rowCount() ?></h2></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bookmark fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



    <?php include('../include/Adminscript.php');
include('../include/Adminfooter.php');?>
             

</footer>
        
        <div class="container my-auto ">
      <div class="container text-center mb-4">
        <p class="mb-0">&copy; 2023 Venue Booking System. All rights reserved.</p>
      </div>
    </div>
    </footer>
</body>
<?php
//  include('../include/footer.php');
 include('../include/Adminscript.php');
 include('../include/Adminfooter.php');
?>
</html>