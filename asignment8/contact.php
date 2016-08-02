<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Assignment-1</title>
	<link rel="stylesheet" href="css\basic.css">

	<script>

	var xmlhttp = false;

	if (window.XMLHttpRequest) {
	  xmlhttp = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

			
	function ajaxCallFunction()
	{

		var errMsg = doValidation();

		if ( errMsg == "") 
		{
			//errMsg = "success";
			//document.getElementById('mortgage').innerHTML = errMsg;
			
			if(xmlhttp)
			{

				xmlhttp.open("POST","basic.php");

				xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	        	xmlhttp.onreadystatechange = function() 
	        	{
	           		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            	{
	                	document.getElementById("mortgage").innerHTML = xmlhttp.responseText;
	               		document.getElementById("mortgage").style.visibility = 'visible';

	            	}
	        	}

	        	var firstname = document.getElementById('firstname').value;
				var	lastname = document.getElementById('lastname').value;
				var	medium = document.getElementById('medium').value;
				var	contactinfo = document.getElementById('contactinfo').value;
				var	city = document.getElementById('city').value;
				var	comments = document.getElementById('comments').value;

				var full_data = firstname + '|' + lastname + '|' + medium + '|' + contactinfo + '|' + city + '|' + comments + '|';
				
//					alert (full_data);

				xmlhttp.send("full_data=" + full_data);

			}

		}
		else
		{

			document.getElementById('mortgage').innerHTML = errMsg;
	        document.getElementById("mortgage").style.visibility = 'visible';


		}

		return false;

	}


	function ajaxViewFunction()
	{

		if(xmlhttp)
		{

			xmlhttp.open("POST","view_client.php");

			xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	       	xmlhttp.onreadystatechange = function() 
	       	{
	       		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	           	{
	               	document.getElementById("mortgage").innerHTML = xmlhttp.responseText;
	               	document.getElementById("mortgage").style.visibility = 'visible';

	           	}
	       	}

	        var data = 'dummy';	

			xmlhttp.send("data=" + data);

		}

	return false;
	}

	function doValidation()
	{

		var errMsg = "";
		//alert ("doValidation :")
		var firstname = document.getElementById('firstname').value;
		var lastname = document.getElementById('lastname').value;
		var phoneOrEmail = document.getElementById('contactinfo').value;
		var city = document.getElementById('city').value;

		if ( firstname == null || firstname == "")
		{
			errMsg += "<br /><span class='errmsg'>You must enter a First Name<span>";
		}
		if ( lastname == null || lastname == "")
		{
			errMsg += "<br /><span class='errmsg'>You must enter a Last Name<span>";
		}
		if ( phoneOrEmail == null || phoneOrEmail == "")
		{
			errMsg += "<br /><span class='errmsg'>You must enter a " + phoneOrEmail + "<span>";
		}
		if ( city == null || city == "")
		{
			errMsg += "<br /><span class='errmsg'>You must select a City<span>";
		}

		return errMsg;
	}




	</script>
</head>
<body>
	<div>
		<a href="index.php"><img src="logo.jpg" alt=""></a>
	</div>
	
	
	<div id="basicInfo">
		<h4>Please sign up our guest list and our customer care will contact you</h4>

			<p>
				First name:</br>
				<input type="text" name="firstname" id="firstname" size="40" />
			</p>
			<p>
				Last name:</br>
				<input type="text" name="lastname" id="lastname" size="40" />
			</p>
			<p>
				Contact Information: 
				<input type="radio" name="medium" id="medium" value="phone" checked="checked"> Phone 
				<input type="radio" name="medium" id="medium" value="email"> Email </br>
				<input type="text" name="contactinfo" id="contactinfo" size="40" />
			</p>
			<p>
				City where you want to Reside: </br>
				<select name="city" id="city" size="1" >
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
				<textarea name="comments" id="comments"  cols="40" rows="10"></textarea>
			</p>
			<p>
				<input type="submit" class="btn" value="Submit Information" onclick="ajaxCallFunction();">
			</p>
		

		For Admin Use Only: <a href="" onclick="return ajaxViewFunction();">View Guestbook</a>
	
	</div>

	<div id="mortgage">

		
	</div>

</body>
</html>