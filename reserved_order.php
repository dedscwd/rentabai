<?php
	include 'navbar.php';
?>

	<div class="w3-padding-large w3-container w3-animate-left">
		<div class="w3-center">
			<h2>RESERVED PRODUCT/S</h2>
		</div>
		<br>
		<table class="w3-table-all w3-hoverable w3-centered">
			<thead>
				<tr class="w3-light-gray w3-padding-large">
					<th class="w3-center">PRODUCT DETAILS</th>
					<th class="w3-center">CUSTOMER DETAILS</th>
					<th class="w3-center">BIKE TYPE</th>
					<th class="w3-center">START DATE</th>
					<th class="w3-center">END DATE</th>
					<th class="w3-center">QUANTITY</th>
					<th class="w3-center">PRICE/DAY</th>
					<th class="w3-center">TOTAL DAYS</th>
					<th class="w3-center">TOTAL PRICE</th>
					<th class="w3-center">CUSTOMER MESSAGE</th>
					<th class="w3-center">STATUS</th>
				</tr>
			</thead>
			<?php 
			$sql = "SELECT COUNT(*) FROM tbl_order WHERE rentor_id = '$rentor_id'";
			$result = mysqli_query($db, $sql);
			$row = mysqli_fetch_assoc($result);
			echo "You have <b>" .$row['COUNT(*)'] . "</b> Orders to be process";
			?>
			<?php
				include 'actions/connection.php';
				$sql1 = "SELECT * FROM tbl_product";
				$result1 = mysqli_query($db, $sql1);
				while($row1 = mysqli_fetch_assoc($result1)){
					$id1 = $row1['id'];
				}
		
				$sql = "SELECT * FROM tbl_order WHERE rentor_id='$rentor_id' ORDER BY id desc";
				$result = mysqli_query($db, $sql);
				if($num_rows = mysqli_num_rows($result)> 0){
					if($result){
						while($row = mysqli_fetch_assoc($result)){
							$id = $row['id'];
							$_SESSION['order_id'] = $id;
							$order_id = $_SESSION['order_id'];
							$image = $row['image'];
							$name = $row['name'];
							$description = $row['description'];
							$biketype = $row['biketype'];
							$start_date = $row['start_date'];
							$end_date = $row['end_date'];
							$quantity = $row['quantity'];
							$price = $row['price'];
							$total_days = $row['total_days'];
							$total_price = $row['total_price'];
							$message = $row['message'];
							$status = $row['status'];
							$customer_username = $row["customer_username"];
							$customer_firstname = $row["customer_firstname"];
							$customer_lastname = $row["customer_lastname"];
							$customer_phone = $row["customer_phone"];
							$customer_city = $row["customer_city"];
							$customer_barangay = $row["customer_barangay"];
							$customer_street = $row["customer_street"];
					?>
					
							<tr>
								<td class='w3-center'> <a class="w3-center" href="view_order_rentor.php?productID=<?php echo $id?>"> <img src="uploads/<?php echo $image?>" height='50px' width='50px'></a></td>
								<?php
									include 'actions/connection.php';
									$sql1 = "SELECT * FROM tbl_customer WHERE id= '$id'";
									$result1 = mysqli_query($db, $sql1);
									while($row1 = mysqli_fetch_assoc($result1)){
										$id = $row1['id'];
										$name = $row1['username'];
										$lname = $row1['lastname'];
										$fname = $row1['firstname'];
										
									}
								?>
								<td class='w3-center'><button class="w3-button w3-circle" onclick="modalControl('modal2', 'block')"><i class="fa fa-user fa-2x w3-text-black"></i></button></td>
							
								<td><?php echo $biketype?></td>
								<td><?php echo $start_date?></td>
								<td><?php echo $end_date?></td>
								<td><?php echo $quantity?></td>
								<td><?php echo $price?></td>
								<td><?php echo $total_days?></td>
								<td><b class="w3-text-blue w3-large"><?php echo $total_price?></b></td>
								<td><?php echo $message?></td>
								<td style="width:20%;">
								<?php 
									if($status=='Pending...') {?>
										<a title="Confirm order?" href="actions/update_status.php?productID=<?php echo $id?>"><button class='w3-button w3-text-white w3-orange w3-round w3-hover-orange'>Confirm Order?</button></a>
									<?php } else if($status == 'Confirmed!'){?>
										<button title="Waiting customer for payment method!" class='w3-button w3-green w3-round w3-hover-green'>Waiting payment method!</button>
									<?php }
									else if($status=='Pay upon pickup!'){
									?>
										<a title="Click here after payment!" href="actions/pay_upon_pickup_rentor.php?productID=<?php echo $id?>"><button class='w3-button w3-text-white w3-orange w3-round w3-hover-orange'>For pickup!</button></a>
									<?php
									}
									else if($status=='Pay through GCash!'){ ?>
										<a title="Waiting for customer to upload receipt image" href="#"><button class='w3-button w3-text-white w3-orange w3-round w3-hover-orange'>Pending payment!</button></a>
										
									<?php }else if($status=='Paid!'){ ?>
											<a title="Payment successful!" href="#"><button class='w3-button w3-green w3-round w3-hover-green'>Paid!</button></a>
											
									<?php } else if($status == 'Cancelled!'){	?>
										<a href= "" ><button title="Order Cancelled!" class="w3-button w3-red w3-hover-red w3-round">Order Cancelled!</button></a>
									<?php } else{?>
										<a href="receipt/<?php echo $status?>" target="_blank">
											<img src="receipt/<?php echo $status;?>" height="50" width="50">
										</a>
									<?php }?>
									<a href="actions/delete_order.php?deleteID=<?php echo $id?>" title="Delete Order?" style="text-decoration:none;" class="w3-right w3-button w3-round w3-red w3-hover-red">&times;</a>
								</td>	
							</tr>
					<?php
						
						}
					}
				}
				else{
			?>
			
	
		</table>
			<div class="w3-center">
			<img src="img/RENS.png">
				<?php } ?>
			</div>
		
	</div>
	
	<!--MODAL VIEW RENTOR DETAILS END-->
