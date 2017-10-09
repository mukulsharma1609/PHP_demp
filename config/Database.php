<?php

class Database {

	public $con;
	public $host = "host = 127.0.0.1";
	public $port = "port = 5432";
	public $dbname = "dbname = php_practice";
	/*public $credentials = "user = postgres password=postgres";*/
	public $username = "postgres";
	public $password = "postgres";
	public function __construct() {
		$this->con = pg_connect("$this->host $this->port $this->dbname user = $this->username password = $this->password");
		if ($this->con) {
			echo "connected";

		} else {
			echo "Error in Connection";
		}

	}

}

?>