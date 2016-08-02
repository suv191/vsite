<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="css\basic.css">
</head>
<body>

	<div id="DetailInfo">
		

	<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Contact By</th>
			<th>Phone or Email</th>
			<th>City</th>
			<th>Contact Date</th>
			<th>Comments</th>
		</tr>

		<?php 	

	//*****************************************************
	//Read Guestbook Information From File Into HTML table
	//*****************************************************	

		$display = "";
		$line_ctr = 0;

		include "validation_connection.php";

		$outputDisplay = '';


		$statement  = "SELECT ";
		$statement .= "firstname,lastname, ";
		$statement .= "contact_by, phone_email, ";
		$statement .= "city, contact_date, ";
		$statement .= "comments ";
		$statement .= "FROM client ";
		$statement .= "ORDER BY firstname, lastname  ";

		$sqlResults = selectResults($statement);

		$error_or_rows = $sqlResults[0];

		if (substr($error_or_rows, 0 , 5) == 'ERROR')
		{
			print "<br />Error on DB";
			print $error_or_rows;
		} else {

			for ($ii = 1; $ii <= $error_or_rows; $ii++)
			{
				
				$firstname  	= $sqlResults [$ii] ['firstname'];
				$lastname  		= $sqlResults [$ii] ['lastname'];
				$contact_by		= $sqlResults [$ii] ['contact_by'];
				$phone_email	= $sqlResults [$ii] ['phone_email'];
				$city  			= $sqlResults [$ii] ['city'];
				$contact_date  	= $sqlResults [$ii] ['contact_date'];
				$comments  		= $sqlResults [$ii] ['comments'];


				$line_ctr++;

				$line_ctr_remainder = $line_ctr % 2;

				if ($line_ctr_remainder == 0)
				{
					$style = "style='background-color: #FFFFCC;'";
				} else {
					$style = "style='background-color: white;'";
				}

				$display .= "<tr $style>";
				
				$display .= "<td>".$firstname."</td>";
				$display .= "<td>".$lastname."</td>";


				if (empty($contact_by))
				{
					$contact_by = 'n/a';
				}

				$display .= "<td>".$contact_by."</td>";


				if (empty($phone_email))
				{
					$phone_email = 'n/a';
				}

				$display .= "<td>".$phone_email."</td>";

				$display .= "<td>".$city."</td>";
				$display .= "<td>".$contact_date."</td>";

				if (empty($comments))
				{
					$comments = '&nbsp;';
				}

				$display .= "<td>".$comments."</td>";
				$display .= "</tr>\n";  //added newline
			}

			print $display;

		}
	
		?>
		
	</table>
	</div>
</body>
</html>