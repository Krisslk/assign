<?php


// include database connection 

require_once('connection.php');

//


class district{


private $district;
private $active;
private $id;


// start of setter getter functions---------------------------------------------------------------

public function setdistrict($district)
		{
			$this->district = $district;
		}

public function getdistrict()
		{
			return $this->district;
		}

public function setactive($active)
		{
			$this->active = $active;
		}

public function getactive()
		{
			return $this->active;
		}


public function setid($id)
		{
			$this->id = $id;
		}

public function getid()
		{
			return $this->id;
		}




// end of getter setter functions --------------------------------------------------------------------




// get district function start

	public function getall(){

			$db = new dbconnection();
		$conn = $db->startconnection();	

		$query = $conn->prepare("select `district`,`id` from district");
			
			$query->execute();

			$result = $query->get_result();

			return $result;


		}


// get district fucntion start	


}
?>