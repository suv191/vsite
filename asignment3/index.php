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
	
	<?php 
		# Reading from a file
		$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];// gets the root directory

		$fileName = $DOCUMENT_ROOT.'vsite/asignment3/data/'.'cities.txt'; //get the file

		$linesInFile = count(file($fileName)); //counts the no. of lines in the file

		$fp = fopen($fileName, 'r'); // open the file for reading 'r'


	 ?>
	
	<div id="basicInfo">
		<h4>Please sign up our guest list and our customer will contact you</h4>

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

						for ($ii=1; $ii <= $linesInFile; $ii++) { 
							# code...
							$line = fgets($fp); // Reads one line from the file
							$City = trim($line);

							print '<option value="'.$City.'">'.$ii.' : '.$City.'</option>';
						}

						fclose($fp);


					 ?>
					
				</select></br>
			</p>
			<p>
				Comments:</br>
				<textarea name="comments"  cols="40" rows="10"></textarea>
			</p>
			<p>
				<input type="submit" value="Submit Information">
			</p>
		</form>

		For Admin Use Only: <a href="asignment3.php">View Guestbook</a>
	
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
			<p><input type="submit" value="Calculate Payment"></p>
		</form>
		
	</div>

</body>
</html>