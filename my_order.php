<?php
	include 'navbar_home.php';
	
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="w3-padding-large w3-container w3-animate-left">
		<table class="w3-table-all w3-hoverable w3-centered">
			<thead>
			<tr class="w3-light-gray w3-padding-larged">
				<th class="w3-center">PRODUCT DESCRIPTION</th>
				<th class="w3-center">RENT START DATE</th>
				<th class="w3-center">RENT END DATE</th>
				<th class="w3-center">QUANTITY</th>
				<th class="w3-center">PRICE</th>
				<th class="w3-center">TOTAL DAYS</th>
				<th class="w3-center">TOTAL PRICE</th>
				<th class="w3-center">MY MESSAGE</th>
				<th class="w3-center">STATUS</th>
			</tr>
			</thead>
			<?php
				$sql = "SELECT COUNT(*) FROM tbl_order WHERE customer_id = '$customer_id'";
				$result = mysqli_query($db, $sql);
				$row = mysqli_fetch_assoc($result);
				echo "You have <b>".$row['COUNT(*)']."</b> Pending orders";
			?>
			<?php
				include 'actions/connection.php';
				$sql = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ORDER BY id desc";
				$result = mysqli_query($db, $sql);
				if(mysqli_num_rows($result)>0){
				if($result){
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['id'];
						$_SESSION['order_id'] = $id;
						$order_id = $_SESSION['order_id'];
						$date_order = $row['date_order'];
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
						
				?>
				
					<tr>
						<td class="w3-center"><a href="view_order.php?prodID=<?php echo $id?>"> <img src="uploads/<?php echo $image?>" height='50px' width='50px' class="w3-round-large"></a></td>
						
						
						<td ><?php echo $start_date?></td>
						<td ><?php echo $end_date?></td>
						<td ><?php echo $quantity?></td>
						<td ><?php echo $price?></td>
						<td ><?php echo $total_days?></td>
						<td ><b class="w3-text-blue w3-large"><?php echo $total_price?></b></td>
						<td ><?php echo $message?></td>
						<td style="width:21%;">
							<?php 
							if($row['status']=='Pending...') {?>
								<button title="Waiting for confirmation!" class='w3-hover-orange w3-button w3-text-white w3-orange w3-round'><?php echo $status?></button>	
							<?php
							}
							elseif($row['status']=='Confirmed!'){
							?>
							
							<div class="w3-dropdown-hover">
								<button class='w3-button w3-text-white w3-green w3-hover-green w3-round'>Payment method</button>
									<div class="w3-dropdown-content w3-bar-block w3-border">
									<a href="actions/pay_upon_pickup.php?productID=<?php echo $id?>" class="w3-bar-item w3-button">Pay upon pickup?<a>
									<a href="actions/pay_through_gcash.php?productID=<?php echo $id?>" class="w3-bar-item w3-button w3-hover-blue">Pay through Gcash?<a>
								</div>
							</div>
								<?php
							}elseif($row['status']=='Pay upon pickup!'){?>
								<button class='w3-hover-orange w3-button w3-text-white w3-orange w3-round'><?php echo $status?></button>
							<?php
							}elseif($row['status']=='Pay through GCash!'){?>
								<form method="POST" enctype="multipart/form-data">
								<a href="upload_receipt.php?order_id=<?php echo $order_id?>">Upload GCash receipt!</a>
							<?php
							}elseif($row['status']=='Paid!'){?>
							<a><button title="Thank you for renting!" class='w3-button w3-text-white w3-green w3-round'><?php echo "Paid!"?></button></a>
							<?php
							} elseif($row['status']=='Cancelled!'){
							?>	
							<button title="Order Cancelled!" class="w3-orange w3-text-white w3-button w3-round-large w3-hover-orange" title="Cancel Order?">Cancelled!</button>
							<?php }else{?>
									<a name="rasta" href="receipt/<?php echo $status?>" target="_blank">
										<img title="PAID!" src="receipt/<?php echo $status;?>" height="50" width="50">
									</a>
							<?php }?>
							<?php?>
							
							
							<?php if($row['status'] != 'Cancelled!'){?>
							<a style="text-decoration: none;" href="actions/cancel_order.php?cancelID=<?php echo $id?>"><button class=" w3-red w3-button w3-round-large w3-right w3-hover-red" title="Cancel Order?">Cancel Order</button></a>
							<?php }?>
							<?php
							}
						}	
					} else {
							?>
						</td>
					</tr>
		</table>
			<div class="w3-center">
			<img src="img/RENS.png">
					<?php }?>
			</div>
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

