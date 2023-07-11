<?php
	session_start();
	include 'actions/connection.php';
	if($_SESSION['rentor_username']){
		$rentor_username = $_SESSION['rentor_username'];
		$order_id = $_SESSION['order_id'];
		$rentor_id = $_SESSION['rentor_id'];
	}
	
	
	$id = $_GET['updateID'];
	$sql = "SELECT * FROM tbl_product WHERE id='$id'";
	$result = mysqli_query($db, $sql);
	while($row = mysqli_fetch_assoc($result)){
		$name = $row['name'];
		$price = $row['price'];
		$biketype = $row['biketype'];
		$description = $row['description'];
		$quantity = $row['quantity'];
		$image = $row['image'];
	}
	if(isset($_POST['update'])){
		$name1 = $_POST['name'];
		$price1 = $_POST['price'];
		$biketype1 = $_POST['bicycletype'];
		$description1 = $_POST['description'];
		$quantity1 = $_POST['quantity'];
		
		$sql1 = "UPDATE tbl_product SET name='$name1', price='$price1', biketype='$biketype1', description='$description1', quantity='$quantity1' WHERE id='$id'";
		$result1 = mysqli_query($db, $sql1);
		if($result1){
			echo "<script>alert('PRODUCT UPDATED!');
				window.location.replace('rentor_shop.php');
			</script>";
			$sql = "UPDATE tbl_order SET name='$name1', price='$price1', biketype='$biketype1', description='$description1' WHERE id='$order_id'";
			mysqli_query($db, $sql);
		}
		else{
			echo "failed";
		}
	}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UPDATE PRODUCT</title>
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
				</div>
		</div>
		</nav>
	</div>
	<!--END OF NAVBAR-->

	<!--START UPDATE FORM-->
	<div class=" w3-round-large w3-animate-left w3-padding-large" style="margin:auto; width:70%;">
		<a href="rentor_shop.php"><span class="w3-right w3-button w3-round-large w3-text-black">&times;</span></a>
		<?php
		if(isset($_POST['submit']) and isset($_FILES['my_image'])){
			$img_name = $_FILES['my_image']['name'];
			$tmp_name = $_FILES['my_image']['tmp_name'];
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png");
			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = "IMG-".date("Ymdhmi").'.'.uniqid().'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
			}
		$sql = "UPDATE tbl_product SET image='$new_img_name' WHERE id='$id'";
		mysqli_query($db, $sql);
		
		$sql1 = "UPDATE tbl_order SET image='$new_img_name' WHERE id='$order_id'";
		mysqli_query($db, $sql1);
		}
		?>
		<div class="w3-row w3-padding-large w3-card w3-round-large w3-light-gray" >
			<h2 class="w3-center">UPDATE PRODUCT</h2>
			<!--START FORM UPDATE IMAGE-->
			<div class="w3-padding-large">
			<form method="POST" enctype="multipart/form-data">
				<input id="id1" type="file" name="my_image"/>
				<br>
				<input class="w3-button w3-hover-blue w3-round-large w3-blue"type="submit" name="submit" value="Upload selected image"/></small>
			</form>
			</div>
			<!--END FORM UPDATE IMAGE-->
				<div class="w3-half w3-padding-large w3-round-large w3-center w3-padding-large">
					<div class="padding-large">
						<img class="w3-border w3-round-large" src="uploads/<?php echo $image;?>" height="300" width="300">
					</div>
					<br>
				</div>
		<!--START UPDATE PRODUCT DETAILS-->
			<form method="POST" >
				<div class="w3-half w3-padding-large w3-round-large">
					<b>Product Name</b><input type="text" name="name" class="w3-input w3-border w3-round-large" value="<?php echo $name?>"/>
					<b>Price</b><input type="text" name="price" class="w3-input w3-border w3-round-large" value="<?php echo $price?>"/>
					<b>Bicycle Type</b>
					<select class="w3-select w3-border w3-round-large" name="bicycletype" value="<?php echo $biketype?>">
						<option value="E-Bike">E-Bike</option> 
						<option value="E-Scooter">E-Scooter</option>
					</select>
					<b>Description</b><input type="text" name="description" class="w3-input w3-border w3-round-large" value="<?php echo $description?>"/>
					<b>Quantity</b><input type="number" name="quantity" class="w3-input w3-border w3-round-large" value="<?php echo $quantity?>"/>
					<br>
					<input class="w3-button w3-blue w3-right w3-round-large" type="submit" name="update" value="Update Product"/>
					<br>
				</div>
			</form>
		</div>
	<!--END UPDATE PRODUCT DETAILS-->
	</div>
	
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
				<br>
		</div>
	</div>
<!--END UPDATE FORM-->

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