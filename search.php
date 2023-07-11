<?php
	include 'navbar_home.php';
	include 'actions/connection.php';
	$search = $_GET['search'];
	$limit = 10;  
	$sql = "select * from tbl_product";    
	$result = mysqli_query($db, $sql);  
	$total_rows = mysqli_num_rows($result);    
	$total_pages = ceil ($total_rows / $limit);    
	if (!isset ($_GET['page']) ) {  
		$page_number = 1;  
		} 
	else {  
		$page_number = $_GET['page'];  
	}    
	$initial_page = ($page_number-1) * $limit;
	$sql = "SELECT * FROM tbl_product LIMIT " . $initial_page . ',' . $limit;  
	$result = mysqli_query($db, $sql);
			
	$sql = "SELECT * FROM tbl_product WHERE name LIKE '%$search%' or description LIKE '%$search%' or biketype LIKE '%$search%' or rentor_username LIKE '%$search%'";	
	
	$result = mysqli_query($db, $sql);
	$num_rows = mysqli_num_rows($result);
	if($num_rows>0){
		?>
		<div class="w3-padding-large w3-center w3-animate-left">
			<div class="w3-row  w3-padding-large" >
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
			<div class="w3-quarter w3-padding-large " style="height:250px; width:250px;	">
			<div class="w3-padding w3-card w3-border w3-round-large">
				<img class="w3-border w3-round-large" src="uploads/<?php echo $row['image']?>" height="110px" width="175"></center>
				<b><?php echo $row['name']?></b>
				<br>
				<b>₱</b> <?php echo $row['price']?>/Day
				<br>
				<a href="view_details.php?productID=<?php echo $row['id'];?>"><button class="w3-center w3-button">View Details</button></a>
				<br>
				<small class="text-muted"><?php echo $row['biketype'];?></small>
			</div>
		</div>
		<?php

		}
		?>
		</div>
		</div>
		<?php
	}
	else{
		
	
		?>
		<div class="w3-center">
			<img src="css/img/RENS.png">
				<?php  ?>
			</div>
	<?php } ?>
	

	<!--START PAGINATION-->
	<div class="w3-center">
		<?php for($page_number = 1; $page_number<= $total_pages; $page_number++) { ?> 
			<a href = "home.php?page=<?php echo $page_number?>"><button class="w3-button w3-hover-blue w3-round-large"><?php echo $page_number ?></button></a>
		<?php } ?>
	</div>
	<br>
	<!--END PAGINATION-->
	</body>



	<!--START OF FOOTER-->
	<footer class="footer-con">
		<div class="container-fluid">
			<div class="footer-home container-fluid">
				<section class="navbar-brand"><img src="css/RentaBaiOfficialLOGO.png">
					<h4>About RENTABAI</h4>
					<p class="comjoin-footer">Join Our Community</p>

				</section>
	<!--SOCIAL MEDIA-->
				<section class="social-meds">
						<a href="https://www.facebook.com/dkhrl"><img class="logo-footer fb-footer" src="css/facebook.png"></a>
						<a href="https://www.instagram.com/dkhrl1/"><img class="logo-footer insta-footer" src="css/instagram.png"></a>
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
		
			</div>
		</div>
	</footer>
	<!--END OF FOOTER---> 
</html>
