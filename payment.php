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
		<h4>Mortgage Calculator</h4>

		<?php 	
			$Principal = $_POST["principal"];
			$Interest = $_POST["interest"];

			$Payment = ($Principal * $Interest) / 12 ;
			
			if (empty($Principal)) {
				print "You must enter a Amount";
				print "<br /> Go back try again";
				print "</body></html>";
				exit;
			}
			else {
				if (!is_numeric($Principal)) {
					print "The Amount must be numeric";
					print "<br /> Go back try again";
					print "</body></html>";
					exit;
				}
			}

			if (empty($Interest)) {
				print "You must enter a Interest";
				print "<br /> Go back try again";
				print "</body></html>";
				exit;
			}
			elseif (!is_numeric($Interest)) {
				print "The Interest must be numeric";
				print "<br /> Go back try again";
				print "</body></html>";
				exit;
			}

		
		print "<p>If you finance $Principal at an interest rate of $Interest% ...</p>";

		
		print "<p>Your monthly payment will be ".round($Payment,2)."</p>";
		
		
		?>
	</div>
</body>
</html>