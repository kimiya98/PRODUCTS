<?php
include("sql_connect.php");
	if(isset($_GET['pid'])){
		$res =mysqli_query($mysqli, 
			"SELECT * FROM products WHERE Product_ID =".$_GET['pid']);

		$product = mysqli_fetch_row($res);
	}else{
		header("location:index.php");
	}
?>
<html>
<head>
	<title>View Product</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<style>
		.product{
			width:50%;

		}
	</style>
</head>
<body>
<?php include("navbar.php");?>
<h2 class ='text-center'>View Product</h2>
<h3 class ='text-center'><?php echo $product[1]; ?></h3>
<p class ='text-center'>Price:<?php echo $product[2];?></p>
<p class ='text-center'>Description: <?php echo $product[3];?></p>
<div class = 'col-sm-4 col-sm-offset-5'>
	
	
	<p><img src ='images/<?php echo $product[4]?>' class ='img-rounded product'></p>

</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>