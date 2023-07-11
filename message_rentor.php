<?php
	session_start();
	if($_SESSION['customer_username']){
		$customer_id = $_SESSION['customer_id'];
		$customer_username = $_SESSION['customer_username'];
		$rentor_id = $_SESSION['rentor_id'];
	}
	
	else{
		header("location: index.php");
	}
	
	
?>
<!DOCTYPE html>
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
		<title>REGISTER AS</title>
    </head>
	<body class="antialiased" style="background-image: url('css/img/forblur-bg.jpg');">
	<div class="homepage-navbar-div">
		<nav class="navbar navbar-expand-lg bg-light">
<!---THE ONE WHO CONTROLS THE NAVIGATION BAR--->
		<div class="container-fluid">
	<!--RENTABAI LOGO-->  
			<a class="navbar-brand" href="home.php"><img src="css/RentaBaiOfficialLOGO.png"></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="w3-dropdown-hover w3-right">
							<button class="w3-button "><?php echo $customer_username;?></button>
							<div class="w3-dropdown-content w3-bar-block w3-border">
							<a href="customer_profile.php" class="w3-bar-item w3-button">Profile</a>
							<a href="my_order.php" class="w3-bar-item w3-button">My Order</a>
							<a href="actions/logout.php"><input class="w3-button" type="button" value="Logout"/></a>
							</div>
						</div>
		</div>
		</nav>
	</div>
<!--END OF NAVBAR-->

	<div class="backbody-home">
		<div class="border-modal-login max-w-md w3-animate-top">
			<div class="modalcon-login px-8 py-12 max-w-md mx-auto">
				<span class="w3-right buttonlogin-home"><a href="home.php"><button class="modal1-btn">&times;</button></a>
				</span>
				<div class="w3-center">

					<h2>CHAT</h2>
				</div>
				<div class="w3-padding-large" style="overflow-y: scroll; height:300px;">
					<?php 
					include 'actions/connection.php';
					$sql = "SELECT * FROM tbl_message WHERE from_id = '$customer_id' and to_id = '$rentor_id'";
					$result = mysqli_query($db, $sql);
					while($row = mysqli_fetch_assoc($result)){
						$customer_id = $row['from_id'];
						$rentor_id = $row['to_id'];
						$message = $row['message'];
						$time = $row['time'];
					?>
					
					<?php echo $time . " "."<b>".$customer_username."</b>".": ". $row['message'] . "<br>";
					}
					?>
				</div>
				<div class="w3-padding-large">
					<form action="actions/customer_message.php" method="POST">
						<textarea class="w3-input w3-round w3-border" type="text" name="message" style="resize:none"></textarea>
						<br>
						<input class="w3-button w3-right w3-round w3-blue" type="submit" name="submit" value="Send Message"/>
					</form>	
				</div>
			</div>
		</div>
	</div>


<!--START OF FOOTER-->
	<footer class="footer-con" style="bottom: 0;">
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
						<li><a href="#"><span class="footxt1">E-Bike Brands</span></a></li>
						<li><a href="#"><span class="footxt1">E-Scooter Brands</span></a></li>
					</ul>
				</section>
			</div>
		</div>
	</footer>
<!--END OF FOOTER--->   
	</body>
</html>
