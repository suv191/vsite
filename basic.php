<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment-1</title>
	<link rel="stylesheet" href="css\basic.css">
</head>
<body>
	<img src="logo.jpg" alt="">

	<div id="basicInfo">
		<h3> Thank You! A representive will contact you soon</h3>

		<?php 	
			$firstName = $_POST["firstname"];
			$lastName = $_POST["lastname"];
			$fullName = $firstName.' '.$lastName;

			$Medium = $_POST["medium"];
			$contactInfo = $_POST["contactinfo"];
			$City = $_POST["city"];
			$Comments = $_POST["comments"];
		
		print "<p>Information Submitted for: $fullName </p>";

		
		print "<p>Your $Medium No is:<span class='textBlue'> $contactInfo </span></br> 
				and You are interested in living in $City </p>";
		
		print "<p>Our representative will reveiw your comments below:</br>
				<textarea name='comments' disabled='disabled' class='textareaDisable' cols='40' rows='10'> $Comments </textarea></p>";


		?>
	</div>
</body>
</html>