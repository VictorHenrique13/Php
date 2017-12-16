<?php
class sql extends PDO{
	private $conn;

	public function __construct(){
		$this->conn = new 	PDO("mysql:dbname=db_php;host=localhost","root","");
	}
	private function setparams($statement,$parameters){
		foreach ($parameters as $key => $value) {
			$statement->bindParam($key,$value);
		}
	}


	public function query($rawquery,$params =  array()){
		$stmt = $this->conn->prepare($rawquery);
		$this->setparams($stmt,$params);
		$stmt->execute();
		return $stmt;

	}

	public function select($rawquery,$params = array()){
		$stmt = $this->query($rawquery,$params);

		return $stmt->fetchAll();



	}


}

?>