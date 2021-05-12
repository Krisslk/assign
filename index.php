<?php 

	require_once('classes/reports.php');

	$reports = new reports();

	$invoicereports = $reports->invoicereport();	
	$invoiceitemreports = $reports->invoiceitemreport();
	$itemreport = $reports->itemreport();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<style type="text/css">
		
		.report{
			width: 100%;
			height:350px;
			overflow: scroll;
			margin: auto;
			margin-top: 3%
		}

		
	</style>

</head>
<body class="container">

 <div class="row">
		
		<div class="col-md-12">
			<div class="text-center">
			
			<h2 style="margin-top: 2%;">System Reports</h2>

			<div class="row">
				 <span><a class="btn btn-primary" href="customerpage.php">Add Customer</a></span>
				 <span  style="margin-left: 2%;" ><a class="btn btn-primary" href="itempage.php">Add Item</a></span>
			</div>

			<div class="report">
				
				<h5 style="margin-top: 2%; margin-bottom: 2%;">Invoice Report</h5>

				<table  class="table">
					<tr class="thead-dark">
						<th>Invoice Number</th>
						<th>Invoice Date</th>
						<th>Customer</th>
						<th>District</th>
						<th>Item Count</th>
						<th>Invoice Amount</th>
						
					</tr>

					<?php

					while($row = mysqli_fetch_assoc($invoicereports)):

					?>

					<tr>
						
						<td><?php echo $row['invoice_no']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['first_name']; ?></td>
						<td><?php echo $row['district']; ?></td>
						<td><?php echo $row['item_count']; ?></td>
						<td><?php echo $row['amount']; ?></td>

					</tr>

					<?php 

						endwhile;

					?>
						
				</table>

			</div>


				<div class="report">
				
				<h5 style="margin-top: 2%; margin-bottom: 2%;">Invoice Item Report</h5>

				<table  class="table">
					<tr class="thead-dark">
						<th>Invoice Number</th>
						<th>Invoice Date</th>
						<th>Item Name</th>
						<th>Item Code</th>
						<th>Item Category</th>
						<th>Unit Price</th>
						
					</tr>

					<?php

					while($row = mysqli_fetch_assoc($invoiceitemreports)):

					?>

					<tr>
						
						<td><?php echo $row['invoice_no']; ?></td>
						<td><?php echo $row['date']; ?></td>
						<td><?php echo $row['item_name']; ?></td>
						<td><?php echo $row['item_code']; ?></td>
						<td><?php echo $row['category']; ?></td>
						<td><?php echo $row['unit_price']; ?></td>

					</tr>

					<?php 

						endwhile;

					?>
						
				</table>

			</div>



				<div class="report">
				
				<h5 style="margin-top: 2%; margin-bottom: 2%;"> Item Report</h5>

				<table  class="table">
					<tr class="thead-dark">
						<th>Item Name</th>
						<th>Item Category</th>
						<th>Item Sub Category</th>
						<th>Item Quantity</th>
					</tr>

					<?php

					while($row = mysqli_fetch_assoc($itemreport)):

					?>

					<tr>
						
						<td><?php echo $row['item_name']; ?></td>
						<td><?php echo $row['category']; ?></td>
						<td><?php echo $row['sub_category']; ?></td>
						<td><?php echo $row['quantity']; ?></td>

					</tr>

					<?php 

						endwhile;

					?>
						
				</table>

			</div>

			
			</div>

		</div>

</div>

</body>
</html>