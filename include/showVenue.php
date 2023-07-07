<?php


$stmt = $conn->prepare("SELECT * FROM `venue`");
$stmt->execute();


if($stmt->rowCount() > 0){

$results = $stmt->fetchAll();
foreach($results as $res){
?>
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
			<div class="card mt-3 dorder-rounded">
  				<a href="info.php?id=<?php echo $res['venueId'] ?>">
    				<img src="./uploads/<?php echo $res['image'] ?>" class="card-img-top" alt="...">
  				</a>
  			<div class="card-body">
			  <h5 class="card-title"><?php echo $res['v_Name'] ?></h5>
			  <div class="stars">
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star-half-alt"></i>
			  </div>
			  <p class="card-text text-truncate"><?php echo $res['description'] ?></p>
						<ul class="list-unstyled mt-3 mb-4">
							<li><i class="fas fa-map-marker-alt"></i> Location: <?php echo $res['location'] ?></li>
							<li><i class="fas fa-users"></i> Capacity: <?php echo $res['capacity'] ?> people</li>
						</ul>
    
  			</div>
		</div>
    </div>


<?php 
}
}else{

?>

<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="card mt-3 dorder-rounded">
        <div class="card-header">
            <h3 class="text-danger">Alert:</h3>
        </div>

        <div class="card-body">
        <p class="text-danger display-5 fs-4">Ooops! Sorry there is no venue available...</p>
        </div>
	</div>
<?php 
}
?>