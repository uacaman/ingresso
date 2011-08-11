<?php

/**
 * 
 * Classe para persistência dos dados
 * 
 * @author Ângelo Ayres Camargo
 *
 */
class db {
	
	/**
	 * 
	 * Instancia do driver PDO para uma base de dados SQLite
	 * @var unknown_type
	 */
	private $db = null;
	
	/**
	 * 
	 * Construtor da classe. Conecta, cria o bando de dados e tabela caso seja necessário
	 */
	public function __construct() {

		$pasta = Prado::getPathOfNamespace('Application.persistencia');
		$this->db = $db = new PDO('sqlite:' . $pasta . DIRECTORY_SEPARATOR .  'sqlite.db');
		$this->db->exec('CREATE TABLE IF NOT EXISTS usuario (nome TEXT, email TEXT, PRIMARY KEY (email) )' ) ;


		
	}
	
	/**
	 * 
	 * Verifica a existência de um email na base
	 * 
	 * @param string $email
	 * @return bool
	 */
	public function ExisteEmail($email) {
		$sth = $this->db->prepare('SELECT count(*) FROM usuario WHERE email = ?');
		$sth->execute(array($email));
		$row = $sth->fetch();
		return (bool)$row[0];
	}
	
	/**
	 * 
	 * Busca todos o registros cadastrados
	 * @return array
	 */
	public function Consultar() {
		$sth = $this->db->prepare('SELECT * FROM usuario');
		$sth->execute(array());
		return $sth->fetchAll();
		
	}
	
	/**
	 * 
	 * Excluir um registro da base usando como chabe o email
	 * @param string $email
	 */
	public function Excluir($email) {
		$sth = $this->db->prepare('DELETE FROM usuario WHERE email = ?');
		$sth->execute(array($email));
	}
	
	/**
	 * 
	 * Adicionar um registro na base
	 * 
	 * @param sting $nome
	 * @param string $email
	 */
	public function Adicionar($nome, $email) {
		$sth = $this->db->prepare('INSERT INTO usuario (nome, email) VALUES (?,?) ');
		$sth->execute(array($nome, $email));
	}
	
}