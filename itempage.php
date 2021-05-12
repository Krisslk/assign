<?php 
	
require_once('classes/category.php');
require_once('classes/subcategory.php');
require_once('classes/item.php');
require_once('classes/connection.php');

// create an object from district and customer 

$cat = new category();

$subcat = new subcategory();

$item = new item();

// calling the methods
$allcat = $cat->getcategories();

$allsubcat = $subcat->getsubcategories();


// check whether the form is submitted

if(isset($_POST['submit'])){

	//initalizing the connection object for further use

	$db = new dbconnection();
	$conn = $db->startconnection();	

	// to sanatize the input data before sending to the server to avoid sql injections

	$itemcode = mysqli_real_escape_string($conn,$_POST['itemcode']);
	$itemname = mysqli_real_escape_string($conn,$_POST['iname']);
	$quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
	$uprice = mysqli_real_escape_string($conn,$_POST['uprice']);
	$category = mysqli_real_escape_string($conn,$_POST['category']);
	$subcategory = mysqli_real_escape_string($conn,$_POST['subcategory']);


	$item->setitemcode($itemcode);
	$item->setitemname($itemname);
	$item->setquantity($quantity);
	$item->setuprice($uprice);
	$item->setcategory($category);
	$item->setsubcategory($subcategory);


	$responce = $item->add();

	if($responce==1){

			echo '<script language="javascript">';
			echo 'alert("item added successfully")';
			echo '</script>';

	}else{
		
				echo '<script language="javascript">';
			echo 'alert("item adding failed try again")';
			echo '</script>';
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Customes page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

 <style type="text/css">
 	.form-control{
 		margin-bottom: 2%;
 		width: 60%;
 	}
 	
 </style>

</head>
<body class="container">


<div class="row">
	
	<div class="col-md-12">

		<div class="text-center">
				<h2  style="margin-top: 2%;">Item Add</h2>
				<label class="form-label">Please fill the below form</label>
		</div>		
		

				<form class="form" style="margin-left: 20%; margin-top: 2%;" method="POST" action="itempage.php">
					<input type="text" style="width: 30%;" required name="itemcode" class="form-control" placeholder="itemcode">
					<input type="text" required  placeholder="Item Name" class="form-control" name="iname">
					<input type="number" required  placeholder="quantity" min="1" class="form-control" name="quantity">
					<input type="number" required  placeholder="unit price" min="1" class="form-control" name="uprice">

					<label class="form-label">please select your categories</label>

					<div class="row" style="margin: 2%;">
						
						<select  required class="form-control" style="width: 20%; margin-right: 2%;" name="category">
						
						<?php 

							while ($row = mysqli_fetch_assoc($allcat)):

						?>

							<option value=<?php echo $row['id']; ?>><?php echo $row['category']; ?></option>

						<?php

						endwhile;

						?>	

					</select>

					<select  required class="form-control" style="width: 20%;" name="subcategory">
						
						<?php 

							while ($row = mysqli_fetch_assoc($allsubcat)):

						?>

							<option value=<?php echo $row['id']; ?>><?php echo $row['sub_category']; ?></option>

						<?php

						endwhile;

						?>	

					</select>

					</div>


					<input class="btn btn-primary" type="submit" name="submit">
				</form>

		
	</div>

</div>


</body>
</html>