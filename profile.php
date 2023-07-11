<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION['rentor_username']){
		$rentor_id = $_SESSION['rentor_id'];
		$rentor_username = $_SESSION['rentor_username'];
		$rentor_email = $_SESSION['rentor_email'];
		$rentor_firstname = $_SESSION["rentor_firstname"];
		$rentor_lastname = $_SESSION["rentor_lastname"];
		$rentor_phone = $_SESSION['rentor_phone'];
		$rentor_city = $_SESSION['rentor_city'];
		$rentor_barangay = $_SESSION['rentor_barangay'];
		$rentor_street = $_SESSION['rentor_street'];
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
		<title><?php echo strtoupper($rentor_username);?> PROFILE | RENTABAI</title>
    </head>
	<body class="antialiased" style="background-image: url('css/img/forblur-bg.jpg');">
	<div class="homepage-navbar-div">
		<nav class="navbar navbar-expand-lg bg-light">
		<div class="container-fluid">
	<!--RENTABAI LOGO-->  
			<a class="navbar-brand" href="rentor_shop.php"><img src="css/RentaBaiOfficialLOGO.png"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			
		</div>
			<div class="w3-dropdown-hover w3-right">
				<?php if($_SESSION['rentor_image']) {?>
				<button class="w3-button w3-round-large"><?php echo $rentor_username;?> <img class="w3-circle" src='profile_pictures/<?php echo $_SESSION['rentor_image'];?>' height="30px" width="30px"></button>
				<?php } else{?>
				<button class="w3-button "><?php echo $rentor_username;?></button>
				<?php }?>
				<div class="w3-dropdown-content w3-bar-block w3-border w3-round-large">
					<a href="rentor_profile.php" class="w3-bar-item w3-button w3-hover-blue">Profile<a>
					<a href="reserved_order.php" class="w3-bar-item w3-button w3-hover-blue">Pending Reservation<a href="actions/logout_rentor.php" class="w3-bar-item w3-button w3-hover-red">Logout</a>
					
				</div>
			</div>
		</nav>
	</div>
<!--END OF NAVBAR-->

<!--START PROFILE-->
<?php
	include 'actions/connection.php';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM tbl_order WHERE id='$id'";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result);
		$customer_username = $row['customer_username'];
		$customer_firstname = $row['customer_firstname'];
		$customer_lastname = $row['customer_lastname'];
		$customer_phone = $row['customer_phone'];
		$customer_city = $row['customer_city'];
		$customer_barangay = $row['customer_barangay'];
		$customer_street = $row['customer_street'];
	}
?>

	<div class="backbody-home">
		<div class="border-modal-login max-w-md w3-animate-top">
			<div class="modalcon-login px-8 py-12 max-w-md mx-auto" style="height:500px;">
				<span class="w3-right buttonlogin-home"><a href="reserved_order.php"><button class="modal1-btn w3-right">&times;</button></a>
				</span>
					<b>Firstname</b>
					<input class="w3-light-gray" readonly type="text" name="customer_firstname" value="<?php echo $customer_firstname?>" />
					<b>Lastname</b>
					<input class="w3-light-gray" readonly type="text" name="customer_lastname" value="<?php echo $customer_lastname?>"/>
					<b>Phone</b>
					<input class="w3-light-gray" readonly type="text" name="customer_phone" value="<?php echo $customer_phone?>"/>
					<b>City</b>
					<input class="w3-light-gray" readonly type="text" name="customer_city" value="<?php echo $customer_city?>"/>
					<b>Barangay</b>
					<input class="w3-light-gray" readonly type="text" name="customer_barangay" value="<?php echo $customer_barangay?>"/>
					<b>Street</b>
					<input class="w3-light-gray" readonly type="text" name="customer_street" value="<?php echo $customer_street?>"/>
					
			</div>
		</div>
	</div>
<!--END PROFILE-->

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
	</body>
</html>
