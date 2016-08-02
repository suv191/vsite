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
		

	function emi()
	{
		if(xmlhttp)
		{

			xmlhttp.open("POST","payment.php");

			xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

	       	xmlhttp.onreadystatechange = function() 
	       	{
	       		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	           	{
	               	var returnedData = xmlhttp.responseText;
	               	if (returnedData.substr(0,5) == 'ERROR')
					  {
					  	var errorDiv = document.getElementById('mortgage');
					  	errorDiv.innerHTML = "ERROR ON DATABASE";
					  } else {
					    monthlypayment = document.getElementById('result');
					    monthlypayment.value = returnedData;
					    
					  }

	               	//alert (xmlhttp.responseText);
	               	//alert (document.getElementById('result').value);
	           	}
	       	}
	       	var principal = document.getElementById('principal').value;
			var interest = document.getElementById('interest').value;
			
	        var data = principal + '|' + interest + '|';	

			xmlhttp.send("data=" + data);

		}

	return false;
		
	}






	</script>
</head>
<body>
	<div>
		<a href="index.php"><img src="logo.jpg" alt=""></a>
	</div>
	
	
	<div id="basicInfo">
		

		<h4>Mortgage Calculator</h4>
				
			<table>
				<tr>
					<td>Amount Financed </td>
					<td><input type="text" name="principal" id="principal" size="10" /></td>
				</tr>
				<tr>
					<td>Interest Rate </td>
					<td><input type="text" name="interest" id="interest" size="10"></td>
				</tr>
				<tr>
					<td>EMI </td>
					<td><input type="text" name="result" id="result" disabled="disabled" size="10"></td>
				</tr>
			</table>
			<p><input type="submit" class="btn" value="Calculate Payment" onclick="emi();"></p>
		
		
	</div>
<div id="mortgage" style="color: red;"></div>


</body>
</html>