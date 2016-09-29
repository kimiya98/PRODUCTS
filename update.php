<?php
 if(!isset($_POST['pname']) || !isset($_POST['price'])){
 	echo "No data passed";
 	exit();
 }

 $name = $_POST['pname'];
 $price = $_POST['price'];
 $desc = $_POST['desc'];
  $id = $_POST['id'];
  $photo = $_FILES['pphoto']['name'];

  
 	

 	if($_FILES['pphoto']['tmp_name'] == ""){
 		$stmt ="UPDATE products SET 
  		Product_name = '".$name."', 
  		Product_Price = '".$price."', 
  		Product_Description = '".$desc."',
  		WHERE Product_ID = '".$id."'"; 
  		require("sql_connect.php");
 		$res = mysqli_query($mysqli, $stmt);
 		if($res){
 			header("location:index.php");
 		}else{
 			echo "Error Updating Data!";
 		}
 	}else{
 		$stmt ="UPDATE products SET 
  		Product_name = '".$name."', 
  		Product_Price = '".$price."', 
  		Product_Description = '".$desc."',
  		Product_image = '".$photo."'
  		WHERE Product_ID = '".$id."'"; 
  		
  		move_uploaded_file($_FILES['pphoto']['tmp_name'], 'images/'.$_FILES['pphoto']['name']);
 		require("sql_connect.php");
 		$res = mysqli_query($mysqli, $stmt);

  		if($res){
 			header("location:index.php");
 		}else{
 			echo "Error Updating Data!";
 		}

 	}
 	
 	

 	

 		
 ?>