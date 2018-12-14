<?php

	class Database{
		private $db_hostname = "localhost";
		private $db_username = "root";
		private $db_password = "";
		private $db_name = "login_system";
		public $pdo;
		public function __construct(){
			if (!isset($this->pdo)) {
				try {
					$this->pdo = new PDO("mysql:host=".$this->db_hostname.";dbname=".$this->db_name, $this->db_username, $this->db_password);
					$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	                $this->pdo->exec("SET CHARACTER SET utf8");

				} catch (PDOException $e) {
					die("Failed to connect with database".$e->getMessage());
				}
			}
		}
	}
?>
