<?php
class Conexao{
	private $sever;
	private $user;
	private $pass;
	
   function  __construct($sever,$user,$pass){
		$this->sever= $sever;
		$this->user= $user;
		$this->pass= $pass;
	}
	public function getConexao(){
		try{
                        $pdo= new PDO($this->sever,$this->user,$this->pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			return $pdo;
		}catch(PDOException $e){
			echo "<b>ERRO:".$e->getMessage()."</b>";
		}
	}
}
