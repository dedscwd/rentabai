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
        <title>LOGIN RENTOR</title>
	</head>
	
	<!--START BODY-->
	<body class="antialiased" style="background-image: url('css/img/forblur-bg.jpg');">
	<!--START NAVBAR-->
		<div class="homepage-navbar-div">
			<nav class="navbar navbar-expand-lg bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php"><img src="css/RentaBaiOfficialLOGO.png"></a>	
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<section class="btnnav-home">
						<a href="register_as.php"><input type="button" style="border: 1px solid #18A0FB;" class="btn btn2-navhome" value="Register"/></a>
					</section>
				</div>
			</div>
			</nav>
		</div>
	<!--END NAVBAR-->
	
	<!--START LOGIN FORM-->
	<div class="backbody-home">
		<div class="border-modal-login max-w-md w3-animate-top">
			<div class="modalcon-login px-8 py-12 max-w-md mx-auto">
				<span class="w3-right buttonlogin-home"> <a href="login_as.php"> <button class="modal1-btn">&times;</button></a></span>
				<h3>LOGIN RENTOR</h3>
				<div class="w3-center w3-text-red">
					<?php
					if(isset($_GET["error"])){
						echo $_GET["error"];
					}
					?>
				</div>
				<form action="actions/login_rentor.php" method="POST">
					<div class="modalcontent-home">
						Username
						<br>
						<input id="user-email" type="text" name="username"/><br><br>
						Password
						<input id="user-password" type="password" name="password"/>
						<br><br>
						<a href="password_reset.php">forgot password?</a>
						<br><br><br>
						<button class="login-home" type="submit" name="submit"><h5>Log In</h5></button>
						<br><br><br>
						
					</div>
				</form>
				<a href="register_as.php" class="donthaveaccount-home">I don't have account yet</a>
			</div>
		</div>
	</div>
	<!--END LOGIN FORM-->
	</body>
<!--END BODY-->

<!--START OF FOOTER-->
	<footer class="footer-con">
		<div class="container-fluid">
			<div class="footer-home container-fluid">
				<section class="navbar-brand"><img src="css/img/RentaBaiOfficialLOGO.png">
					<h4>About RENTABAI</h4>
					<p class="copyright-footer">Copyright © 2023 - All Rights Reserved - RENTABAI</p>
					<p class="comjoin-footer">Join Our Community</p>
				</section>
				<!--SOCIAL MEDIA-->
				<section class="social-meds">
						<a href="#"><img class="logo-footer fb-footer" src="css/facebook.png"></a>
						<a href="#"><img class="logo-footer insta-footer" src="css/img/instagram.png"></a>
						<a href="#"><img class="logo-footer tweet-footer" src="css/img/twitter.png"></a>
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

</html>