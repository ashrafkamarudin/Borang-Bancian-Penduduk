<?php

error_reporting(0);  // comment this section on development mode to see errors

class database
{	
	private $conn;
	private $db_name = 'profil_penduduk';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_host = 'localhost';

	public function connect()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}