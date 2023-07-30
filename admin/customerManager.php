<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Booking</title>
    
    <link rel="stylesheet" href="../Asset/css/bootstrap.css">
    <link rel="stylesheet" href="../Asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Asset/css/style.css">
</head>
<body>
  
<?php
include('../include/Adminheader.php');
include('../include/navbar.php');
include('../include/AdminTopbar.php');
?>

<div class="container-fluid mt-5">
    <div class="row">

    <!-- personal infomaton -->
        <div class="col-lg-12 col-md-12 col-12 mb-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <h1 class="h2 text-dark bold text-left">Customers</h1>
                </div>

                <!-- Add customer Button-->

                <div class="col-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <button type="button" class="btn btn-sm mybg text-light item-left" data-bs-toggle="modal" data-bs-target="#newCust">Add Customer</button>
                </div>
                
                
            </div>

            <!-- Table to show customer -->


            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th scope="col">S/N</th>
            <th scope="col">Name</th>
            <th scope="col">Telephone</th>
            <th scope="col">Email</th> 
            <th scope="col">Role Name</th>       
            <th scope="col">Edit/Delete</th>
          </tr>
          </thead>
          <tbody>

          <?php
            require_once("../Handler/connection.php");
            $roleQry = $conn->prepare("SELECT * FROM roles");
            $stmt=$conn->prepare("SELECT * FROM `cutomers`, `users`, `roles` WHERE cutomers.userID=users.userID AND users.roleID=roles.roleID");
            $roleQry->execute();  
            $stmt->execute();


           
            $sn = 1;
            while($show=$stmt->fetch()){

            
            

            ?>
           
          <tr>
            <th scope="row"><?php echo $sn?></th>
            <td><?php echo $show['fullName']?></td>
            <td><?php echo $show['Phone']?></td>
            <td><?php echo $show['Email']?></td>
            <td><?php echo $show['roleName']?></td>             
            <td>
            <button class="btn btn-sm btn-success"  data-bs-toggle="modal" data-bs-target="#editCust<?php echo $sn?>">Edit</button>
              <a class="btn btn-sm bg-danger text-light" onclick="return confirm('Are you sure want to delete?');" href="../Handler/deleteCustomer.php?cid=<?php echo $show["userID"]; ?>">Delete</a>
            </td>
          </tr>


              <!-- End of the table -->

<!-- Modal to Edit Customer Details -->

  <div class="modal fade" id="editCust<?php echo $sn?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editCust" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header mybg">
        <h5 class="modal-title" id="editCust">Update Customer</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form method="POST" action="../Handler/editCustomer.php" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name" class="text-dark">Name:</label>
                        <input type="text" value="<?php echo $show['fullName']?>" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="text-dark">Telephone:</label>
                        <input type="tell" value="<?php echo $show['Phone']?>" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-dark">Email:</label>
                        <input type="email" value="<?php echo $show['Email']?>"  class="form-control" name="email" id="email" required>
                    </div>
                
                    <input type="text" hidden readonly name="customerId" value=" <?php echo $show['customerId']?>">
				
                    </div>
                    <button type="submit" name="submit" class="btn btn-sm  btn-primary mybg">Update Customer</button>
                </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
          <?php $sn++;
            }
          ?>
                    
          </tbody>
        </table>
                    </div>
                </div>
                <script src="../Asset\js\bootstrap.bundle.min.js"></script>


              <!-- Modal to Add Customers to table -->

      <div class="modal fade" id="newCust" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newCust" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header mybg">
        <h5 class="modal-title" id="newCust">Add Customer</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
      <form method="POST" action="" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name" class="text-dark">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="text-dark">Telephone:</label>
                        <input type="tell" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-dark">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pass" class="text-dark">Password:</label>
                        <input type="password" class="form-control" name="pass" id="pass" required>
                    </div>
                    <div class="form-group">
                        <label for="rep_pass" class="text-dark">Repeat Password:</label>
                        <input type="password" class="form-control" name="rep_pass" id="rep_pass" required>
                    </div>
                    
                    <div class="form-group">
                    <label for="role" class="text-dark">Select Role:</label>
            <select class="form-control" id="role" name="role" required>
							<option value="">--Select User Role--</option>
							<?php
								while ($role = $roleQry->fetch()) {
							?>
								<option value="<?php echo $role["roleID"]; ?>"><?php echo $role["roleName"]; ?></option>
							<?php
								}
							?>
					</select>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary mybg">Add Customer</button>
                </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
            </div>
        </div>


            </div>
        </div>

    
    </div> 
    <!-- end of row   -->
</div>
<?php include('../include/Adminscript.php');
include('../include/Adminfooter.php');?>       
</body>
</html>


                  <!-- Handler for Add or Insert Customer Form -->

<?php

require_once("../Handler/connection.php");
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);
    $rep_pass = sha1($_POST['rep_pass']);
    $role = $_POST['role'];

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `Email` = :email");
    $stmt->execute(array(":email" => $email));

    if ($stmt->rowCount() == 0) {
        $stmt = $conn->prepare("INSERT INTO `users`(`Email`, `Password`, `roleID`)
         VALUES (:email,:pass, :roleID)");
        $stmt->execute(array(":email" => $email, ":pass" => $pass, ":roleID"=>$role));
        $userID = $conn->lastInsertId();


        $stmt = $conn->prepare("INSERT INTO `cutomers`(`fullName`, `Phone`, `userId`)
         VALUES (:fname,:phone,:userId)");
        $stmt->execute(array(":fname" => $name, ":phone" => $phone, ":userId" => $userID));
        echo "<script>alert('Success!')</script>";
        // header('Location: ./Admin/customerManager.php');
    }else{
   
    echo "<script>alert('Email already exists!')</script>";
    // header('Location: ../Admin/customerManager.php');
}
}