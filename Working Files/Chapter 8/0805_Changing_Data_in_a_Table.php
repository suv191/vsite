<html>
<head>
  <title>0805_Changing_Data_in_a_Table</title>
  <link rel="stylesheet" href="http://profperry.com/Classes/Main.css" type="text/css">

  <style>
	#changeauthor {
		position: absolute;
		top: 80px;
		left: 400px;
		width: 300px;
		height: 500px;
		padding: 10px;
		background-color: #CCCCFF;
		visibility: visible;
	}

	#displayauthor {
		position: absolute;
		top: 80px;
		left: 10px;
		width: 300px;
		height: auto;
		padding: 10px;
		background-color: #CCCCFF;
	}
  </style>

</head>

<body style="font-family: Arial, Helvetica, sans-serif; color: Blue; background-color: silver;">

<form id="myform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

<h2 style="background-color: #F5DEB3;">Changing Data in a Table</h2>


<div id='changeauthor'>
    <h3>Update Author Data?</h3>

<?php

if (isset($_POST['updateauthor']))
{
	$updateauthor = $_POST['updateauthor'];
} else {
	$updateauthor = '';
}


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
//*  Fetch Form Data
//*
//**********************************************

if (isset($_POST['myssn']))
{
	$myssn = trim($_POST['myssn']);
} else {
	$myssn = '';
}

if (isset($_POST['mylastname']))
{
	$mylastname = trim($_POST['mylastname']);
} else {
	$mylastname = '';
}

if (isset($_POST['myfirstname']))
{
	$myfirstname = trim($_POST['myfirstname']);
} else {
	$myfirstname = '';
}

if ($updateauthor == 'Save Changes')
{
	if (empty($mylastname) || empty($myfirstname))
	{
		$rtncode = '';
	} else {
		$rtncode = updateAuthor($db, $myssn, $mylastname, $myfirstname);
	}
}


//**********************************************
//*
//*  SELECT from table and display Results
//*
//**********************************************

$sql_statement  = "SELECT ssn, lastname, firstname ";
$sql_statement .= "FROM author ";
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

	$outputDisplay  = "<h3>Author Table Data</h3>";

	$outputDisplay .= '<table border=1 style="color: black;">';
	$outputDisplay .= '<tr><th>SSN</th><th>Last Name</th><th>First Name</th></tr>';

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

		$ssn 	   = $row['ssn'];
		$lastname  = $row['lastname'];
		$firstname = $row['firstname'];

		if ($updateauthor != 'Save Changes')
		{
			if ($ssn == trim($updateauthor))
			{
				$myssn = $ssn;
				$mylastname = $lastname;
				$myfirstname = $firstname;
			}
		}

		$outputDisplay .= "<td><input type='submit' name='updateauthor' value='".$ssn."' /></td>";
		$outputDisplay .= "<td>".$lastname."</td>";
		$outputDisplay .= "<td>".$firstname."</td>";

		$outputDisplay .= "</tr>";
	}

	$outputDisplay .= "</table>";

}


print "<input type='hidden' name='myssn' size='11' value='".$myssn."'/>";

print "<p>Last Name:<br />";
print "<input type='text' name='mylastname' size='20' value='".$mylastname."'/>";
print "</p>";

print "<p>First Name:<br />";
print "<input type='text' name='myfirstname' size='20' value='".$myfirstname."'/>";
print "</p>";


?>

<br /><input type="submit" name='updateauthor' value="Save Changes" />

</div>

<div id='displayauthor'>
	<?php
		$outputDisplay .= "<br /><br /><b>Number of Rows in Results: $myrowcount </b><br /><br />";
		print $outputDisplay;
	?>
</div>

</form>
</body>
</html>

<?php

function updateAuthor($db, $myssn, $mylastname, $myfirstname)
{

	$statement 	= "update author ";
	$statement .= " set firstname = '".$myfirstname."', ";
	$statement .= "     lastname =  '".$mylastname."' ";
	$statement .= "where ssn = '".$myssn."' ";

	$result = mysql_query($statement);

	if ($result)
	{
		echo "<br>Author Updated: ".$mylastname.", ".$myfirstname;
		return $myssn;
	} else {
		echo("<h4>MySQL No: ".mysql_errno($result)."</h4>");
		echo("<h4>MySQL Error: ".mysql_error($result)."</h4>");
		echo("<h4>SQL: ".$statement."</h4>");
		echo("<h4>MySQL Affected Rows: ".mysql_affected_rows($result)."</h4>");

		return 'NotUpdated';
	}
}
?>