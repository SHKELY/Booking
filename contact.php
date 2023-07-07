<?php
    include("Handler/connection.php");
    session_start();

     //INSERT COMMENT
    if (isset($_POST['send'])) {
        $comName=$_POST['Name'];
        $comPhone=$_POST['PhoneNumber'];
        $comEmail=$_POST['Email'];
        $comMessage=$_POST['Message'];

        $stmt=$conn->prepare("INSERT INTO `comment`(`comPhone`, `comName`, `comEmail`, `comMessage`) 
        VALUES (:phone,:names,:email,:massege)");
        $stmt->execute(array(":phone"=>$comPhone,":names"=>$comName,":email"=>$comEmail,":massege"=>$comMessage));
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us - Venue Booking System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="./Asset/css/bootstrap.css">
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <!-- Navigation Bar -->
  <?php
  include('navigation.php');
  ?>

  <!-- Contact Form Section -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
        <h1 class="text-center mb-3 display-5">Contact Us</h1>
        <hr>
          <form action="#" method="POST">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="Name" required>
            </div>
            <div class="form-group">
              <label for="phone">Telephone</label>
              <input type="tell" class="form-control" id="phone" name="PhoneNumber" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="Email" required>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="Message" rows="5" required></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-dark mybg btn-block mt-3">Send</button>
          </form>
        </div>

        <div class="col-md-4 mx-auto">
        <h1 class="text-center mb-3 display-5">Where to find Us</h1>
        <hr>
        <div class="card border-0 mt-3">
    				<img src="img/map.jpg" class="card-img-top" alt="...">
  			
  			<div class="card-body">
			  <h5 class="card-title">Get in touch</h5>
			  
			  <p class="card-text">You will find us offices sitting right at Maruhubi SUZA compas, Zanzibar.</p>
						<ul class="list-unstyled mt-3 mb-4">
							<li>Maruhubi,</li>
							<li>Zanzibar,</li>
              <li>Tanzania.</li>
						</ul>
            <ul class="list-unstyled mt-3 mb-4">
							<li>+255 77 303 5777</li>
						</ul>
						
    
  			
		</div>

        </div>

      </div>
    </div>
  </section>
  <!-- Footer -->
  <?php
 include('include/footer.php');
 include('include/scripts.php');
?>
  
</body>
</html>