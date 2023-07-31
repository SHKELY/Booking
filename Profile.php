<!DOCTYPE html>
<html lang="en">

<head>
	
</head>

<body>
<?php
include('include/header.php');

?>
	

	<div class="container-fluid">
	<div><h2 class="container-fluid text-center p-5 mybg">Profile</h2>
					</div>
		<div class="row">
			

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
					
					<div>
						<button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						
						<?php
						require_once("./Handler/connection.php");
						
							session_start();
							$user = $_SESSION['user'];
$role = $_SESSION['role'];

    if(!isset($role)){
        header('location: ../login.php');
    }
							$id = $_SESSION['id'];
							// echo $id;
							$query = $conn->prepare("SELECT * FROM cutomers,users,roles WHERE users.userID=cutomers.userId AND users.roleID=roles.roleID AND users.userID=:userID");
							$query->execute(array(":userID"=>$id));
							$res = $query->fetch();
						?>
							
							<div class="row my-3">
								<div class="col-lg-6 col-12">
									<div class="card">
										<div class="card-header">
											<h5 class="card-title">Personal Details</h5>
										</div>
										<div class="card-body">
											<table class="table table-hover">
												<tr>
											
													<th>Full Name</th>
													<td><?php echo $res["fullName"] ?></td>
												</tr>
												<tr>
													<th>Phone</th>
													<td><?php echo$res["Phone"]?></td>
												</tr>
											</table>
											
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-12">
									<div class="card">
										<div class="card-header">
											<h5 class="card-title">Account Details</h5>
										</div>
										<div class="card-body">
											<table class="table table-hover">
												<tr>
													<th>Email</th>
													<td><?php echo $res["Email"]; ?></td>
												</tr>
												<tr>
													<th>Role</th>
													<td><?php echo $res["roleName"]; ?></td>
												</tr>
												
											</table>
											
										</div>
									</div>
								</div>
							</div>
						
					</div>
				</div>
			</main>
		</div>
	</div>

	<div class="modal fade" id="newProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newProfileModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="editProfileModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="#" method="POST">
					<input type="hidden" value="<?php echo $res["userID"]; ?>" class="form-control" id="userID" name="userID"  required>
						<div class="form-floating mb-3">
							<input type="text" value="<?php echo $res["fullName"]; ?>" class="form-control" id="Name" name="Name" placeholder="First Name" required>
							<label for="firstName">Name</label>
						</div>
						
						<div class="form-floating mb-3">
							<input type="tel" value="<?php echo $res["Phone"]; ?>" class="form-control" id="phone" name="phone" placeholder="Phone" required>
							<label for="dob">Phone</label>
						</div>
						<button class="w-100 btn btn-lg btn-primary mybg mt-3" name="submit" type="submit">Save</button>
					</form>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>
	<script src="assets\js\bootstrap.bundle.min.js"></script>
		 <?php 
include('include/scripts.php');
?>
</body>



</html>

<?php
// Check if form is submitted
if(isset($_POST['submit'])) {
  // Get form data and validate
  $id = $_POST['userID'];
  $name = $_POST['Name'];
  $Phone = $_POST['phone'];


  $stmt = $conn->prepare("UPDATE `cutomers` SET `fullName`=?,`phone`=? WHERE  `userID`=?");
  $stmt->execute([$name, $Phone,$id,]);
}
?>
