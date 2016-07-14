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

			include 'validation.php';
			

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