<div class="w3-modal" id="modal2">
	<div class="w3-content w3-white w3-padding-large w3-round-large w3-animate-zoom" style="width:40%;">
		<span class="w3-right buttonlogin-home" onclick="modalControl('modal2','none')"><button class="modal1-btn">&times;</button></span>
			<div class="w3-center"><h3>CUSTOMER DETAILS</h3></div>
			<br>
			<b>Rentor Username:</b>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $customer_username?>"/>
			<b>Rentor Fullname</b>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $customer_firstname?>"/>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $customer_lastname?>"/>
			<b>Rentor Phone</b>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $customer_phone?>"/>
			<b>Rentor Address</b>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $customer_city?>"/>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $customer_barangay?>"/>
			<input class="w3-light-gray w3-input w3-round" readonly value="<?php echo $customer_street?>"/>
			<br>
		</div>
	</div>
<!--MODAL END-->

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
	
	<!--MODAL VIEW RENTOR DETAILS START-->
	<div class="w3-modal" id="modal1">
		<div class="w3-content w3-white w3-padding-large w3-round-large w3-animate-zoom" style="width:40%;">
			<span class="w3-right buttonlogin-home" onclick="modalControl('modal2','none')"><button class="modal1-btn">&times;</button></span>
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
	<script>
		function modalControl(modalID, modalCon){
			document.getElementById(modalID).style.display = modalCon;
		}
		var modal = document.getElementById('modal1');
		var modal2 = document.getElementById('modal2');
		var sub = document.getElementById('subscription');
			window.onclick = function(event) {
			if (event.target == modal2) {
			  modal2.style.display = "none";
			}
			if(event.target == sub){
				sub.style.display = 'none';
			}
		}
		

	</script>
</html>