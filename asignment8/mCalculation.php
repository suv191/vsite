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