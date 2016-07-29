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

		//***************************************
		// Gather Data from Form
		//***************************************


			$firstName = $_POST["firstname"];
			$lastName = $_POST["lastname"];
			
			$contactChoice = $_POST["medium"];

			$phoneOrMail = $_POST["contactinfo"];

			$City = $_POST["city"];

			$Comments = $_POST["comments"];


		//***************************************
		// Validate Entries
		//***************************************

			include 'validation_connection.php';
			
			$rtnmsg = doValidation($firstName, $lastName, $phoneOrMail, $City, $contactChoice);


			if ($rtnmsg == '') 
			{

				//print " <br><span class='errmsg'>You haven't enter anything<span>";
			}
			else
			{
			 	print "$rtnmsg";
			 	print "<br /><br />Go BACK and try again!";
				print "</body></html>";
				exit;
			}


		//***************************************
		//Add Client Information to database
		//***************************************

			$statement  = "INSERT INTO client ";
			$statement .= "(firstname, lastname, ";
			$statement .= "contact_by, phone_email, ";
			$statement .= "city, contact_date, ";
			$statement .= "comments) ";
			$statement .= "VALUES (";

			$statement .= "'".$firstName."', '".$lastName."', ";

			$statement .= "'".$contactChoice."', '".$phoneOrMail."', ";
			
			$statement .= "'".$City."', '".date("m-d-Y")."', ";

			$statement .= "'".$Comments."') ";

			$rtn = updateResults($statement);

			print "<br />$rtn";


		//***************************************
		//Display New Page
		//***************************************

			$fullName = $firstName.' '.$lastName;

			print "<h4> Thank You! A representive will contact you soon</h4>";

			print "<p>Information Submitted for: $fullName </p>";

			print "<p>Your $contactChoice No is:<span class='textBlue'> $phoneOrMail </span></br>";
			print "and You are interested in living in $City </p>";
				
			print "<p>Our representative will reveiw your comments below:</br>";
			print "<textarea name='comments' disabled='disabled' class='textareaDisable' cols='40' rows='10'>";
			print $Comments;
			print "</textarea></p>";
	
		?>
	</div>
</body>
</html>