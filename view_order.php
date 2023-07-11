<?php
	include 'navbar_home.php';
?>

	<div class="w3-center w3-padding w3-card-4">
		
		<?php
			if(isset($_GET['prodID'])){
				$id = $_GET['prodID'];
				$sql = "SELECT * FROM tbl_order WHERE id='$id'";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_assoc($result);
				$image = $row['image'];
				$name = $row['name'];
				$price = $row['price'];
				$biketype = $row['biketype'];
				$description = $row['description'];
				$quantity = $row['quantity'];
				$rentor_image = $row['rentor_image'];
				$rentor_username = $row['rentor_username'];
				$rentor_firstname = $row['rentor_firstname'];
				$rentor_lastname = $row['rentor_lastname'];
				$rentor_phone = $row['rentor_phone'];
				$rentor_city = $row['rentor_city'];
				$rentor_barangay = $row['rentor_barangay'];
				$rentor_street = $row['rentor_street'];
				
		
			}
		?>
			<!--VIEW DETAILS FORM-->
			<div class="card w3-padding-large w3-border w3-round w3-card w3-animate-right">
				<div class="row w3-padding-large">
					<div class="col-md-4 w3-borsder w3-padding-large w3-light-gray w3-round w3-border" style="height:470px;">
						<img class="img-fluid rounded-start" src="uploads/<?php echo $image?>" height="500px" width="500px">
						<?php
						?>
						<button class="w3-button w3-center w3-blue w3-round-large" onclick="modalControl('modal1', 'block')">Rentor Details</button>
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

	<!--MODAL VIEW RENTOR DETAILS START-->
	<div class="w3-modal" id="modal1">
		<div class="w3-content w3-white w3-padding-large w3-round-large w3-animate-zoom" style="width:40%;">
			<span class="w3-right buttonlogin-home" onclick="modalControl('modal1','none')"><button class="modal1-btn">&times;</button></span>
			<br>
			<b>Username:</b>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $rentor_username?>"/>
			<b>Fullname</b>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $rentor_firstname?>"/>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $rentor_lastname?>"/>
			<b>Phone</b>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $rentor_phone?>"/>
			<b>Address</b>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $rentor_city?>"/>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $rentor_barangay?>"/>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $rentor_street?>"/>
			<br>
		</div>
	</div>
<!--MODAL END-->
	
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
		
		var modal1 = document.getElementById('modal1');
			window.onclick = function(event) {
			if (event.target == modal1) {
			  modal1.style.display = "none";
			}
		}
	</script>
</html>