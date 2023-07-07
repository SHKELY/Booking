<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Venue Booking</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    
</head>
<body>
    
    
<?php
 include('../include/Adminheader.php');
include('../include/navbar.php');
include('../include/AdminTopbar.php');

include('../Handler/connection.php');
$select_stmt = $conn->prepare("SELECT * FROM `comment`");
$select_stmt->execute();
$comments = $select_stmt->fetchAll();
?>
<div class="container-fluid">
		<div class="row">
			

			<main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">				
					<h1 class="h2 text-dark">Client Comments</h1>									
				<div class="row">
					<div class="col-12">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-hover">
								<thead>								
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">PHONE</th>                                        
                                        <th scope="col">EMAIL</th>                   
                                        <th scope="col">MESSAGE</th>
                                    </tr>
								</thead>
								<tbody>
									<?php										
										$sn = 1;
                                        foreach ($comments as $comment) {
									?>
											 <tr>
                                                <td> <?php echo $sn ?> </td>
                                                <td> <?php echo $comment['comName'] ?> </td>
                                                <td> <?php echo $comment['comPhone'] ?> </td>                                               
                                                <td> <?php echo $comment['comEmail'] ?> </td>
                                                <td> <?php echo $comment['comMessage'] ?> </td>
                                            </tr>

									<?php $sn++;
									}?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>

<!-- End of table -->
</body>
<?php include('../include/Adminscript.php');
include('../include/Adminfooter.php');?>
</html>
