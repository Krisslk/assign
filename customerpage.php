<?php 
	
require_once('classes/district.php');
require_once('classes/customer.php');
require_once('classes/connection.php');

// create an object from district and customer 

$district = new district();

$customer = new customer();

// calling the getall method to get all districts

$districts = $district->getall();


// check whether the form is submitted

if(isset($_POST['submit'])){

	//initalizing the connection object for further use

	$db = new dbconnection();
	$conn = $db->startconnection();	

	// to sanatize the input data before sending to the server to avoid sql injections

	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$firstname = mysqli_real_escape_string($conn,$_POST['fname']);
	$middlename = mysqli_real_escape_string($conn,$_POST['mname']);
	$lastname = mysqli_real_escape_string($conn,$_POST['lname']);
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$district = mysqli_real_escape_string($conn,$_POST['district']);

	$customer->settitle($title);
	$customer->setfirstname($firstname);
	$customer->setmiddlename($middlename);
	$customer->setlastname($lastname);
	$customer->setcontact($contact);
	$customer->setdistrict($district);

	$responce = $customer->register();

	if($responce==1){

			echo '<script language="javascript">';
			echo 'alert("customer registered successfully")';
			echo '</script>';

	}else{
		
				echo '<script language="javascript">';
			echo 'alert("customer register failed")';
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
				<h2  style="margin-top: 2%;">Customer Add</h2>
				<label class="form-label">Please fill the below form</label>
		</div>		
		

				<form class="form" style="margin-left: 20%;" method="POST" action="customerpage.php">
					<label class="form-label">please select the title</label>
					<select class="form-control" style="width: 20%;" name="title">
						<option value="Mr.">Mr.</option>
						<option value="Miss.">Mr.</option>
						<option value="Mrs.">Mr.</option>
					</select>
					<input type="text" required  placeholder="first Name" class="form-control" name="fname">
					<input type="text" required  placeholder="Middle Name" class="form-control" name="mname">
					<input type="text" required  placeholder="Last Name" class="form-control" name="lname">
					<input type="tel" required  placeholder="Contact No eg : 077-xxxxxx" minlength="10" maxlength="10" class="form-control" name="contact">

					<label class="form-label">please select your district</label>

					<select  required class="form-control" style="width: 20%;" name="district">
						
						<?php 

							while ($row = mysqli_fetch_assoc($districts)):

						?>

							<option value=<?php echo $row['id']; ?>><?php echo $row['district']; ?></option>

						<?php

						endwhile;

						?>	

					</select>
					<input class="btn btn-primary" type="submit" name="submit">
				</form>

		
	</div>

</div>


</body>
</html>