<html>
<head>
  <title>0801_Connect_PHP_with_MySQL</title>
  <link rel="stylesheet" href="http://profperry.com/Classes/Main.css" type="text/css">

</head>

<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: silver;">


<h2 style="background-color: #F5DEB3;">Connect to Database - SELECT from table</h2>

<?php

//**********************************************
//*
//*  Connect to MySQL and Database
//*
//**********************************************

$db = mysql_connect('localhost','root','');

if (!$db)
{
	print "<h1>Unable to Connect to MySQL</h1>";
}

$dbname = 'test';

$btest = mysql_select_db($dbname);

if (!$btest)
{
	print "<h1>Unable to Select the Database</h1>";
}


//**********************************************
//*
//*  SELECT from table and display Results
//*
//**********************************************

$sql_statement  = "SELECT lastname, firstname, state ";
$sql_statement .= "FROM author ";
$sql_statement .= "WHERE state = 'CA' ";
$sql_statement .= "ORDER BY lastname, firstname ";

$result = mysql_query($sql_statement);

$outputDisplay = "";
$myrowcount = 0;

if (!$result) {
	$outputDisplay .= "<br /><font color=red>MySQL No: ".mysql_errno();
	$outputDisplay .= "<br />MySQL Error: ".mysql_error();
	$outputDisplay .= "<br />SQL Statement: ".$sql_statement;
	$outputDisplay .= "<br />MySQL Affected Rows: ".mysql_affected_rows()."</font><br />";
} else {

	$outputDisplay  = "<h3>Authors who live in CA</h3>";

	$outputDisplay .= '<table border=1 style="color: black;">';
	$outputDisplay .= '<tr><th>Last Name</th><th>First Name</th><th>State</th></tr>'               	;

	$numresults = mysql_num_rows($result);

	for ($i = 0; $i < $numresults; $i++)
	{
		if (!($i % 2) == 0)
		{
			 $outputDisplay .= "<tr style=\"background-color: #F5DEB3;\">";
		} else {
			 $outputDisplay .= "<tr style=\"background-color: white;\">";
		}

		$myrowcount++;

		$row = mysql_fetch_array($result);

		$lastname  = $row['lastname'];
		$firstname = $row['firstname'];
		$state = $row['state'];

		$outputDisplay .= "<td>".$lastname."</td>";
		$outputDisplay .= "<td>".$firstname."</td>";
		$outputDisplay .= "<td>".$state."</td>";

		$outputDisplay .= "</tr>";

	}

	$outputDisplay .= "</table>";

}


?>


<hr size="4" style="background-color: #F5DEB3; color: #F5DEB3;">

<?php
	$outputDisplay .= "<br /><br /><b>Number of Rows in Results: $myrowcount </b><br /><br />";
	print $outputDisplay;
?>

</body>
</html>