<?php

if(!isset($_GET['pid'])){
	header("location: index.php");
	exit();
}else{
	require("sql_connect.php");
	$res =mysqli_query($mysqli, "SELECT * FROM products
								 WHERE product_id =".$_GET['pid']);
	$data = mysqli_fetch_row($res);
}
?>
<html>
<head>
	<title>Game List</title>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
</head>
<body>
<?php include("navbar.php"); ?>
<h2 class = 'text-center'>Games List</h2>
<div class = 'row'>
	<div class ='col-sm-6 col-sm-offset-3'>
	<div class = 'panel panel-primary'>
		<div class = 'panel-heading'>
			<h3 class ='panel-title'>Insert New Product</h3>
	</div>
<div class = 'panel-body'>

<form method ='POST' action= 'update.php' enctype="multipart/form-data">
<input type = 'text' value = '<?php echo $data[0]; ?>' name='id' class='hide' placeholder='id'>
<input type = 'text' value = '<?php echo $data[1]; ?>' name='pname' class='form-control' placeholder='Name'>
<input type = 'text' value = '<?php echo $data[2]; ?>' name='price' class='form-control' placeholder='Price'>
<input type = 'text' value = '<?php echo $data[3]; ?>' name='desc' class='form-control' placeholder='Description'>
<p class = 'text-center'>
	<img src = 'images/<?php echo $data[4]; ?>' style = 'width: 40%;' class ='img-thumbnail'>
</p>

<input type = 'file' name='pphoto' class='form-control'>
<button class = 'btn btn-success pull-right'>SUBMIT</button>
</form>
</div>
</div>
</body>
</html>
<script src='js/jquery.min.js'></script>
<script src='js/bootstrap.min.js'></script>
<script>
$(document).ready(function(){
	$(".check").on("click", function(){
		return confirm("Are you Sure?");

	});
});
</script>