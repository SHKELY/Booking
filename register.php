<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/bootsrtap1.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="./js/logFormScript.js"></script>
    <link rel="stylesheet" href="Asset/css/bootstrap.css">
    <link rel="stylesheet" href="Asset/css/style.css">

</head>

<body class="fbg">
    <div class="container">
<div class="justify-content-center d-flex">
    <div class="col-lg-6 col-sm-12">

    <div class="container">
        <div class="card o-hidden border-1 shadow-lg my-5 mt-4">
            <div class="card-body p-3">
                
                
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                                <hr>
                            </div>
                            <?php
                                if(isset($_GET['error']) && $_GET['error'] == 'true'){
                                    echo '<div class="alert alert-danger">
                                    Email Already Exist!
                                    </div>';
                   
                                     }
                            ?>
                            <form class="user" name="form" id="form_register" action="./Handler/registerHandler.php" method="post" onsubmit="return ValidationForm()">
                                <div class="form-group">
                                    <input type="name" class="form-control form-control-user" id="name" onkeyup="ValidateName()" name="name"
                                        placeholder="Full Name">
                                    <span id="eName" class="small"></span>
                                </div>

                                <div class="form-group">
                                    <input type="tel" class="form-control form-control-user" id="tell" maxlength="10"  pattern="[0-9]{10}" onkeyup="ValidatePhone()" name="tell"
                                        placeholder="Mobile">
                                    <span id="ePhone" class="small"></span>
                                </div>
                               
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" onkeyup="ValidateEmail()" name="email"
                                        placeholder="Email">
                                    <span id="eEmail" class="small"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="pass"  onkeyup="ValidatePassword()" name="pass"
                                        placeholder="Password">
                                    <span id="ePass" class="small"></span>    
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="rep_pass"  onkeyup="ValidatePasswordC()" name="re_pass"
                                        placeholder="Repeat Password">
                                        <span id="ePPass" class="small"></span>    
                                </div>
                                
                                <div class="container justify-content-center d-flex">
                                       <button type="submit" name="regiter" class="btn mybg btn-warning w-100">Register Account</button>
                                </div>
                                <hr>
                              
                                <div class="text-center">
                        
                                <a class="small text-dark" href="login.php" >Already have an account? Login!</a>
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
</body>

</html>