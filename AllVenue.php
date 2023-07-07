
<?php
include('include/header.php');
include('navigation.php');
include('include/topbar.php');
?>

<!-- list of venue -->
<div class="container-fluid shadow">
		

		<!-- divider line -->
		<hr class="sidebar-divider">
		
		<h1>Venue List</h1>
		<div class="row">
			
		<?php
		require_once("./Handler/connection.php");
			require_once("./include/showVenue.php");
		?>
		
</div>

</body>
<?php
 include('include/footer.php');
 include('include/scripts.php');
?>

</html>