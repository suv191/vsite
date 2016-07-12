<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Asignment-4</title>
	<link rel="stylesheet" href="css/basic.css">
</head>
<body>
	<div>
		<a href="index.php"><img src="logo.jpg" alt=""></a>
	</div>
	<div id="mainPage">
		<h2>Featured Home!</h2>
		<p><img src="house_images/main.jpg" alt=""></p>
		<p><h4>As Far as the Eye Can See!</h4></p>
		<p>
			Spectacular Ocean and Canyon Views!!</br> 
			This large estate has roo to entertain with 2200 sq. ft. "ballroom" that features modern stone and wood work,</br>
			vaulted ceilings and huge bay windows. Large Master Suites featueing "His" and "Her" bathrooms.
		</p>
	</div>
	<div id="sideBar">
		<?php 
			# Reading from a directory
			$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];// gets the root directory

			$dirName = $DOCUMENT_ROOT.'vsite/asignment4/'.'house_images'; //get the directory

			$dirHandle = opendir($dirName); // handler to the directory

		 ?>
	</div>
	<div id="search">
		<p>
			<h4>Enter City: <input type="text" name="citySearch" size="40">
			(Leave blank to find all houses listed)</h4>
		</p>
		<p><input type="submit" class="btn" value="Find Homes"></p>
		<p>Note: We represent homes in the following cities: Mumbai, Chennai, Kolkata, Delhi, Pune, Goa, Digha</p>
		
	</div>
	<div id="link">
	<p>
		<a href="contact.php">Guest Book / Mortgage Calculator</a>
	</p>
	</div>
	
</body>
</html>