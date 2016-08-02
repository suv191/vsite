		<?php 

		//***************************************
		// Gather Data from Form
		//***************************************


			$full_data = $_POST['full_data'];

			list($firstName, $lastName, $contactChoice, $phoneOrMail, $City, $Comments) = explode( '|', $full_data);
		
		
		//***************************************
		//Add Client Information to database
		//***************************************

			include 'validation_connection.php';

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
