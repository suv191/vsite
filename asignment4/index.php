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
			displayRealtors();
		 ?>
	</div>
	<div id="search">
		<form method="POST" action="asignment4.php">
			<p>
				<h4>Enter City: <input type="text" name="citySearch" size="40">
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
	function displayRealtors() {
		# Reading from a directory
			$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];// gets the root directory

			$dirName = $DOCUMENT_ROOT.'vsite/asignment4/'.'realtors'; //get the directory

			$dirHandle = opendir($dirName); // handler to the directory

			if ($dirHandle) {
				
				while (false !==($file = readdir($dirHandle))) {
					if ($file != '.' && $file != '..') {
						print "<p><img src='realtors/".$file."'>";
						$pos = stripos($file, '.');
						$realtorName = substr($file, 0, $pos);
						$realtorName = trim($realtorName);
						$realtorName = ucfirst($realtorName);
						print "<br/>".$realtorName."</p>\n";
					}
				}
			}
	}

 ?>