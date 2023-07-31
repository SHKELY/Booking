<?php
include ('./Handler/connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootsrtap1.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="./js/logFormScript.js"></script>
    <link rel="stylesheet" href="Asset/css/bootstrap.css">
    <link rel="stylesheet" href="Asset/css/style.css">

</head>

<body class="fbg">
    <div class="container ">
<div class="justify-content-center d-flex">
    <div class="col-lg-6 col-12">
    <div class="container">
        <div class="card o-hidden border-1 shadow-lg my-5 mt-4">
            <div class="card-body p-3">
                <!-- Nested Row within Card Body -->
                
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4 dispalay-3">Login</h1>
                                <hr>
                            </div>
                            <?php
                                if(isset($_GET['error']) && $_GET['error'] == "booked"){
                                    echo '<div class="alert alert-danger">
                                    Wrong Email or password!
                                    </div>';
                   
                                     }
                            ?>
                            <form class="user" name="form" id="form_login" action="./Handler/loginHandler.php" method="POST" onsubmit="return ValidateForm()">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" onsubmit="return ValidateForm()"
                                        placeholder="Email">
                                        <span id="eEmail" class="small"></span>
                                </div>
                               
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="pass" name="password" onsubmit="return ValidateForm()"
                                        placeholder="Password">
                                    <span id="ePasi" class="small"></span>    
                                </div>

                                
                            <div class="form-group mt-5">
                                            
                                        
                                        <div class="container justify-content-center d-flex">
                                       <button type="submit" name="login" class="btn mybg btn-warning w-100">Login</button>
                                        </div>
                                        <hr>                    
                                    </form>
                                
                    
                                    <div class="text-center">
                                        <a class="small text-dark" href="register.php">Create an Account!</a>
                                    </div>
                                    
                            </form>

                               
                           
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <?php
    include('include/scripts.php');
    ?>

</body>

</html>