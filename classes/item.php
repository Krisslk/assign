<?php


// include database connection 

require_once('connection.php');

//


class item{

private $id;
private $itemcode;
private $itemname;
private $quantity;
private $uprice;
private $category;
private $subcategory;


// start of setter getter functions---------------------------------------------------------------

public function setid($id)
		{
			$this->id = $id;
		}

public function getid()
		{
			return $this->id;
		}

public function setitemcode($itemcode)
		{
			$this->itemcode = $itemcode;
		}

public function getitemcode()
		{
			return $this->itemcode;
		}


public function setitemname($itemname)
		{
			$this->itemname = $itemname;
		}

public function getitemname()
		{
			return $this->itemname;
		}

public function setquantity($quantity)
		{
			$this->quantity = $quantity;
		}

public function getquantity()
		{
			return $this->quantity;
		}

public function setuprice($uprice)
		{
			$this->uprice = $uprice;
		}

public function getuprice()
		{
			return $this->uprice;
		}

public function setcategory($category)
		{
			$this->category = $category;
		}

public function getcategory()
		{
			return $this->category;
		}


public function setsubcategory($subcategory)
		{
			$this->subcategory = $subcategory;
		}

public function getsubcategory()
		{
			return $this->subcategory;
		}








// end of getter setter functions --------------------------------------------------------------------




//  add item function start

	public function add(){

		$db = new dbconnection();
		$conn = $db->startconnection();	

		$query = $conn->prepare("INSERT INTO item(`item_code`,`item_category`,`item_subcategory`,`item_name`,`quantity`,`unit_price`) values (?,?,?,?,?,?)");

		$query->bind_param("ssssss",$this->itemcode,$this->category,$this->subcategory,$this->itemname,$this->quantity,$this->uprice);
			
			if($query->execute()){

			return 1;

		}else{

			return 0;

		}


		}


// add item function start	


}
?>