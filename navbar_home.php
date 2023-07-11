<?php 
	session_start();
	if($_SESSION['customer_username']){
		$customer_id = $_SESSION['customer_id'];
		$customer_username = $_SESSION["customer_username"];
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
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HOME | RENTABAI</title>
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
	<!--START BODY-->
    <body class="antialiased">
	<!---START OF NAVBAR--->
        <div class="navbar-static homepage-navbar-div">
            <nav class="navbar navbar-expand-lg bg-light">
			<div class="container-fluid">
			  <a class="navbar-brand" href="home.php"><img src="css/img/RentaBaiOfficialLOGO.png"></a>
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
					
						<form action="search.php" method="GET">
							<input style="width:300px;" class="w3-round-large w3-input w3-border" type="text" name="search" placeholder="Search here...">
							<button type="submit" class="fa fa-search w3-button w3-right w3-circle" style="position:absolute; top:16px; right:141px;"></button>
						</form>
						
					<?php
					include 'actions/connection.php';
					$sql = "SELECT * FROM tbl_customer WHERE id='$customer_id'";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					
					?>
					<div class="w3-dropdown-hover w3-right">
						<?php if($_SESSION['customer_image']){?>
						<button class="w3-button w3-round-large"><?php echo $customer_username;?> <img class="w3-circle" src='profile_pictures/<?php echo $row['image']?>' height="30px" width="30px"></button>
						<?php } else{?>
							<button class="w3-button w3-round-large"><?php echo $customer_username;?></button>
						<?php } ?>
				
						<div class="w3-dropdown-content w3-bar-block w3-border w3-round-large">
							<button class="w3-button w3-blue w3-bar-item" onclick="modalControl('subscription', 'block')">Subscribe</button>
							<a href="customer_profile.php" class="w3-bar-item w3-button w3-hover-blue">Profile</a>
							<a href="my_order.php" class="w3-bar-item w3-button w3-hover-blue">My Order</a>
							<a href="actions/logout.php" class="w3-bar-item w3-button w3-hover-red">Logout</a>
						</div>
					</div>
				</div>
			</div>
            </nav>
        </div>
<!--END OF NAVBAR-->