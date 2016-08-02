<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Asignment-6</title>
	<link rel="stylesheet" href="css/basic.css">
	<style>
	
	#realtorDetail
	{
	  position: absolute;
	  top: 10px;
	  left: 10px;
	  width: 200px;
	  height: 110px;
	  padding: 5px;
	  background-color: #0C4683;
	  font-size: 18px;
	  font-family: Arial, Helvetica, sans-serif;
	  visibility: hidden;
	}
		
	</style>
	<script>

	function showRealtorDetail(element,fullData)
	{
		var showDiv = document.getElementById('realtorDetail');

		x = element.offsetLeft;
		y = element.offsetTop;

		showDiv.style.left = x + 950 + 'px';
		showDiv.style.top = y + 100 + 'px';

		//alert (x);
		var full_data = fullData.split('|');

		var str = "<p><b><span> " + full_data[0] + "</span></b></p>";
			str += "<p>" + full_data[1] + "<br>";
			str += full_data[2] + "</p>";

		showDiv.innerHTML = str;

		
		showDiv.style.visibility = 'visible';

	}
	
	function hideRealtorDetail()
	{
		var hideDiv = document.getElementById('realtorDetail');

		hideDiv.style.visibility='hidden';
	}

	</script>

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
		<a href="contact.php">Guest Book </a> / <a href="mcalc.php"> Mortgage Calculator</a>
	</p>
	</div>

	<div id="realtorDetail">
		
	</div>
	
</body>
</html>

<?php 
	function displayRealtors() 
	{
		# Reading from a table
			
		$statement = "SELECT * ";
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

				$lastname = $sqlResults[$i]['lastname'];
				$phone = $sqlResults[$i]['phone'];
				$email = $sqlResults[$i]['email'];

				$full_data = $firstname.' '.$lastname.'|'.$phone.'|'.$email.'|';


				print "<p><img src='realtors/".$image_file."' onmouseover='showRealtorDetail(this, \"".$full_data."\");' onmouseout='hideRealtorDetail();' >";

				print "<br />".$firstname."</p>\n";
			}
		}
	}

 ?>