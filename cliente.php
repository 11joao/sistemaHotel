<?php
class Cliente{
	private $nome;
	private $endereco;
	
	function __construct($nome,$endereco){
		$this->nome=$nome;
		$this->endereco=$endereco;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getEndereco(){
		return $this->endereco;
	}
	public function insertCli(){
		include "conexao.php";
		$conexao=new Conexao("mysql:sever=localhost;dbname=bd_loja;charset=utf8","root","");
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		$con=$conexao->getConexao();
		$sql="insert into tb_cliente(nome,endereco) values (?,?)";
		$stmt=$con->prepare($sql);
		$stmt->bindValue(1,$this->getNome());
		$stmt->bindValue(2,$this->getEndereco());
		if($stmt->execute()){
			echo "Novo cliente ".$this->getNome()." cadastrado!!";
		}else{
			echo "Erro de cadastramento";
		}
	}
}