<?php
	include 'navbar.php';
?>
	<div class="w3-padding-large w3-container w3-animate-left">
		<div class="w3-center">
			<h3><?php echo strtoupper($rentor_username);?>'S PRODUCT/S</h3>
		</div>
		<table class="w3-table-all w3-hoverable w3-centered">
			<div class="w3-center w3-text-red">
				<?php
				if(isset($_GET["error"])){
					echo $_GET["error"];
				}
				?>
			</div>
				<thead>
					<tr class="w3-light-gray w3-padd">
						<th>Image</th>
						<th>Product Name</th>
						<th>Product Description</th>
						<th>Quantity</th>
						<th>Bike Type</th>
						<th>Price</th>
						<th>Date Created</th>
						<input class="w3-button w3-blue w3-round" type="button" name="addproduct" value="Add Product" onclick="modalControl('modal1','block')"/>
						<?php 
							$sql = "SELECT COUNT(*) FROM tbl_product WHERE rentor_id = '$rentor_id'";
							$result = mysqli_query($db, $sql);
							$row = mysqli_fetch_assoc($result);
							$total_products = $row['COUNT(*)'];
						?>
						<br>
						You have <b><?php echo $total_products;?></b> product/s
						<th>Operations</th>
					</tr>
				</thead>
				<?php
				include 'actions/connection.php';
				$sql = "SELECT * FROM tbl_product WHERE rentor_id='$rentor_id' ORDER BY id desc";
				$result = mysqli_query($db, $sql);
				if(mysqli_num_rows($result)>0){
					if($result){
						while($row = mysqli_fetch_assoc($result)){
							$id = $row['id'];
							$_SESSION['product_id'] = $id;
							$name = $row['name'];
							$description = $row['description'];
							$image = $row['image'];
							$quantity = $row['quantity'];
							$biketype = $row['biketype'];
							$price = $row['price'];
							$date_created = $row['date_created'];
				?>
					<tr>
						<td>
							<img src='uploads/<?php echo $image?>' height='50px' width='50px'>
						</td>
						<td><?php echo $name?></td>
						<td><?php echo $description?></td>
						<td><?php 
						if($quantity>0){
							echo $quantity;
						}else {?>
							<b class='w3-text-red'>OUT OF STOCK!</b>
						<?php }?>
						</td>
						<td><?php echo $biketype?></td>
						<td><b><?php echo $price?></b></td>
						<td><?php echo $date_created?></td>
						<td>
							<a href="update_product.php?updateID=<?php echo $id?>"><button class='w3-button w3-light-blue w3-round'>&#128394;</button></a>
							<a onclick="return confirm('DO YOU WANT DELETE THIS PRODUCT?')"href="actions/delete_product.php?deleteID=<?php echo $id?>"> <button class="w3-button w3-red w3-round">&times;</button> </a>
						</td>	
					</tr>
				<?php
							}
						}
					}
					else { ?>
			</table>
			<div class="w3-center">
			<img src="img/RENS.png">
					<?php }?>
			</div>
			
		</div>
	
		
	<!--START ADD PRODUCT MODAL-->
		<div class="w3-modal" id="modal1">
			<div class="w3-container w3-modal-content w3-round-large w3-padding-large w3-animate-top">
				<span class="w3-button w3-right" onclick="modalControl('modal1', 'none')">&times;</span>
				<form action="actions/add_product.php" method="POST" enctype="multipart/form-data">
					<h3 class="w3-center">ADD PRODUCT</h3>
					<div class="w3-row">
						<div class="w3-half">
							<input type="file" name="my_image"/>
						</div>
						<div class="w3-half">
						<!--PRODUCT/RENTOR DETAILS HIDDEN-->
							<input type="hidden" name="rentor_username" class="w3-input w3-border" readonly value="<?php echo $rentor_username;?>"/>
							<input type="hidden" name="rentor_firstname" class="w3-input w3-border" readonly value="<?php echo $rentor_firstname;?>"/>
							<input type="hidden" name="rentor_lastname" class="w3-input w3-border" readonly value="<?php echo $rentor_lastname;?>"/>
							<input type="hidden" name="rentor_phone" class="w3-input w3-border" readonly value='<?php echo $rentor_phone?>'/>
							<input type="hidden" name="rentor_city" class="w3-input w3-border" readonly value="<?php echo $rentor_city;?>"/>
							<input type="hidden" name="rentor_barangay" class="w3-input w3-border" readonly value="<?php echo $rentor_barangay;?>"/>
							<input type="hidden" name="rentor_street" class="w3-input w3-border" readonly value="<?php echo $rentor_street;?>"/>
						<!--PRODUCT/RENTOR DETAILS HIDDEN-->
							Product Name<input type="text" name="name" class="w3-input w3-border"/>
							Price/Day<input type="text" name="price" class="w3-input w3-border"/>
							Bicycle Type
							<select class="w3-select w3-border" name="bicycletype">
								<option value="E-Bike">E-Bike</option> 
								<option value="E-Scooter">E-Scooter</option>
							</select>
							Description<textarea type="text" name="description" class="w3-input w3-border" style="resize:none"/></textarea>
							Quantity<input type="text" name="quantity" class="w3-input w3-border"/>
							<br>
							<input class="w3-button w3-blue w3-right" type="submit" name="submit" value="Add Product"/>
							<br>
							<br>
						</div>
					</div>
				</form>
			</div>
		</div>
	<!--END ADD PRODUCT MODAL-->
	
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
	<!--END SUBSCRIPTION MODAL-->
	</body>
	<script>
		function modalControl(modalID, modalCon){
			document.getElementById(modalID).style.display = modalCon;
		}
		var modal = document.getElementById('modal1');
		var sub = document.getElementById('subscription');
			window.onclick = function(event) {
			if (event.target == modal) {
			  modal.style.display = "none";
			}
			if(event.target == sub){
				sub.style.display = 'none';
			}
		}
		

	</script>
</html>