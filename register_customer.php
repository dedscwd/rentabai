<!--START MODAL RENTOR/CUSTOMER-->
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
		<title>CUSTOMER REGISTRATION</title>
    </head>
	
	<body class="antialiased" style="background-image: url('css/img/forblur-bg.jpg');">
	<!--START NAVBAR-->
		<div class="homepage-navbar-div">
			<nav class="navbar navbar-expand-lg bg-light">
			<div class="container-fluid">
				<!--RENTABAI LOGO-->  
				<a class="navbar-brand" href="index.php"><img src="css/RentaBaiOfficialLOGO.png"></a>
				<!--/RENTABAI LOGO-->  
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
	
	<!--START REGISTRATION FORM RENTOR-->
		<div class="backbody-home">
			<div class="regmodal-home">
				<div class="rentorform">
					<div class="rentorformsub1">
						<form action="actions/register_customer.php" method="POST">
							<section class="rentorinputform1">
								<h3>CUSTOMER REGISTRATION</h3>
								<div class="w3-center w3-text-red">
										<?php
										if(isset($_GET["error"])){
											echo $_GET["error"];
										}
										?>
									</div>
									<div class="w3-center w3-text-green">
										<?php
										if(isset($_GET["success"])){
											echo $_GET["success"];
										}
										?>
									</div>
								Firstname <br>
								<input type="text" class="re-fname w3-input" name="firstname"/>
								Lastname
								<input type="text" class="re-lname w3-input" name="lastname"/>
								Email
								<input type="email" class="re-email w3-input" name="email"/>
								Username
								<input type="text" class="re-uname w3-input" name="username"/>
								Password
								<input type="password" class="re-pass w3-input" name="password" minlength="8" maxlength="24" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
								Re-enter Password
								<input type="password" class="re-pass w3-input" name="password1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
								Age
								<input type="text" class="re-age w3-input" name="age"/>
								Date of birth
								<input type="date" class="re-date w3-input" name="dob"/>
								Phone Number
								<input type="text" class="re-phone phonenumber w3-input" name="phone"/>
							</section>
					</div> 
					
					<div class="rentorformsub2">
								<section class="rentorinputform2">
										<a href="register_as.php" class=" w3-right w3-text-black"><input type="button" value="&times;"/></a>
									<h3>ADDRESS</h3>
									Postal Code
									<input type="postalcode" class="w3-input" name="postal"/>
									<br>
									Province
									<input type="province" class="w3-input" name="province"/>
									<br>
									City
									<input type="city" class="w3-input" name="city"/>
									<br>
									Barangay
									<input type="barangay" class="w3-input" name="barangay"/>
									<br>
									Street Name
									<input type="streetname" class="w3-input" name="street"/><br><br><br>
									<input class="w3-right rentor-reg" type="submit" name="submit" value="Register"/>
								</section>
					</div>
						</form>
				</div>
			</div>
		</div>
	<!--END REGISTRATION FORM RENTOR-->
	<body>

	<!--START OF FOOTER-->
	<footer class="footer-con">
		<div class="container-fluid">
			<div class="footer-home container-fluid">
				<section class="navbar-brand"><img src="css/img/RentaBaiOfficialLOGO.png">
					<h4>About RENTABAI</h4>
					<p class="copyright-footer">Copyright © 2023 - All Rights Reserved - RENTABAI</p>
					<p class="comjoin-footer">Join Our Community</p>

				</section>
				
				<section class="social-meds">
						<a href="#"><img class="logo-footer fb-footer" src="css/img/facebook.png"></a>
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
	</body>
</html>
<!--DONE-->