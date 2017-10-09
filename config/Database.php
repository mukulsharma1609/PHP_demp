<?php

class Database {

	public $con;
	public $host = "host = 127.0.0.1";
	public $port = "port = 5432";
	public $dbname = "dbname = php_practice";
	public $credentials = "user = postgres password=postgres";
	public function __construct() {
		$this->con = pg_connect("$this->host $this->port $this->dbname $this->credentials");
		if ($this->con) {
			echo "connected";

		} else {
			echo "Error in Connection";
		}

	}

}

?>