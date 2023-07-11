<?php
	include 'navbar.php';
?>
			
	<div class="w3-padding-large w3-container w3-animate-left">
		<div class="w3-center">
			<h3><?php echo strtoupper($rentor_username);?>'S PRODUCT/S</h3>
		</div>
		<table class="w3-table-all w3-centered w3-hoverable">
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
					$sql = "SELECT COUNT(*) FROM tbl_product WHERE biketype='e-scooter' and rentor_id = '$rentor_id' ORDER BY id";
					$result = mysqli_query($db, $sql);
					$row = mysqli_fetch_assoc($result);
					echo "<br>You have <b>". $row['COUNT(*)']."</b> product/s";
					?>
					<th>Operations</th>
				</tr>
				</thead>
				<?php
					include 'actions/connection.php';
					$sql = "SELECT * FROM tbl_product WHERE biketype='e-scooter' and rentor_id = '$rentor_id' ORDER BY id";
					$result = mysqli_query($db, $sql);
					if(mysqli_num_rows($result)>0){
						if($result){
							while($row = mysqli_fetch_assoc($result)){
								$id = $row['id'];
								$name = $row['name'];
								$description = $row['description'];
								$image = $row['image'];
								$quantity = $row['quantity'];
								$biketype = $row['biketype'];
								$price = $row['price'];
								$date_created = $row['date_created'];
								echo "<tr>
										<td><img src='uploads/$image' height='50px' width='50px'></td>
										<td>$name</td>
										<td>$description</td>
										<td>$quantity</td>
										<td>$biketype</td>
										<td><b>$price</b></td>
										<td>$date_created</td>
										<td>
											<a href='update_product.php?updateID=$id'><button class='w3-button w3-light-blue w3-round'>&#128394;</button></a>
											
											<button class='w3-button w3-red w3-round'>&times;</button>
										</td>	
									</tr>";
							}
						}
					} else {
				?>
		</table>
			<div class="w3-center">
			<img src="img/RENS.png">
					<?php }?>
			</div>
		
	<!--START ADD PRODUCT MODAL-->
		<div class="w3-modal" id="modal1">
			<div class="w3-container w3-modal-content w3-round-large w3-animate-top">
				<span class="w3-button w3-right" onclick="modalControl('modal1', 'none')">&times;</span>
				<form action="actions/add_product.php" method="POST" enctype="multipart/form-data">
					<h3 class="w3-center">ADD PRODUCT</h3>
					<div class="w3-row">
						<div class="w3-half">
							<input type="file" name="my_image"/>
						</div>
						<div class="w3-half">
							Product Name<input type="text" name="name" class="w3-input w3-border"/>
							Price<input type="text" name="price" class="w3-input w3-border"/>
							Bicycle Type
							<select class="w3-select w3-border" name="bicycletype">
								<option value="E-Bike">E-bike</option> 
								<option value="E-Scooter">E-scooter</option>
							</select>
							Description<input type="text" name="description" class="w3-input w3-border"/>
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
		
		<!--START UPDATE PRODUCT-->
		<?php 
			$sql = "SELECT * FROM tbl_product";
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_assoc($result);	
			$name = $row['name'];
			$price = $row['price'];
			$biketype = $row['biketype'];
			$description = $row['description'];
			$quantity = $row['quantity'];
			
		?>
		<div class="w3-modal" id="modal2">
			<div class="w3-container w3-modal-content w3-round-large w3-animate-top">
				<span class="w3-button w3-right" onclick="modalControl('modal2', 'none')">&times;</span>
				<form action="actions/update_product.php" method="POST">
					<h3 class="w3-center">UPDATE PRODUCT</h3>
					<div class="w3-row">
						<div class="w3-half">
							<input type="file" name="my_image"/>
						</div>
						<div class="w3-half">
							Product Name<input type="text" name="name" class="w3-input w3-border" value="<?php echo $name?>"/>
							Price<input type="text" name="price" class="w3-input w3-border" <?php echo $price?>/>
							Bicycle Type
							<select class="w3-select w3-border" name="bicycletype" value="<?php echo $name?>">
								<option value="E-Bike">E-bike</option> 
								<option value="E-Scooter">E-Scooter</option>
							</select>
							Description<input type="text" name="description" class="w3-input w3-border"/>
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
		<!--END UPDATE PRODUCT-->
		
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