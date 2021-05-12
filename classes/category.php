<?php


// include database connection 

require_once('connection.php');

//


class category{




// get categories

	public function getcategories(){

		$db = new dbconnection();
		$conn = $db->startconnection();	

		$query = $conn->prepare("select `id`,`category` from item_category");
			
		$query->execute();

		$result = $query->get_result();

		return $result;

		}


// get categories


}

?>