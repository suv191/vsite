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

		<?php 	
			$Principal = $_POST["principal"];
			$Interest = $_POST["interest"];

			$Payment = ($Principal * ($Interest / 100)) / 12 ;
			
			$msg = "";
			$errCount = 0;

			if (empty($Principal)) {
				$msg .= "<br><span class='errmsg'>You must enter a Amount<span>";
				$errCount++;
			}
			else {
				if (!is_numeric($Principal)) {
					$msg .= "<br><span class='errmsg'>The Amount must be numeric<span>";
					$errCount++;
				}
			}

			if (empty($Interest)) {
				$msg .= "<br><span class='errmsg'>You must enter a Interest<span>";
				$errCount++;
			}
			elseif (!is_numeric($Interest)) {
				$msg .= "<br><span class='errmsg'>The Interest must be numeric<span>";
				$errCount++;
			}

		if ($errCount>0) {
			# code...
			print "$msg";
		} else {
			# code...
			print "<p>If you finance Rs.$Principal at an interest rate of $Interest% ...</p>";
			print "<p>Your monthly payment will be Rs.".number_format($Payment,2)."</p>";
		
		}
		
		
		?>
	</div>
</body>
</html>