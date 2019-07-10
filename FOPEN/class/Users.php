<?php
	 class Users{
	private $id;
	private $login;
	private $pass;
	private $dtcadastro;

	public function setId($value){
		$this->id = $value;
	}

	public function getId(){
		return $this->id;
	}

	public function setLogin($value){
		$this->login = $value;
	}

	public function getLogin(){
		return $this->login;
	}

	public function setPass($value){
		$this->pass = $value;
	}
	public function getPass(){
		return $this->pass;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function loadbyId($id){
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM usuarios WHERE id = :ID", array(
			":ID"=>$id));

		if(isset($result)){
		
			$this->setData($result[0]);
		}
	} 

	public function getList(){

	$sql = new Sql();	

	return $sql->select("SELECT * FROM usuarios ORDER BY login;");
	}
	public static function search($login){

		$sql = new Sql();
		return $sql->select("SELECT * FROM usuarios WHERE login LIKE :SEARCH ORDER BY login", array(':SEARCH' => "%".$login."%" ));
	}

	public function log($login, $pass){
		$sql = new Sql();

		$result = $sql->select("SELECT * FROM usuarios WHERE login = :LOGIN AND pass = :PASS", array(
			":LOGIN"=>$login,
			":PASS"=>$pass
		));
 	
		if(count($result) > 0){

			$this->setData($result[0]);

		}else{

			throw new Exception("Login ou senha inválidos.");
		}

	}	

	public function insert(){

		$sql = new Sql();
 
		$result = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASS)", array(
			':LOGIN'=>$this->getLogin(),
			':PASS'=>$this->getPass()
		));

		if(count($result) > 0){

		$this->setData($result[0]);
		
		}
	}
	public function __construct($login = "", $pass = ""){

		$this->setLogin($login);
		$this->setPass($pass);
	}
	public function update($login, $pass){
		$this->setLogin($login);
		$this->setPass($pass);
		
		$sql = new Sql();

		$sql->query("UPDATE usuarios SET login = :LOGIN, pass = :PASS WHERE id = :ID", array(

			':LOGIN'=>$this->getLogin(),
			':PASS'=>$this->getPass(),
			':ID'=>$this->getId()
		));

	}
	public function delete(){

		$sql = new Sql();

		$sql->query("DELETE FROM usuarios WHERE id = :ID", array(
			':ID'=>$this->getId()
		));

		$this->setId("NULL");
		$this->setLogin("NULL");
		$this->setPass("NULL");
		$this->setDtcadastro(new DateTime());
	}

	public function setData($data){
		
		$this->setId($data['id']);
		$this->setLogin($data['login']);
		$this->setPass($data['pass']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
	}
	public function __toString(){
		
		return json_encode(array(
			"id"=>$this->getId(),
			"login"=>$this->getLogin(),
			"pass"=>$this->getPass(),
			"dtcadastro"=>$this->getDtcadastro()
		));
	}
}
?>