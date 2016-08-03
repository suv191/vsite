<?php 
//error_reporting(E_ALL ^ E_DEPRECATED);
	function connectDatabase()
	{
		//**********************************************
		//*
		//*  Connect to MySQL and Database
		//*
		//**********************************************

		$DBHOST = "localhost";
		$DBNAME = "test";
		$DBUSER = "root";
		$DBPASSWORD = "password";
		 
		$sLink = mysqli_connect($DBHOST,$DBUSER,$DBPASSWORD,$DBNAME) or die('Connection with MySql Server failed');
		
		return $sLink;

	}

	function selectResults($statement)
	{
		//**********************************************
		//*
		//*  Query to  Database
		//*
		//**********************************************

		$sLink = connectDatabase();

		$output = "";
		$outputArray = array();	

		if ($sLink)
		{
			$result = mysqli_query($sLink,$statement);

			if (!$result) 
			{
				$output .= "ERROR";
				$output .= "<br /><font color=red>MySQL No: ".mysqli_errno($sLink);
				$output .= "<br />MySQL Error: ".mysqli_error($sLink);
				$output .= "<br />SQL Statement: ".$statement;
				$output .= "<br />MySQL Affected Rows: ".mysqli_affected_rows($sLink)."</font><br />";

				array_push($outputArray, $output);

			} else {

				$rowcount = mysqli_num_rows($result);

				array_push($outputArray, $rowcount);

				for ($i = 0; $i < $rowcount; $i++)
				{
					$row = mysqli_fetch_array($result);

					array_push($outputArray, $row);
				}
			} 

		} else {

			array_push($outputArray, 'ERROR - No database Connection');
		}

		return $outputArray;

	}

	function doValidation($firstName, $lastName, $phoneOrMail, $City, $contactChoice)
	{

	$msg = "";
	
	if (empty($firstName)) 
	{
		$msg .= "<br /><span class='errmsg'>You must enter a First Name<span>";
	}
	if (empty($lastName)) 
	{
		$msg .= "<br /><span class='errmsg'>You must enter a Last Name<span>";
	}
	if (empty($phoneOrMail)) 
	{
		$msg .= "<br /><span class='errmsg'>You must enter a $contactChoice<span>";
	}
	if ($City == '-') 
	{
		$msg .= "<br /><span class='errmsg'>You must select a City<span>";
	}

	return $msg;

	}
	


	function updateResults($statement)
	{

		$output = "";
		$outputArray = array();

		$sLink = connectDatabase();

		if ($sLink)
		{
			$result = mysqli_query($sLink,$statement);

			if (!$result) {
				$output .= "ERROR";
				$output .= "<br /><font color=red>MySQL No: ".mysqli_errno($sLink);
				$output .= "<br />MySQL Error: ".mysqli_error($sLink);
				$output .= "<br />SQL Statement: ".$statement;
				$output .= "<br />MySQL Affected Rows: ".mysqli_affected_rows($sLink)."</font><br />";

			} else {
				$output = mysqli_affected_rows($sLink);
			}

		} else {

			$output =  'ERROR-No DB Connection';

		}

		return $output;
	}


 ?>