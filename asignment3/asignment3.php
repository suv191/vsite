<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment-3</title>
	<link rel="stylesheet" href="css\basic.css">
</head>
<body>
	<div>
		<a href="index.php"><img src="logo.jpg" alt=""></a>
	</div>

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

			$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];// gets the root directory

			$fileName = $DOCUMENT_ROOT.'vsite/asignment3/data/'.'client.txt'; //get the file

			$display = ""; 
			$lineCntr = 0;

			$fp = fopen($fileName, 'r'); // opens the file for reading 'r'

			while (true)
			{
				$line = fgets($fp); // Reads one line from the file
				if (feof($fp))
				{    // checks if the line is the end of the file
					break;   
				}
				$lineCntr++;
				//for alternative table color
				$lineAlternative = $lineCntr % 2; // to get the remainder which determines odd even
				if ($lineAlternative==0) 
				{
					$Style = "style='background-color: #FFFFCC;'";
				}
				else
				{
					$Style = "style='background-color: white;'";
				}

				list($firstname,$lastname,$medium,$contact,$city,$contactdt,$comment) = explode('|', $line); // deliminates the '|' and adds

				$display .="<tr $Style>";
					$display .="<td>".$firstname."</td>";
					$display .="<td>".$lastname."</td>";
					$display .="<td>".$medium."</td>";
					$display .="<td>".$contact."</td>";
					$display .="<td>".$city."</td>";
					$display .="<td>".$contactdt."</td>";
					$display .="<td>".$comment."</td>";
				$display .="</tr>\n";
			}
			fclose($fp);

			print $display; // Prinst the table
	
		?>
	</table>
	</div>
</body>
</html>