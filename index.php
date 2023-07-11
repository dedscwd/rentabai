<?php
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
	<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js">
</script>
 <script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js">
   </script>
   
   
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/welcome.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link rel="stylesheet" type="text/css" href="css/carousel.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/w3.css">
        <link rel="stylesheet" type="text/css" href="css/welcome.js">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<title>RENTABAI</title>
    </head>
    <body class="antialiased">
	<!---START OF NAVBAR--->
        <div class="navbar-static homepage-navbar-div">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="index.php"><img src="css/RentaBaiOfficialLOGO.png"></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item2">
									<a class="nav-link active" aria-current="page" href="e-bike.php" style="color: #18A0FB;"><p class="ebnav-home">E-Bikes</p></a>
								</li>
								<li class="nav-item1">
									<a class="nav-link active" aria-current="page" href="e-scooter.php" style="color: #18A0FB;"><p class="enav-home">E-Scooter</p></a>
								</li>
								<li class="nav-item3">
									<a class="nav-link active" aria-current="page" href="#" style="color: #18A0FB;"><p class="ecnav-home">Community</p></a>
								</li>
								<li class="nav-item4">
									<a class="nav-link active" aria-current="page" href="#" style="color: #18A0FB;"><p class="esnav-home">Support</p></a>
								</li>
							</ul>
								<!--START LOGIN/REGISTER AS-->
								<section class="btnnav-home">
                                	<a href="login_as.php"><input type="button" style="border: 1px solid #18A0FB;" class="btn btn1-navhome" value="Login"/></a>
                                	<a href="register_as.php"><input type="button" style="border: 1px solid #18A0FB;" class="btn btn2-navhome" value="Register"/></a>
								</section>
								<!--END LOGIN/REGISTER AS-->
						</div>
                </div>
            </nav>
        </div>
	<!--END OF NAVBAR-->

	<!--START OF VIDEO PAGE-->
        <div>
			<video autoplay muted loop style="width:100%;">
				<source src="css/vid/homepage-vid.mp4">
				Your Browser Does not Support Video Tag		
			</video>
        </div>
	<!--END OF VIDEO PAGE-->
        
	<!-- START OF CAROUSEL-->
	  <?php
		$db = mysqli_connect("localhost", "root", "", "rentabai");
		$sql = "select * from tbl_product";    
		$result = mysqli_query($db, $sql);
	?>
	
<div class="owl-carousel owl-theme owl-loaded owl-drag w3-padding-large w3-light-gray w3-center">
   <div class="owl-stage-outer">
		<div class="owl-stage" style="transform: translate3d(-1527px, 0px, 0px); transition: all 0.25s ease 0s; width: 3334px;">
		<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<div class="owl-item cloned" style="width: 128.906px; margin-right: 10px;">
				<div class="item">
					<img class="w3-border w3-round-large" src="uploads/<?php echo $row['image']?>" height="110px" width="175"></center>
					<b><?php echo $row['name']?></b>
					<br>
					<b>₱</b> <?php echo $row['price']?>/Day
					<br>
					<a href="view_details.php?productID=<?php echo $row['id'];?>"><button class="w3-button">View Details</button></a>
					<br>
					<small class="text-muted"><?php echo $row['biketype'];?></small>
				</div>
			</div>
		<?php } ?>	
        </div>
	</div>
</div>
	<!--- END OF CAROUSEL-->
	</body>
 
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
						<a href="https://www.facebook.com/dkhrl"><img class="logo-footer fb-footer" src="css/facebook.png"></a>
						<a href="https://www.instagram.com/dkhrl1/"><img class="logo-footer insta-footer" src="css/instagram.png"></a>
						<a href="#"><img class="logo-footer tweet-footer" src="css/twitter.png"></a>
				</section>
				<section class="rentdesc-home">
					<span class="leadrent-footer">RENTABAI</span>
					<ul class="desctext-footer">
						<li><a href="#"><span class="footxt1">Log In / Register</span></a></li>
						<li><a href="#"><span class="footxt1">Communities</span></a></li>
						<li><a href="e-bike.php"><span class="footxt1" onclick="modalControl('modal1', 'block')">E-Bike</span></a></li>
						<li><a href="e-scooter.php"><span class="footxt1">E-Scooter</span></a></li>
					</ul>
				</section>
					
			</div>
		</div>
	</footer>
	<!--END OF FOOTER--->   
   <script src="css/owl.js"></script>
</html>
