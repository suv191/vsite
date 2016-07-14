<?php 
	$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];// gets the root directory

	$fileName = $DOCUMENT_ROOT.'vsite/asignment3/data/'.'client.txt'; //get the file

	$linesInFile = count(file($fileName)); //counts the no. of lines in the file


	$firstName = $_POST["firstname"];
	$lastName = $_POST["lastname"];
	$fullName = $firstName.' '.$lastName;

	$Medium = $_POST["medium"];
	$contactInfo = $_POST["contactinfo"];
	$City = $_POST["city"];
	$Comments = $_POST["comments"];

	$msg = "";
	$errCount = 0;

	if (empty($firstName)) {
		$msg .= "<br><span class='errmsg'>You must enter a firstName<span>";
		$errCount++;
	}
	if (empty($lastName)) {
		$msg .= "<br><span class='errmsg'>You must enter a lastName<span>";
		$errCount++;
	}
	if (empty($contactInfo)) {
		$msg .= "<br><span class='errmsg'>You must enter a $Medium<span>";
		$errCount++;
	}
	if ($City="-") {
		$msg .= "<br><span class='errmsg'>You must select a City<span>";
		$errCount++;
	}
	if (empty($Comments)) {
		$msg .= "<br><span class='errmsg'>You must enter a Comments<span>";
		$errCount++;
	}
 ?>