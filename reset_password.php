<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="assets/css/w3.css">
		<link rel="stylesheet" href="assets/css/splash.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	</head>

	<body>
		<br>
		<br>
		<br>
		<br>
		
		<!--LOGIN FORM-->
		<div class="w3-padding-large w3-round-xlarge w3-black" style="margin:auto; width:20%;">
			<a class="w3-left w3-xlarge" style="text-decoration:none;" href="index.php"><b>&#x276E;</b></a>
			<form action="actions/forgot_password.php" method="POST">
				<br>
				<!--IMAGE LOGO-->
				<div class="w3-center">
					<a href="index.php"><img class="fade-in" src="assets/img/splash1.png" height="125" width="150"></a>
				</div>
				<h4 class="w3-text-white"><b>Reset Password</b></h4>
				<br>
				<?php
					if(isset($_GET['sent'])){
						?>
						<b class="w3-text-green"><?php echo $_GET['sent'];?></b>
						<?php
					}
				?>
				<!--PASSWORD-->
				<input class="w3-input w3-dark-gray w3-round-large" type="password" name="password1" placeholder="Email Address">
				<input class="w3-input w3-dark-gray w3-round-large" type="password" name="password2" placeholder="Email Address">
				<br>
				<!--SUBMIT BUTTON-->
				<div class="w3-center">
					<input style="width:100%;" class="w3-button w3-dark-gray w3-round-large w3-hover-green" type="submit" name="submit" value="Reset Password">
				</div>
			</form>
			<br>
			<br>
		</div>
	</body>
</html>