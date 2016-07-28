<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Asignment-6</title>
	<link rel="stylesheet" href="css/basic.css">
</head>
<body>
	<div>
		<a href="index.php"><img src="logo.jpg" alt=""></a>
	</div>
	<div id="mainPage">
		<h2>Featured Home!</h2>
		<p><img src="images/main.jpg" alt=""></p>
		<p><h4>As Far as the Eye Can See!</h4></p>
		<p>
			Spectacular Ocean and Canyon Views!!</br> 
			This large estate has roo to entertain with 2200 sq. ft. "ballroom" that features modern stone and wood work,</br>
			vaulted ceilings and huge bay windows. Large Master Suites featueing "His" and "Her" bathrooms.
		</p>
	</div>
	<div id="sideBar">
		<h2>Our Realtors</h2>
		<?php 
			include 'validation_connection.php';
			displayRealtors();
		 ?>
	</div>
	<div id="search">
		<form method="POST" action="asignment6.php">
			<p>
				<h4>Enter City: <input type="text" name="find_city" size="40">
				(Leave blank to find all houses listed)</h4>
			</p>
			<p><input type="submit" class="btn" value="Find Homes"></p>
			<p>Note: We represent homes in the following cities: Mumbai, Chennai, Kolkata, Delhi, Pune, Goa, Digha</p>
		</form>
	</div>
	<div id="link">
	<p>
		<a href="contact.php">Guest Book / Mortgage Calculator</a>
	</p>
	</div>
	
</body>
</html>

<?php 
	function displayRealtors() 
	{
		# Reading from a table
			
		$statement = "SELECT firstname,img_file ";
		$statement .= "FROM realtor ";
		$statement .= "ORDER BY firstname ";

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
				$firstname = $sqlResults[$i]['firstname'];
				$image_file = $sqlResults[$i]['img_file'];

				print "<p><img src='realtors/".$image_file."'>";

				print "<br />".$firstname."</p>\n";
			}
		}
	}

 ?>