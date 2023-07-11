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
		<?php 
			include 'actions/connection.php';
			$sql = "SELECT * FROM tbl_rentor WHERE id='$rentor_id'";
			$result = mysqli_query($db, $sql);
			if($result){
				$row = mysqli_fetch_assoc($result);
				$rentor_image = $row['image'];
				$_SESSION['rentor_image'] = $rentor_image;
				$rentor_username1 = $row['username'];
				$rentor_email1 = $row['email'];
				$rentor_firstname1 = $row['firstname'];
				$rentor_lastname1 = $row['lastname'];
				$rentor_phone1 = $row['phone'];
				$rentor_city1 = $row['city'];
				$rentor_barangay1 = $row['barangay'];
				$rentor_street1 = $row['street'];
			}
		?>
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
						<button class="w3-button w3-round-large"><?php echo $rentor_username;?></button>
						<?php }?>
						<div class="w3-dropdown-content w3-bar-block w3-border">
							<button class="w3-button w3-blue w3-bar-item" onclick="modalControl('subscription', 'block')">Subscribe</button>
							<a href="rentor_profile.php" class="w3-bar-item w3-button w3-hover-blue">Profile<a>
								<?php 
								include 'actions/connection.php';
								$sql = "SELECT COUNT(*) FROM tbl_order WHERE rentor_notify = '1' and rentor_id='$rentor_id'";
								$result = mysqli_query($db, $sql);
								$row = mysqli_fetch_assoc($result);
								$notify = $row['COUNT(*)'];
							?>
							<a href="actions/rentor_reserve.php" onclick="window.location.href='reserved_order.php'"style="text-decoration:none;" class="w3-bar-item w3-button w3-hover-blue">Pending <button disabled class="w3-red w3-circle w3-small"><?php echo $notify?> </button>Reservation</a>
							<a href="actions/logout_rentor.php" class="w3-bar-item w3-button w3-hover-red">Logout</a>
							
						</div>
					</div>
		</nav>
	</div>
<!--END OF NAVBAR-->

<!--START PROFILE-->
	<div class="backbody-home ">
		<div class="border-modal-login max-w-md w3-animate-top">
			<div class="modalcon-login px-8 py-12 max-w-md mx-auto " style="height:775px;">
				<span class="w3-right buttonlogin-home"><a href="rentor_shop.php"><button class="modal1-btn w3-right">&times;</button></a>
				</span>
				<form action="actions/rentor_profile.php" method="POST" enctype="multipart/form-data">
					<h3><?php echo strtoupper($rentor_username);?>'s PROFILE</h3>
					<input type="file" name="my_image"/>
					<br>
					<div class="w3-center">
						<a href="profile_pictures/<?php echo $rentor_image;?>" target="_blank">
						<img class="w3-circle" src='profile_pictures/<?php echo $rentor_image;?>' height="50px" width="50px">
						</a>
					</div>
					<b>Username</b>
					<input class="w3-input w3-border w3-round w3-light-gray" name="rentor_username" readonly value="<?php echo $rentor_username1;?>"/>
					<b>Email</b>
					<input class="w3-input w3-border w3-round w3-light-gray" name="rentor_email" readonly value="<?php echo $rentor_email1;?>"/>
					<b>Firstname</b><input class="w3-input w3-border w3-round" name="rentor_firstname" value="<?php echo $rentor_firstname1;?>"/>
					<b>Lastname</b><input class="w3-input w3-border w3-round" name="rentor_lastname" value="<?php echo $rentor_lastname1;?>"/>
					<b>Phone</b><input class="w3-input w3-border w3-round" name="rentor_phone" value="<?php echo $rentor_phone1;?>"/>
					<b>City </b><input class="w3-input w3-border w3-round" name="rentor_city" value="<?php echo $rentor_city1;?>"/>
					<b>Barangay</b><input class="w3-input w3-border w3-round" name="rentor_barangay" value="<?php echo $rentor_barangay1;?>"/>
					<b>Street</b><input class="w3-input w3-border w3-round" name="rentor_street" value="<?php echo $rentor_street1;?>"/>
					<br>
					<a href="rentor_change_password.php">Change Password</a>
					<input class="w3-button w3-blue w3-border w3-round w3-right" type="submit" name="submit" value="Update Basic Information"/>
					
				</form>
					
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
						<li><a href="#"><span class="footxt1">Communities</span></a></li>
						<li><a href="rentor_shop_e-bike.php"><span class="footxt1">E-Bike</span></a></li>
						<li><a href="rentor_shop_e-scooter.php"><span class="footxt1">E-Scooter</span></a></li>
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
		var modal = document.getElementById('modal1');
		var sub = document.getElementById('subscription');
			window.onclick = function(event) {
			if (event.target == modal) {
			  modal.style.display = "none";
			}
			if(event.target == sub){
				sub.style.display = 'none';
			}
		}
		

	</script>
</html>
