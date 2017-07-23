<?php 
class DBConnection {
	
	public $connection;
	public $query_id;
	
	function __construct() {
		$this->getConnection();
	}
	
	 //Connect to database
    public function getConnection()  {
        $url = "127.0.0.1";
        $username = "root";
        $password = "root";
        $database = "test";
        $port = "3306";
        $this->connection = mysqli_connect($url, $username, $password, $database, $port);
    }

    //run query on database connection
    public function query($sql){
    	$this->query_id = $this->connection->query($sql);
    }

}
$db = new DBConnection();
?>