<!DOCTYPE html>
<?php
	include 'actions/connection.php';
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

        <title>View Details</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/welcome.css">
		<link rel="stylesheet" type="text/css" href="css/Escooter.css">
		<link rel="stylesheet" type="text/javascript" href="css/Escooter.js">
		<link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap/css/w3.css">
        <link rel="stylesheet" type="text/javascript" href="css/bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" type="text/javascript" href="css/welcome.js">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
	
	<body>
	<!---START OF NAVBAR--->
	<div class="navbar-static homepage-navbar-div">
		<nav class="navbar navbar-expand-lg bg-light">
		<div class="container-fluid">
		  <a class="navbar-brand" href="rentor_shop.php"><img src="css/img/RentaBaiOfficialLOGO.png"></a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span></button>
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

					<form class="form1 d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Search here..." aria-label="Search">
					</form>
					
					<div class="w3-dropdown-hover w3-right">
						<?php if($_SESSION['rentor_image']) {?>
						<button class="w3-button "><?php echo $rentor_username;?> <img class="w3-round-large" src='profile_pictures/<?php echo $_SESSION['rentor_image'];?>' height="30px" width="30px"></button>
						<?php } else{?>
						<button class="w3-button "><?php echo $rentor_username;?></button>
						<?php }?>
						<div class="w3-dropdown-content w3-bar-block w3-border">
						<a href="my_order.php" class="w3-bar-item w3-button">My Order</a>
						<a href="actions/logout.php"><input class="w3-button" type="button" value="Logout"/></a>
						</div>
					</div>
				</div>
		</div>
		</nav>
	</div>
	<!--END OF NAVBAR-->

	<div class="w3-center w3-padding w3-card-4">
		<form>
		<?php
			if(isset($_GET['productID'])){
				$id = $_GET['productID'];
				$sql = "SELECT * FROM tbl_order WHERE id='$id'";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_assoc($result);
				$image = $row['image'];
				$name = $row['name'];
				$price = $row['price'];
				$biketype = $row['biketype'];
				$description = $row['description'];
				$quantity = $row['quantity'];
		
			}
		?>
			<!--VIEW DETAILS FORM-->
			<div class="card w3-paddin w3-border w3-round w3-card w3-animate-right" style="height:500px; ">
				<div class="row w3-padding-large">
					<div class="col-md-4 w3-borsder w3-padding-large w3-light-gray w3-round" style="height:470px;">
						<a href="uploads/<?php echo $image?>" target="_blank">
						<img class="img-fluid rounded-start" src="uploads/<?php echo $image?>" height="500px" width="500px">
						</a>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h2 class="card-title w3-padding-large w3-light-gray"><?php echo $name?></h2>
								<h3 class="card-text w3-text-blue w3-light-gray w3-padding-16 w3-round">Php<?php echo $price?>/Day</h3>
							<br>
								<textarea class="w3-input w3-light-gray" style="resize:none; height:150px; width:100%;" readonly><?php echo $description?></textarea>
								<br>
								<h4 class="card-text w3-light-gray w3-padding-large w3-round"><?php echo $row['biketype']?></h4>
						</div>
					</div>
				</div>
			</div>
			<!--VIEW DETAILS FORM-->
			
				</div>
			
		</form>
	</div>
	
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
						<a href="https://www.instagram.com/dkhrl1"><img class="logo-footer insta-footer" src="css/instagram.png"></a>
						<a href="#"><img class="logo-footer tweet-footer" src="css/twitter.png"></a>
				</section>
				<section class="rentdesc-home">
					<span class="leadrent-footer">RENTABAI</span>
					<ul class="desctext-footer">
						<li><a href="https://facebook.com"><span class="footxt1">Communities</span></a></li>
						<li><a href="e-bike.php"><span class="footxt1" onclick="modalControl('modal1', 'block')">E-Bike</span></a></li>
						<li><a href="e-scooter.php"><span class="footxt1">E-Scooter</span></a></li>
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



	<script>
		function modalControl(modalId,modalCon){
			document.getElementById(modalId).style.display = modalCon;
		}
	</script>
</html>