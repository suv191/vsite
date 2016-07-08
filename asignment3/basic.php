<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment-1</title>
	<link rel="stylesheet" href="css\basic.css">
</head>
<body>
	<div>
		<a href="index.php"><img src="logo.jpg" alt=""></a>
	</div>

	<div id="basicInfo">
		

		<?php 	

			$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];// gets the root directory

			$fileName = $DOCUMENT_ROOT.'vsite/asignment3/data/'.'client.txt'; //get the file

			$linesInFile = count(file($fileName)); //counts the no. of lines in the file

			
			$firstName = $_POST["firstname"];
			$lastName = $_POST["lastname"];
			$fullName = $firstName.' '.$lastName;

			$Medium = $_POST["medium"];
			$contactInfo = $_POST["contactinfo"];
			$City = $_POST["city"];
			$Comments = $_POST["comments"];

			$msg = "";
			$errCount = 0;

			if (empty($firstName)) {
				$msg .= "<br><span class='errmsg'>You must enter a firstName<span>";
				$errCount++;
			}
			if (empty($lastName)) {
				$msg .= "<br><span class='errmsg'>You must enter a lastName<span>";
				$errCount++;
			}
			if (empty($contactInfo)) {
				$msg .= "<br><span class='errmsg'>You must enter a $Medium<span>";
				$errCount++;
			}
			if ($City="-") {
				$msg .= "<br><span class='errmsg'>You must select a City<span>";
				$errCount++;
			}
			if (empty($Comments)) {
				$msg .= "<br><span class='errmsg'>You must enter a Comments<span>";
				$errCount++;
			}

			if ($errCount==5) {

				print " <br><span class='errmsg'>You haven't enter anything<span>";
			}
			elseif ($errCount>0) {
			 	
				print "$msg";
			}
			else {

				print "<h4> Thank You! A representive will contact you soon</h4>";

				print "<p>Information Submitted for: $fullName </p>";

				print "<p>Your $Medium No is:<span class='textBlue'> $contactInfo </span></br> 
						and You are interested in living in $City </p>";
				
				print "<p>Our representative will reveiw your comments below:</br>
						<textarea name='comments' disabled='disabled' class='textareaDisable' cols='40' rows='10'> $Comments </textarea></p>";

				# Write to a file

				$fp = fopen($fileName, 'a'); // opens the file for appending 'a'
				$outputLine = $firstName.'|'.$lastName.'|'.$Medium.'|'.$contactInfo.'|'.$City.'|'.date("m-d-Y").'|'.$Comments.'|'."\n";
				fwrite($fp, $outputLine);

				fclose($fp);

			}
	
		?>
	</div>
</body>
</html>