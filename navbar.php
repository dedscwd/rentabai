<!DOCTYPE html>
<?php
	session_start();
	if($_SESSION['rentor_username']){
		$rentor_id = $_SESSION['rentor_id'];
		$rentor_image = $_SESSION['rentor_id'];
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

        <title>RENTOR SHOP</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
			<div class="container-fluid"> <a class="navbar-brand" href="rentor_shop.php"><img src="css/img/RentaBaiOfficialLOGO.png"></a>
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item2">
								<a class="nav-link active" aria-current="page" href="rentor_shop_e-bike.php" style="color: #18A0FB;"><p class="ebnav-home">E-Bike</p></a>
							</li>
							<li class="nav-item1">
								<a class="nav-link active" aria-current="page" href="rentor_shop_e-scooter.php" style="color: #18A0FB;"><p class="enav-home">E-Scooter</p></a>
							</li>
							
						<li class="nav-item3">
							<a class="nav-link active" aria-current="page" href="#" style="color: #18A0FB;"><p class="ecnav-home">Community</p></a>
						</li>
						<li class="nav-item4">
							<a class="nav-link active" aria-current="page" href="#" style="color: #18A0FB;"><p class="esnav-home">Support</p></a>
						</li>
					</ul>

					
					
					<div class="w3-dropdown-hover w3-right">
						<?php if($_SESSION['rentor_image']) {?>
						<button class="w3-button w3-round-large"><?php echo $rentor_username;?> <img class="w3-circle" src='profile_pictures/<?php echo $_SESSION['rentor_image'];?>' height="30px" width="30px"></button>
						<?php } else{?>
						<button class="w3-button "><?php echo $rentor_username;?></button>
						<?php }?>
						<div class="w3-dropdown-content w3-bar-block w3-border w3-round-large">
							<button class="w3-button w3-blue w3-bar-item" onclick="modalControl('subscription', 'block')">Subscribe</button>
							<a href="rentor_profile.php" class="w3-bar-item w3-button w3-hover-blue" style="text-decoration:none;">Profile<a>
							<?php 
								include 'actions/connection.php';
								$sql = "SELECT COUNT(*) FROM tbl_order WHERE rentor_notify = '1' and rentor_id='$rentor_id'";
								$result = mysqli_query($db, $sql);
								$row = mysqli_fetch_assoc($result);
								$notify = $row['COUNT(*)'];
							?>
							<a href="actions/rentor_reserve.php" onclick="window.location.href='reserved_order.php'"style="text-decoration:none;" class="w3-bar-item w3-button w3-hover-blue">Pending <button disabled class="w3-red w3-circle w3-small"><?php echo $notify?> </button>Reservation</a>
							<a href="actions/logout_rentor.php" style="text-decoration:none;" class="w3-bar-item w3-button w3-hover-red">Logout</a>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
<!--END OF NAVBAR-->