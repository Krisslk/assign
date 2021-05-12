<?php


// include database connection 

require_once('connection.php');

//


class customer{

private $id;
private $title;
private $firstname;
private $middlename;
private $lastname;
private $contact;
private $district;


// start of setter getter functions---------------------------------------------------------------

public function setdistrict($district)
		{
			$this->district = $district;
		}

public function getdistrict()
		{
			return $this->district;
		}

public function settitle($title)
		{
			$this->title = $title;
		}

public function gettitle()
		{
			return $this->title;
		}


public function setfirstname($firstname)
		{
			$this->firstname = $firstname;
		}

public function getfirstname()
		{
			return $this->firstname;
		}

public function setmiddlename($middlename)
		{
			$this->middlename = $middlename;
		}

public function getmiddlename()
		{
			return $this->middlename;
		}

public function setlastname($lastname)
		{
			$this->lastname = $lastname;
		}

public function getlastname()
		{
			return $this->lastname;
		}

public function setcontact($contact)
		{
			$this->contact = $contact;
		}

public function getcontact()
		{
			return $this->contact;
		}







// end of getter setter functions --------------------------------------------------------------------




// get register customer function start

	public function register(){

		$db = new dbconnection();
		$conn = $db->startconnection();	

		$query = $conn->prepare("INSERT INTO customer(`title`,`first_name`,`middle_name`,`last_name`,`contact_no`,`district`) values (?,?,?,?,?,?)");

		$query->bind_param("ssssss",$this->title,$this->firstname,$this->middlename,$this->lastname,$this->contact,$this->district);
			
			if($query->execute()){

			return 1;

		}else{

			return 0;

		}


		}


// get register customer function start	


}
?>