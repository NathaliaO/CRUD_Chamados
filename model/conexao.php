<?php
class Connection {
	public static $instance;

	public function __construct() {}

	public function getInstance() {
		if (!isset(self::$instance)) {
			self::$instance = new PDO('mysql:host=localhost;dbname=crud_chamados', 'root', '', array(PDO::ATTR_PERSISTENT => true));
			
		}
		return self::$instance;
	}

	public function selectDB($sql) {
		$p_sql = Connection::getInstance()->Prepare($sql);
		$p_sql->execute();
		return $p_sql->fetchAll(PDO::FETCH_ASSOC);
	}

	public function insertDB($sql) {
		$p_sql = Connection::getInstance()->Prepare($sql);
		$p_sql->execute();
	}

	public function updateDB($sql) {
		$p_sql = Connection::getInstance()->Prepare($sql);
		$p_sql->execute();
	}

	public function deleteDB($sql) {
		$p_sql = Connection::getInstance()->Prepare($sql);
		$p_sql->execute();
	}
}
