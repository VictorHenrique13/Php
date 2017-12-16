<?php
class usuario{
	private $id;
	private $name;
	private $pass;
	private $data;

	public function getid(){
		return $this->id;
	}
	public function getnome(){
		return $this->name;
	}
	public function getpass(){
		return $this->pass;
	}
	public function getdata(){
		return $this->data;
	}
	public function setid($id){
		$this->id = $id;
	}
	public function setnome($nome){
		$this->name = $nome;
	}
	public function setpass($pass){
		$this->pass = $pass;
	}
	public function setdata($data){
		$this->data = $data;
	}
	private function setData($data){
			$this->setid($data['idusu']);
			$this->setnome($data['nameUsu']);
			$this->setpass($data['passwordusu']);
			$this->setdata(new DateTime($data['dt_cadastro']));
	}
	public function loadbyId($id){
		$sql = new sql();
		$carga = $sql->select("SELECT * FROM DB_USUARIO WHERE idusu = :ID",array(':ID' => $id ));
		if(count($carga)>0){
			
				$this->setData($carga[0]);
			
		}

	}
	PUBLIC function insert(){
		$results = $sql->("CALL sp_insert(:LOGIN,:SENHA)",array(':LOGIN' => $this->getName() , ':SENHA'=> $this->getPass());
		$this->setData($results[0]);
	}
	public function __toString(){
		return json_encode(array(
			"ID" => $this->getid(),
			"NAME" => $this->getnome(),
			"PASS"=>$this->getpass(),
			"DATA"=> $this->getdata().format("d/m/Y H:m:s")
		));
	}

}
?>