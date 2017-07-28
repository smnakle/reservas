<?php
require_once 'Crud.php';

class Usuarios extends Crud{

	protected $table = 'usuarios';
	private $nome;
	private $senha;
	private $userName;


	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setUsername($userName){
		$this->userName = $userName;
	}

	public function getUsername(){
		return $this->userName;
	}

	public function inserir(){

		$sql  = "INSERT INTO $this->table (nome, senha, username) VALUES (:nome, :senha, :userName)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':userName', $this->userName);
		return $stmt->execute(); 

	}

	public function alterar($id){

		$sql  = "UPDATE $this->table SET nome = :nome, senha = :senha, username = :userName WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':userName', $this->userName);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}