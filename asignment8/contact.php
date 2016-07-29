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
		<h4>Please sign up our guest list and our customer care will contact you</h4>

		<form method="POST" action="basic.php">
			<p>
				First name:</br>
				<input type="text" name="firstname" size="40" />
			</p>
			<p>
				Last name:</br>
				<input type="text" name="lastname" size="40" />
			</p>
			<p>
				Contact Information: 
				<input type="radio" name="medium" value="phone" checked="checked"> Phone 
				<input type="radio" name="medium" value="email"> Email </br>
				<input type="text" name="contactinfo" size="40" />
			</p>
			<p>
				City where you want to Reside: </br>
				<select name="city" size="1" >
					<option value="blank">-</option>
					<?php 

						include "validation_connection.php";

						$outputDisplay = '';


						$sql_statement  = "SELECT DISTINCT name ";
						$sql_statement .= "FROM city ";
						$sql_statement .= "ORDER BY name ";

						$sqlResults = selectResults($sql_statement);

						$error_or_rows = $sqlResults[0];

						if (substr($error_or_rows, 0 , 5) == 'ERROR')
						{
							print "<br />Error on DB";
						} else {

							for ($ii = 1; $ii <= $error_or_rows; $ii++)
							{
								$name  = $sqlResults [$ii] ['name'];

								//print "<br>N: $name";

								$outputDisplay .= "<option value='".$name."'>".$ii.":".$name."</option>";
							}
						}

						print $outputDisplay;

					 ?>
					
				</select></br>
			</p>
			<p>
				Comments:</br>
				<textarea name="comments"  cols="40" rows="10"></textarea>
			</p>
			<p>
				<input type="submit" class="btn" value="Submit Information">
			</p>
		</form>

		For Admin Use Only: <a href="view_client.php">View Guestbook</a>
	
	</div>

	<div id="mortgage">

		<h4>Mortgage Calculator</h4>
		<form method="POST" action="payment.php">		
			<table>
				<tr>
					<td>Amount Financed </td>
					<td><input type="text" name="principal" size="10" /></td>
				</tr>
				<tr>
					<td>Interest Rate </td>
					<td><input type="text" name="interest" size="10"></td>
				</tr>
			</table>
			<p><input type="submit" class="btn" value="Calculate Payment"></p>
		</form>
		
	</div>

</body>
</html>