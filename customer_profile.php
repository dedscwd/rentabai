<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION['customer_username']){
		$customer_id = $_SESSION['customer_id'];
		$customer_username = $_SESSION["customer_username"];
		$customer_email = $_SESSION["customer_email"];
		$customer_firstname = $_SESSION["customer_firstname"];
		$customer_lastname = $_SESSION["customer_lastname"];
		$customer_phone = $_SESSION["customer_phone"];
		$customer_city = $_SESSION["customer_city"];
		$customer_barangay = $_SESSION["customer_barangay"];
		$customer_street = $_SESSION["customer_street"];
	}
	else{
		header("location: index.php");
	}
?>
<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">    
        <link rel="stylesheet" type="text/css" href="css/loginmodalnRegister.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/css/w3.css">
        <link rel="stylesheet" type="text/css" href="css/welcome.js">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<title><?php echo strtoupper($customer_username);?> PROFILE | RENTABAI</title>
    </head>
	<body class="antialiased" style="background-image: url('css/img/forblur-bg.jpg');">
	<?php 
		include 'actions/connection.php';
		$sql = "SELECT * FROM tbl_customer";
		$result = mysqli_query($db, $sql);
		if($result){
			$row = mysqli_fetch_assoc($result);
			$customer_image = $row['image'];
			$_SESSION['customer_image'] = $customer_image;
			$customer_id1 = $row['id'];
			$customer_username1 = $row['username'];
			$customer_email1 = $row['email'];
			$customer_firstname1 = $row['firstname'];
			$customer_lastname1 = $row['lastname'];
			$customer_phone1 = $row['phone'];
			$customer_city1 = $row['city'];
			$customer_barangay1 = $row['barangay'];
			$customer_street1 = $row['street'];
		}
	?>
	<div class="homepage-navbar-div">
		<!--START NAVBAR-->
		<nav class="navbar navbar-expand-lg bg-light">
		<div class="container-fluid">
			<!--RENTABAI LOGO-->  
			<a class="navbar-brand" href="home.php"><img src="css/RentaBaiOfficialLOGO.png"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			
		</div>
		
			<div class="w3-dropdown-hover w3-right">
				<?php
					include 'actions/connection.php';
					$sql = "SELECT * FROM tbl_customer WHERE id='$customer_id'";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
				?>

				<button class="w3-button w3-round-large"><?php echo $customer_username;?> <img class="w3-circle" src='profile_pictures/<?php echo $row['image']?>' height="30px" width="30px"></button>
			
				
				<div class="w3-dropdown-content w3-bar-block w3-border">
				<button class="w3-button w3-blue w3-bar-item" onclick="modalControl('subscription', 'block')">Subscribe</button>
				<a href="customer_profile.php" class="w3-bar-item w3-button w3-hover-blue">Profile<a>
				<a href="my_order.php" class="w3-bar-item w3-button w3-hover-blue">My Order</a>
				<a href="actions/logout.php" class="w3-bar-item w3-button w3-hover-red">Logout</a>
				</div>
			</div>
		</nav>
	</div>
	<!--END NAVBAR-->

	<!--START CUSTOMER PROFILE-->
	<div class="backbody-home">
		<div class="border-modal-login max-w-md w3-animate-top">
			<div class="modalcon-login px-8 py-12 max-w-md mx-auto" style="height:775px;">
				<span class="w3-right buttonlogin-home"><a href="home.php"><button class="modal1-btn w3-right">&times;</button></a>
				</span>
				<form action="actions/customer_profile.php" method="POST" enctype="multipart/form-data">
					<h3><?php echo strtoupper($customer_username);?>'S Profile</h3>
					
					<input type="file" name="my_image"/>
					<br>
					<div class="w3-center">
						<a href="profile_pictures/<?php echo $row['image'];?>" target="_blank">
						<img class="w3-circle" src='profile_pictures/<?php echo $row['image'];?>' height="50px" width="50px">
						</a>
					</div>
					<b>Username</b>
					<input class="w3-input w3-border w3-round w3-light-gray" name="customer_username" readonly value="<?php echo $customer_username1;?>"/>
					<b>Email</b>
					<input class="w3-input w3-border w3-round w3-light-gray" name="customer_email" readonly value="<?php echo $customer_email1;?>"/>
					<b>Firstname</b><input class="w3-input w3-border w3-round" name="customer_firstname" value="<?php echo $customer_firstname1;?>"/>
					<b>Lastname</b><input class="w3-input w3-border w3-round" name="customer_lastname" value="<?php echo $customer_lastname1;?>"/>
					<b>Phone</b><input class="w3-input w3-border w3-round" name="customer_phone" value="<?php echo $customer_phone1;?>"/>
					<b>City </b><input class="w3-input w3-border w3-round" name="customer_city" value="<?php echo $customer_city1;?>"/>
					<b>Barangay</b><input class="w3-input w3-border w3-round" name="customer_barangay" value="<?php echo $customer_barangay1;?>"/>
					<b>Street</b><input class="w3-input w3-border w3-round" name="customer_street" value="<?php echo $customer_street1;?>"/>
					<br>
					<a href="customer_change_password.php">Change Password</a>
					<input class="w3-button w3-blue w3-border w3-round w3-right" type="submit" name="submit" value="Update Basic Information"/>
				</form>	
			</div>
		</div>
	</div>
	<!--END CUSTOMER PROFILE-->

	<!--START OF FOOTER-->
	<footer class="footer-con">
		<div class="container-fluid">
			<div class="footer-home container-fluid">
				<section class="navbar-brand"><img src="css/RentaBaiOfficialLOGO.png">
					<h4>About RENTABAI</h4>
					<p class="copyright-footer">Copyright © 2023 - All Rights Reserved - RENTABAI</p>
					<p class="comjoin-footer">Join Our Community</p>

				</section>
	<!--SOCIAL MEDIA-->
				<section class="social-meds">
						<a href="#"><img class="logo-footer fb-footer" src="css/facebook.png"></a>
						<a href="#"><img class="logo-footer insta-footer" src="css/instagram.png"></a>
						<a href="#"><img class="logo-footer tweet-footer" src="css/twitter.png"></a>
				</section>
				<section class="rentdesc-home">
					<span class="leadrent-footer">RENTABAI</span>
					<ul class="desctext-footer">
						<li><a href="#"><span class="footxt1">Log In / Register</span></a></li>
						<li><a href="#"><span class="footxt1">Communities</span></a></li>
						<li><a href="#"><span class="footxt1">E-Bike Brands</span></a></li>
						<li><a href="#"><span class="footxt1">E-Scooter Brands</span></a></li>
					</ul>
				</section>
					<section class="termsnprivacy">
						<a href="#"><span class="termsfooter">Terms</span></a>
						<a href="#"><span class="privfooter">Privacy</span></a>
					</section>
			</div>
		</div>
	</footer>
<!--END OF FOOTER--->   
	<!--START SUBSCRIPTION MODAL-->
	<div class="w3-modal" id="subscription">
		<div class="w3-container w3-modal-content w3-round-large w3-padding-large w3-animate-opacity w3-padding-large" style="width:30%">
			
				<div class="w3-center">
					<img src="img/RentaBaiOfficialLOGO.png" height="50" width="400">
				</div>
				<br>
				<div class="w3-center">
					<a href="img/sub.jpg" target="_blank">
						<img class="w3-round-large" src="img/sub.jpg" height="550" width="300">
					</a>
					<h2>09499690998</h2>
				</div>
		</div>
	</div>
	<!--END SUBSCRIPTION MODAL-->
	</body>
	
		<script>
		function modalControl(modalID, modalCon){
			document.getElementById(modalID).style.display = modalCon;
		}
		
		var sub = document.getElementById('subscription');
			window.onclick = function(event) {
			if(event.target == sub){
				sub.style.display = 'none';
			}
		}
		

	</script>
</html>
