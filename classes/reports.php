<?php


// include database connection 

require_once('connection.php');

//


class reports{



//  get invoice report function start

	public function invoicereport(){

		$db = new dbconnection();
		$conn = $db->startconnection();	

		$query = $conn->prepare("select invoice.invoice_no,invoice.date,invoice.item_count,invoice.amount,invoice.customer,customer.first_name,district.district from customer join invoice join district on invoice.customer = customer.id and customer.district = district.id");
		
		$query->execute();

		$result = $query->get_result();

		return $result;
			
			

		}


// get invoice report function end	



//  get invoice item report function start

	public function invoiceitemreport(){

		$db = new dbconnection();
		$conn = $db->startconnection();	

		$query = $conn->prepare("select invoice.invoice_no,invoice.date,invoice_master.item_id,item.item_code,item.item_name,item_category.category,item_subcategory.sub_category,item.unit_price,customer.first_name from invoice join invoice_master join item join customer JOIN item_category join item_subcategory on invoice.invoice_no = invoice_master.invoice_no and invoice_master.item_id = item.id and invoice.customer = customer.id and item.item_category = item_category.id and item.item_subcategory = item_subcategory.id");
		
		$query->execute();

		$result = $query->get_result();

		return $result;
			
			

		}


// get invoice item report function end	




//  get  item report function start

	public function itemreport(){

		$db = new dbconnection();
		$conn = $db->startconnection();	

		$query = $conn->prepare("select DISTINCT item.item_name,item_category.category,item_subcategory.sub_category,item.quantity from item join item_category join item_subcategory on item.item_category = item_category.id and item.item_subcategory = item_subcategory.id");
		
		$query->execute();

		$result = $query->get_result();

		return $result;
			
			

		}


// get item report function end






}
?>