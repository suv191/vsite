<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment-4</title>
	<link rel="stylesheet" href="css\basic.css">
</head>
<body>
	<div>
		<a href="index.php"><img src="logo.jpg" alt=""></a>
	</div>

	<?php 
		$find_city = $_POST['citySearch'];
		if (empty($find_city)) {
			$find_city = "ALL";
		}
		# Reading from a directory
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];// gets the root directory

		$dirName = $DOCUMENT_ROOT.'vsite/asignment4/'.'house_images'; //get the directory

		$dirHandle = opendir($dirName); // handler to the directory


		if ($dirHandle) {
			while (false !==($file = readdir($dirHandle))) {
				if ($file != '.' && $file != '..') {
					displayPropertyInfo($file,$find_city);
				}
			}
		}
		#############################################
		### Function Defination
		###########################################
		

		function displayPropertyInfo($image_filename,$find_city){
			$printHead = "";
			$printCnt = 0;
			$line_Cntr = 0;
			// get image filename
			$imageName = 'house_images/'.$image_filename; //.jpg file
			$house_image = "<p><img src='".$imageName."'></p>";
			//get image index info
			$indexFileName = str_replace('.jpg', '.txt', $image_filename);
			$filename = 'house_index/'.$indexFileName; //.txt file
			$linesInFile = count(file($filename)); //counts the no. of lines in the file
			$fp = fopen($filename, 'r');

			$show_house = 'Y';  //set defauilt value

			while (true)
			{
				$line = fgets($fp); // Reads one line from the file
				if (feof($fp))
				{    // checks if the line is the end of the file
					break;   
				}
				$pos = stripos($line, 'City:');
				if ($pos !== False) {
					$city = substr($line, '5');
					$city = trim($city);
					$line_Cntr++;
					if ($find_city !== 'ALL') {
						$subpos = stripos($city, $find_city);
						if ($subpos === false) {
							$show_house = 'N';
							break;
						}
						else {
							$printHead .= "<h2> Current Listing that match: ".$find_city."</h2>";
							$printCnt++;
						}
						
					}
				}
				$pos = stripos($line, 'Price:');
				if ($pos !== False) {
					$price = substr($line, '6');
					$price = trim($price);
					$line_Cntr++;
				}
				$pos = stripos($line, 'Bedrooms:');
				if ($pos !== False) {
					$Bedrooms = substr($line, '9');
					$Bedrooms = trim($Bedrooms);
					$line_Cntr++;
				}
				$pos = stripos($line, 'Baths:');
				if ($pos !== False) {
					$Baths = substr($line, '6');
					$Baths = trim($Baths);
					$line_Cntr++;
				}
				$pos = stripos($line, 'Footage:');
				if ($pos !== False) {
					$Footage = substr($line, '8');
					$Footage = trim($Footage);
					$line_Cntr++;
				}
				$pos = stripos($line, 'Realtor:');
				if ($pos !== False) {
					$Realtor = substr($line, '8');
					$Realtor = trim($Realtor);
					$line_Cntr++;
				}
				$pos = stripos($line, 'Grabber:');
				if ($pos !== False) {
					$Grabber = substr($line, '8');
					$Grabber = trim($Grabber);
					$line_Cntr++;
				}
				$pos = stripos($line, 'Description:');
				if ($pos !== False) {
					
					for ($ii=1; $ii <= $linesInFile-$line_Cntr; $ii++) { 
							# code...
						$line = fgets($fp); // Reads one line from the file
						$City = trim($line);
						$Description .= $line;
							
					}

				}
			}
			if ($show_house == 'Y') {
				if ($printCnt>0) {
					print $printHead;
					print $house_image;

					print "<h4>".$Grabber."</h4>";
					print "City:".$city."<br />";
					print "Beds/Baths: $Bedrooms / $Baths <br />";
					print "Price: ".$price."<br />";
					print "Area: ".$Footage."<br />";
					print "Realtor: ".$Realtor."<br /><br />";
					print "$Description<br /><br />";
				}
				else {
					print "<h2> Current Listing</h2>";
					print $house_image;

					print "<h4>".$Grabber."</h4>";
					print "City:".$city."<br />";
					print "Beds/Baths: $Bedrooms / $Baths <br />";
					print "Price: ".$price."<br />";
					print "Area: ".$Footage."<br />";
					print "Realtor: ".$Realtor."<br /><br />";
					print "$Description<br /><br />";
				}
			}

		}

	 ?>
	

	
</body>
</html>