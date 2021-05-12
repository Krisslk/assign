<?php


// include database connection 

require_once('connection.php');

//


class subcategory{




// get categories

	public function getsubcategories(){

		$db = new dbconnection();
		$conn = $db->startconnection();	

		$query = $conn->prepare("select `id`,`sub_category` from item_subcategory");
			
		$query->execute();

		$result = $query->get_result();

		return $result;

		}


// get categories


}

?>