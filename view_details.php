<?php
	include 'navbar_home.php';
?>
	<div class="w3-center w3-padding w3-card-4">
		<form>
		<?php
			include 'actions/connection.php';
			if(isset($_GET['productID'])){
				$id = $_GET['productID'];
				$sql = "SELECT * FROM tbl_product WHERE id='$id'";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_assoc($result);
				$image = $row['image'];
				$price = $row['price'];
				$biketype = $row['biketype'];
				$description = $row['description'];
				$quantity = $row['quantity'];
				$_SESSION['rentor_id'] = $row['rentor_id'];
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
			<!--START VIEW DETAILS FORM-->
			<div class="card w3-padding-large w3-border w3-round w3-card w3-animate-right">
				<div class="row w3-padding-large">
					<div class="col-md-4 w3-border w3-padding-large w3-light-gray w3-round" height="300">
						<a href="uploads/<?php echo $row['image']?>" target="_blank">
						<img name="" class="img-fluid rounded-start" src="uploads/<?php echo $row['image']?>" height="500" width="500">
						</a>
						<input class="w3-button w3-blue w3-round-large" type='button' onclick="modalControl('modal2', 'block')" value="Rentor Details"/>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<h2 class="card-title w3-light-gray w3-padding-large w3-round"><?php echo $row['name']?></h2>
								<h3 class="card-text w3-text-blue w3-light-gray w3-padding-16 w3-round">Php<?php echo $row['price']?>/Day</h3>
							<br>
								<textarea class="w3-input w3-light-gray w3-round" style="resize:none; height:150px; width:100%;" readonly><?php echo $row['description']?></textarea>
								
								<small class="w3-left w3-text-gray">Stock: <?php 
									if($quantity > 0){
										echo $quantity;
									}
									else{
										echo "<b class='w3-text-red'>"."OUT OF STOCK!</b>";
									}
									
									?></small>
								<br>
								<h4 class="card-text w3-light-gray w3-padding-large w3-round"><?php echo $row['biketype']?></h4>
								<?php if($quantity > 0){?>
							<input class="w3-button w3-blue w3-padding-large w3-round" type="button" onclick="modalControl('modal1','block')" value="Checkout"/>
								<?php }else{
									?>
									<input class="w3-button w3-blue w3-padding-large w3-round" type="button" disabled value="Checkout">
									<?php
									?>
									
								<?php }?>
						</div>
					</div>
				</div>
			</div>
			<!--END VIEW DETAILS FORM-->	
	</div>
		</form>
</div>
	


	<?php
		include "actions/connection.php";
			$sql = "SELECT * FROM tbl_customer where id='$customer_id'";
			$result = mysqli_query($db, $sql);
			if($result){
				while($row = mysqli_fetch_assoc($result)){
				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$phone = $row['phone'];
				$province = $row['province'];
				$barangay = $row['barangay'];
				$postal = $row['postal'];
				$street = $row['street'];
				}
			}
		
	?>

<!--MODAL START-->
	<?php
			if(isset($_GET['productID'])){
				$id = $_GET['productID'];
				$sql = "SELECT * FROM tbl_product WHERE id='$id'";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_assoc($result);
				$id = $row['id'];
				$_SESSION['product_id'] = $id;
				$image = $row['image'];
				$quantity = $row['quantity'];
				$price = $row['price'];
				$biketype = $row['biketype'];
				$description = $row['description'];
				$quantity = $row['quantity'];
				$rentor_id = $row['rentor_id'];
				
				
			}
		?>
	<!--START CHECKOUT-->
	<div class="w3-modal" id="modal1">
		<div class="w3-modal-content w3-padding-large w3-round w3-animate-zoom" style="width:50%;">
		<span class="w3-right buttonlogin-home" onclick="modalControl('modal1','none')"><button class="modal1-btn">&times;</button></span>
			<form action="actions/order.php" method="POST">
			<input type="hidden" name="rentor_username" value="<?php echo $rentor_username?>"/>
			<input type="hidden" name="rentor_firstname" value="<?php echo $rentor_firstname?>"/>
			<input type="hidden" name="rentor_lastname" value="<?php echo $rentor_lastname?>"/>
			<input type="hidden" name="rentor_phone" value="<?php echo $rentor_phone?>"/>
			<input type="hidden" name="rentor_city" value="<?php echo $rentor_city?>"/>
			<input type="hidden" name="rentor_barangay" value="<?php echo $rentor_barangay?>"/>
			<input type="hidden" name="rentor_street" value="<?php echo $rentor_street?>"/>
			<input type="hidden" name="customer_image" value="<?php echo $customer_image?>"/>
			<input type="hidden" name="customer_username" value="<?php echo $customer_username?>"/>
			<input type="hidden" name="customer_firstname" value="<?php echo $customer_firstname?>"/>
			<input type="hidden" name="customer_lastname" value="<?php echo $customer_lastname?>"/>
			<input type="hidden" name="customer_phone" value="<?php echo $customer_phone?>"/>
			<input type="hidden" name="customer_city" value="<?php echo $customer_city?>"/>
			<input type="hidden" name="customer_barangay" value="<?php echo $customer_barangay?>"/>
			<input type="hidden" name="customer_street" value="<?php echo $customer_street?>"/>
				<h3 class="w3-center">PLACE RESERVATION</h3>
				<!--THIS IS MODAL FOR RESERVATION-->
				<div class="w3-padding-large w3-center">
					<!--HIDE RENTOR ID-->
					<input type="hidden" name='rentor_id' value="<?php echo $rentor_id;?>"/>
					<!---->
					<img class="img-fluid rounded-start" src="uploads/<?php echo $row['image']?>" height="300px" width="300px">
					<input type="hidden" class="w3-round w3-border w3-input w3-light-gray" name="image" readonly value="<?php echo $row['image']?>"/>
				</div>
				
				<div class="">
					<div class="">
						<b>Name</b>
						<input type="text" class="w3-round w3-border w3-input w3-light-gray" name="name" readonly value="<?php echo $row['name']?>"/>
						<b>Price</b>
						<input type="text" class="w3-round w3-border w3-input w3-light-gray" name="price" readonly value="<?php echo $row['price']?>"/>
						<b>Description</b>
						<textarea type="text" class="w3-round w3-border w3-input w3-light-gray" name="description" readonly style="resize:none; height:100px; width:100%;" readonly><?php echo $row['description']?></textarea>
						<b>Bike Type</b>
						<input type="text"	 class="w3-round w3-border w3-input w3-light-gray" name="biketype" readonly value="<?php echo $row['biketype']?>"/>
					</div>
				</div>
				<!--THIS IS MODAL FOR RESERVATION-->
				<b>From</b>
				<input required class="w3-border w3-round w3-input"  type="date" name="start_date"/>
				<b>To</b>
				<input required class="w3-border w3-round w3-input"  type="date" name="end_date"/>
				<b>Quantity</b>
				<br><input required class="w3-border w3-round w3-input"  type="number" name="quantity" style="width:50px;" value="1"/>
				<br>
				<textarea required class="w3-input w3-border" style="resize:none;" rows="4" name="message" placeholder="Message"></textarea>
				<br>
				<div class="w3-center">
					<input class="w3-button w3-blue w3-round" type="submit" name="reserve" value="Reserve Now"/><br>
				</div>
				<br>
			</form>
		</div>
	</div>
	<!--END CHECKOUT-->
	<!--MODAL VIEW RENTOR DETAILS END-->
	<div class="w3-modal" id="modal2">
		<div class="w3-content w3-white w3-padding-large w3-round-large w3-animate-zoom	" style="width:40%;">
			<span class="w3-right buttonlogin-home" onclick="modalControl('modal2','none')"><button class="modal1-btn">&times;</button></span>
			<div class="w3-center"><h3>RENTOR DETAILS</h3></div>
			<br>
			<b>Rentor Username:</b>
			<input class="w3-light-gray w3-input w3-round" name="rentor_username" readonly value="<?php echo $rentor_username?>"/>
			<b>Rentor Fullname</b>
			<input class="w3-light-gray w3-input w3-round" name="rentor_firstname" readonly value="<?php echo $rentor_firstname?>"/>
			<input class="w3-light-gray w3-input w3-round" name="rentor_lastname" readonly value="<?php echo $rentor_lastname?>"/>
			<b>Rentor Phone</b>
			<input class="w3-light-gray w3-input w3-round" name="rentor_phone" readonly value="<?php echo $rentor_phone?>"/>
			<b>Rentor Address</b>
			<input class="w3-light-gray w3-input w3-round" name="rentor_city" readonly value="<?php echo $rentor_city?>"/>
			<input class="w3-light-gray w3-input w3-round" name="rentor_barangay" readonly value="<?php echo $rentor_barangay?>"/>
			<input class="w3-light-gray w3-input w3-round" name="rentor_street" readonly value="<?php echo $rentor_street?>"/>
			<br>
		</div>
	</div>
	<!--MODAL END-->
	</body>
	
	<!--START OF FOOTER-->
	<footer class="footer-con" oncontextmenu="return false;">
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
		var modal2 = document.getElementById('modal2');
			window.onclick = function(event) {
			if (event.target == modal1) {
			  modal1.style.display = "none";
			}
			if (event.target == modal2) {
			  modal2.style.display = "none";
			}
		}
		
		
	
	</script>
</html>