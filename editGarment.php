<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Inventory Management System</title>
	</head>
	<?php 
		require_once 'garment.php';
		
		if(isset($_GET["garmentID"])){
			$editGarmentID = $_GET["garmentID"];
			$editType = $_GET["type"];
			$editSize = $_GET["size"];
			$editColor = $_GET["color"];
			$editTimePeriod = $_GET["timePeriod"];
			$editAge = $_GET["age"];
			$checkoutDate = $_GET["checkoutDate"];
			$editCheckoutDate = str_replace("/","",$checkoutDate);
			$editStatus = $_GET["status"];
	?>
	<body>
		<h1>Edit Existing Garment</h1>
		<form ACTION="editGarment.php" METHOD="POST">
			<h3>Garment ID: <?php echo $editGarmentID?></h3>
			<h3>Type: <?php echo $editType?>
				<select name="type">
		    		<option value="Hat">Hat</option>
		    		<option value="Shirt">Shirt</option>
		    		<option value="Pants">Pants</option>
		    		<option value="Belt">Belt</option>
		    		<option value="Shoes">Shoes</option>
		    		<option value="Coat">Coat</option>
		    		<option value="Dress">Dress</option>
		  		</select>
	  		</h3>
	  		<h3>Size: <?php echo $editSize?>
		  		<select name="size">
		    		<option value="X Large">X Large</option>
		    		<option value="Large">Large</option>
		    		<option value="Medium">Medium</option>
		    		<option value="Small">Small</option>
		    		<option value="Kid">Kid</option>
		  		</select>
	  		</h3>
	  		<h3>Color: <?php echo $editColor?>
		  		<select name="color">
		  			<option value="Red">Red</option>
		    		<option value="Orange">Orange</option>
		    		<option value="Yellow">Yellow</option>
		    		<option value="Green">Green</option>
		    		<option value="Blue">Blue</option>
		    		<option value="Purple">Purple</option>
		    		<option value="Black">Black</option>
		    		<option value="Brown">Brown</option>
		    		<option value="White">White</option>
		  		</select>
	  		</h3>
	  		<h3>Time Period: <?php echo $editTimePeriod?>
		  		<select name="timePeriod">
		    		<option value="Modern">Modern</option>
		    		<option value="Colonial">Colonial</option>
		    		<option value="Victorian">Victorian</option>
		    		<option value="World War 1">World War 1</option>
		    		<option value="World War 2">World War 2</option>
		  		</select>
	  		</h3>
	  		<h3>Age: <?php echo $editAge;?></h3>
	  		<h3>Checkout Date: <?php echo $editCheckoutDate?></h3>
	  		<h3>Status: <?php echo $editStatus?></h3>
	  		<input type="hidden" name="garmentID" value=<?php echo $editGarmentID?>/>
			<input TYPE=SUBMIT value="Save">
			<button type="button" name="back" onclick="history.back()">Back</button>
		</form>
		<?php
		}
			if(isset($_POST["garmentID"])){
				$garment = new Garment();
				$garmentID = $_POST["garmentID"];
				$eGarmentID = str_replace("/","",$garmentID);
				$garment->edit($eGarmentID, $_POST["type"], $_POST["size"], $_POST["color"], $_POST["timePeriod"]);
			}
		?>
	</body>
</html>