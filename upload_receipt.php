<?php
	include "actions/connection.php";
	if(isset($_GET['order_id']) and isset($_POST['submit']) and isset($_FILES['my_image'])){
		$id = $_GET['order_id'];
		$img_name = $_FILES['my_image']['name'];
		$tmp_name = $_FILES['my_image']['tmp_name'];

		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
		$img_ex_lc = strtolower($img_ex);
		$allowed_exs = array("jpg", "jpeg", "png");
		if (in_array($img_ex_lc, $allowed_exs)) {
			$new_img_name = "GCASH-".date("Ymdhmi").'.'.uniqid().'.'.$img_ex_lc;
			$img_upload_path = 'receipt/'.$new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);

			$sql = "UPDATE tbl_order SET status='$new_img_name' WHERE id='$id'";
			$result = mysqli_query($db, $sql);
		if($result){
			echo "<script>alert('HI');</script>";
			header("location: my_order.php");
		}
	}
		else{
			$em = "You can't upload this type of file!";
			header("location: my_order.php?error=$em");
		}
	}
?>
   <link rel="stylesheet" type="text/css" href="css/bootstrap/css/w3.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <br>
   <br>
   <br>
   <br>
<div class="w3-center">
	<form method="POST" enctype="multipart/form-data"/>
		<input id="id1" type="file" name="my_image" hidden/>
		<button class="fa fa-camera fa-4x w3-button w3-padding-large w3-light-gray w3-round-xlarge w3-animate-left" style="height:500px; 
		width:600px;"onclick="document.getElementById('id1').click(); return false;"> Upload receipt here</button>
		<br>
		<br>
		<input class="w3-button w3-blue w3-animate-left w3-round-large" type="submit" name="submit" value="Upload receipt!"/>
	</form>
</div>