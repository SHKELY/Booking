<?php
	require_once('Handler/connection.php');
?>

   
<?php
include('include/header.php');
include('navigation.php');
include('include/topbar.php');
?>

<div class="container mt-3 mb-5 shadow-lg rounded">
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner shadow-ls rounded">
        <div class="carousel-item active">
            <img height="400px" src="Asset/Image/crosile/conference.JPG" alt="..." class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
            <img height="400px" src="Asset/Image/crosile/Main.jpg" alt="..." class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
            <img height="400px" src="Asset/Image/crosile/Theater.JPG" alt="..." class="d-block" style="width:100%">
        </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
<span class="carousel-control-prev-icon"></span>
</button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
<span class="carousel-control-next-icon"></span>
</button>
</div>

</div>
<!-- divider line -->
<hr class="sidebar-divider">


<!-- list of venue -->
<div class="container-fluid shadow">
		<div class="row mb-3">
			<div class="col-md-6 offset-md-3">
				<div class="btn w-100">			
				<a href="AllVenue.php" class="btn btn-dark mybg">Venue List</a></div>
				</div>
			</div>
		</div>

		<!-- divider line -->
		<hr class="sidebar-divider">
		
		<h1>Venue List</h1>
		<div class="row">
		
			<?php
			require_once("include/showVenue.php");
		?>
			
			</div>
<!-- test card -->

<!-- up to here -->
            </div>



<link rel="stylesheet" href="Asset/js/bootstrap.js">


</body>
<?php
 include('include/footer.php');
 include('include/scripts.php');
?>
</html>













