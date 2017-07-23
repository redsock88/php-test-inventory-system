<!DOCTYPE HTML">
<html>
<head>
<script src="sorttable.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Inventory Management System</title>
</head>
<body>
	<h1>Inventory Management System</h1>
	<table class="sortable" cellpadding="15" border="1">
		<tr bgcolor="grey">
			<th>Garment ID</th>
			<th>Type</th>
			<th>Size</th>
			<th>Color</th>
			<th>Time Period</th>
			<th>Age (in days)</th>
			<th>Checkout Date (YYYY-MM-DD)</th>
			<th>Status</th>
			<th>
				<form action="newGarment.php" method="GET">
					<input type="submit" value="Add New">
				</form>
			
			<th>
		
		</tr>
		   <?php
					require_once('garment.php');

					$garment = new Garment();
					$sql = "SELECT * FROM garments";
					$result = mysqli_query($db->connection,$sql);
					while ( $row = mysqli_fetch_array($result)) {
						$color = "green";
						if ($row ["status"] == "Out") {
							$color = "red";
						}
						$age = $garment->getAge($row ["createdDate"]);
						?>
						
					<tr bgcolor=<?php echo $color ?>>
			<td><?php echo $row ["garmentID"] ?></td>
			<td><?php echo $row ["type"] ?></td>
			<td><?php echo $row ["size"] ?></td>
			<td><?php echo $row ["color"] ?></td>
			<td><?php echo $row ["timePeriod"] ?></td>
			<td><?php echo $age ?></td>
			<td><?php echo $row ["checkoutDate"] ?></td>
			<td><?php echo $row ["status"] ?></td>
			<td>
				<form action="index.php" method=POST>
					<input type="hidden" name="garmentID" value=<?php echo $row ["garmentID"] ?> />
					<input type="hidden" name="status" value=<?php echo $row ["status"] ?> />
					<input type="hidden" name="action" value="check" />
					<input type="submit" value="Check In/Out"/>
				</form>
			</td>
			<td>
				<form action="editGarment.php" method="GET">
					<input type="hidden" name="garmentID" value=<?php echo $row ["garmentID"] ?> />
					<input type="hidden" name="type" value=<?php echo $row ["type"] ?> />
					<input type="hidden" name="size" value=<?php echo $row ["size"] ?> />
					<input type="hidden" name="color" value=<?php echo $row ["color"] ?> />
					<input type="hidden" name="timePeriod" value=<?php echo $row ["timePeriod"] ?> />
					<input type="hidden" name="age" value=<?php echo $age?> />
					<input type="hidden" name="checkoutDate" value=<?php echo $row ["checkoutDate"] ?> />
					<input type="hidden" name="status" value=<?php echo $row ["status"] ?> />
					<input type="submit" value="Edit">
				</form>
			</td>
			<td>
				<form action="index.php" method="POST">
					<input type="hidden" name="garmentID" value=<?php echo $row ["garmentID"] ?> />
					<input type="hidden" name="status" value="" />
					<input type="hidden" name="action" value="delete" />
					<input type="submit" value="Delete"/>
				</form>
			</td>
		<?php }
			if(isset($_POST["action"], $_POST["status"])){
				$action = $_POST["action"];
				$rowStatus = $_POST["status"];
				$rowGarmentID = $_POST["garmentID"];
				if($action== "delete"){
					$garment->delete($rowGarmentID);
				}else{
					if($rowStatus == "In"){
						$garment->checkOut($rowGarmentID); 
					}else{
						$garment->checkIn($rowGarmentID);
					}
				}
			}
		?>
		<script>
			function reload() {
			    location.reload();
			    die;
			}
		</script>
	</tr>
	</table>
</body>
</html>
