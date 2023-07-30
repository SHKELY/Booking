<?php
require_once("./Handler/connection.php");
session_start();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$stmt = $conn->prepare("SELECT * FROM `venue` WHERE `venueID` = :id");
	$stmt->execute(array(":id" => $id));

	$res = $stmt->fetch();
}

?>

<?php include('include/header.php'); ?>
</head>

<body>
	<?php include('navigation.php');
	include('include/topbar.php');
	?>

	<div class="container">
		<div class="row mt-3">
			<div>
				<h1 class="text-center">Welcome to <?php echo $res['v_Name'] ?></h1>
			</div>
			<hr>
			<div class="col-lg-5 col-sm-12">
				<img src="./uploads/<?php echo $res['image'] ?>" class="img-fluid" alt="...">
			</div>
			<div class="col-lg-7 col-sm-12">
			<table class="table ">
					<tbody>
						<tr>
							<th><i class="fas fa-user"></i> Name</th>
							<td><?php echo $res['v_Name'] ?></td>
						</tr>
						<tr>
							<th><i class="fas fa-phone"></i> Contact</th>
							<td><?php echo $res['phone'] ?></td>
						</tr>
						<tr>
							<th><i class="fas fa-envelope"></i> Email</th>
							<td><?php echo $res['email'] ?></td>
						</tr>
						<tr>
							<th><i class="fas fa-credit-card"> Cost</th>
							<td>Tsh <?php echo number_format( $res['Price']) ?>/=</td>
						</tr>
						<tr>
							<th><i class="fas fa-users"></i> Capacity</th>
							<td><?php echo $res['capacity'] ?></td>
						</tr>
						<tr>
							<th><i class="fas fa-map-marker-alt"> Address</th>
							<td><?php echo $res['location'] ?></td>
						</tr>
						<tr>
							<th><i class="fas fa-wifi"> Services</th>
							<td><?php echo $res['Service'] ?></td>
						</tr>

						<tr>
							<th><i class="fas fa-edit">Description</th>
							<td><?php echo $res['description'] ?></td>
						</tr>
					</tbody>
				</table>
				<!-- <img src="./uploads/<?php echo $res['image'] ?>" class="img-fluid" alt="..."> -->
			</div>
			

		</div>
		<hr class="sidebar-divider">
		<div class="row mt-3">
			
				
				<div class="btn w-100">
					<?php
					if (!isset($_SESSION['role'])) {

					?>
						<a href="./login.php" class="btn btn-dark mybg" onclick="return confirm('You need to register first')"><i class="fas fa-bookmark"></i> Book Venue</a>

					<?php
					} else {
					?>
						<a href="ClientForm.php?id=<?php echo $res['venueId'] ?>" class="btn btn-dark mybg"><i class="fas fa-bookmark"></i> Book Venue</a>

					<?php
					}
					?>
				</div>
			


		</div>
	</div>



</body>
<?php include('include/footer.php');
include('include/scripts.php');
?>

</html>