<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment-6</title>
	<link rel="stylesheet" href="css\basic.css">
</head>
<body>
	<div>
		<a href="index.php"><img src="logo.jpg" alt=""></a>
	</div>
	
	<div id="homelist">

	<?php 
		$find_city = $_POST['find_city'];
		if (empty($find_city)) {
			$find_city = "ALL";
		}
		
		if ($find_city == "ALL") {
			print "<h2> Current Listing</h2>";
			//print "City : ".$find_city." User inserted ";
		}
		else {
			print "<h2> Current Listing that match: ".$find_city."</h2>";
		}
		
		# database connection
		include 'validation_connection.php';

		displayPropertyInfo($find_city);
		
		#############################################
		### Function Defination
		###########################################
		

		function displayPropertyInfo($find_city)
		{
						
			$statement  = "SELECT city, ";
			$statement .= "       price, ";
			$statement .= "       baths, ";
			$statement .= "       bedrooms, ";
			$statement .= "       area, ";
			$statement .= "       realtor, ";
			$statement .= "       img_file, ";
			$statement .= "       Grabber, ";
			$statement .= "       description ";
			$statement .= "FROM homes ";

			if ($find_city != 'ALL') 
			{
				$statement .= "WHERE city LIKE '%".$find_city."%' ";
			}
			
			$statement .= "ORDER BY city, price ";

			$sqlResults = selectResults($statement);

			$error_or_rows = $sqlResults[0];

			if (substr($error_or_rows, 0 , 5) == 'ERROR')
			{
				print "<br />Error on DB";
				print "<br />$error_or_rows";
			} else {

				$arraySize = $error_or_rows;

				for ($i=1; $i <= $error_or_rows; $i++)
				{
					$city = $sqlResults[$i]['city'];
					$price = $sqlResults[$i]['price'];
					$baths = $sqlResults[$i]['baths'];
					$bedrooms = $sqlResults[$i]['bedrooms'];
					$area = $sqlResults[$i]['area'];
					$realtor = $sqlResults[$i]['realtor'];
					$Grabber = $sqlResults[$i]['Grabber'];
					$description = $sqlResults[$i]['description'];
					$img_file = $sqlResults[$i]['img_file'];


					print "<img src='house_images/".$img_file."'>";

					print "<h3>".$Grabber."</h3>";

					print "City: ".$city."<br />";
					print "Bed/Baths: $bedrooms / $baths<br />";

					$formatted_price = number_format($price);
					print "Price: Rs.".$formatted_price."<br />";

					print "Area: ".$area." sq.ft.<br />";
					print "Realtor: ".$realtor."<br /><br />";

					print $description."<br /><br /><hr /><br />";

				}
			}
		}

	 ?>
	
	</div>
	
</body>
</html>