<?php
require_once('dbConnection.php');

class Garment {
	private $garmentID;
	private $type;
	private $size;
	private $color;
	private $timePeriod;
	private $createdDate;
	private $checkoutDate;
	private $status;
	private $age;
	
	// Add a garment to the database
	public function add($type, $size, $color, $timePeriod) {
		global $db;
		$garmentID = $this->getNextUnique();
		$sql = "INSERT INTO garments (garmentID, type, size, color, timePeriod, createdDate, checkoutDate, status) VALUES (" . $garmentID . ", '" . $type . "', '" . $size . "', '" . $color . "', '" . $timePeriod . "', current_date(), NULL, 'In')" ;
		mysqli_query($db->connection,$sql);
		header('Location:../index.php');
	}
	
	// Delete a garment from the database
	public function delete($garmentID) {
		global $db;
		$sql = "DELETE FROM garments WHERE garmentID = " . $garmentID ;
		mysqli_query($db->connection,$sql);
		$page = $_SERVER['PHP_SELF'];
		echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
	}
	
	// Edit a garment in the database
	public function edit($garmentID, $type, $size, $color, $timePeriod) {
		global $db;
		$sql = "UPDATE garments SET type = '" . $type . "', size = '" . $size . "',  color = '" . $color . "', timePeriod = '" . $timePeriod . "' WHERE garmentID = " . $garmentID ;
		mysqli_query($db->connection,$sql);
		header('Location:../index.php');
	}
	
	// check in a garment to inventory
	public function checkIn($garmentID) {
		global $db;
		$sql = "UPDATE garments SET status = 'In', checkoutDate = NULL WHERE garmentID = " . $garmentID ;
		mysqli_query($db->connection,$sql);
		$page = $_SERVER['PHP_SELF'];
		echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
	}
	
	// check out a garment from inventory
	public function checkOut($garmentID) {
		global $db;
		$sql = "UPDATE garments SET status = 'Out', checkoutDate = current_date() WHERE garmentID = " . $garmentID ;
		mysqli_query($db->connection,$sql);
		$page = $_SERVER['PHP_SELF'];
		echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
	}
	
	// Get the amount of days the garment has been in the inventory
	public function getAge($createdDateStr) {
		$now = time ();
		$createdDate = strtotime ( $createdDateStr );
		$datediff = $now - $createdDate;
		
		return floor ( $datediff / (60 * 60 * 24) );
	}
	
	// Get the next unique primary key
	public function getNextUnique() {
		global $db;
		$nextUnique = 0;
		$sql = "SELECT MAX(garmentID) garmentID FROM garments";
		$results = mysqli_query($db->connection,$sql);
		
		while ( $row = mysqli_fetch_array($results)) {
			$nextUnique = (int) $row ["garmentID"] + 1;
		}
		return (string) $nextUnique;
	}
}
?>