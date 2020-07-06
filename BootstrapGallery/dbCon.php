<?php 

require_once 'config.php';

/**
 * 
 */
class Conn
{
	public function connect()
	{
		try {
			$dsn = 'mysql:host=' .DB_HOST. ';dbname=' .DB_NAME;
			$conn = new PDO($dsn, DB_USER, DB_PASS);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
			//echo "Connected successfully";	
		}
		 catch (PDOException $e) {
			echo "Connection Failed: " . $e->getMessage();
		}
	}	
}