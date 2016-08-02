<html>
<head>
  <title>Reload Estate</title>
  <link rel="stylesheet" href="http://profperry.com/Classes/Main.css" type="text/css">
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: Blue;">

<div class=toptext>
<?php
print  "<span style=\"font-family: Arial, Helvetica, sans-serif; font-size: 18px; font-weight: bold; font-stretch: wider; color: white\">&nbsp;&nbsp;&nbsp;Practice Server</span>";
?>
</div>

<div style="width: 780px;">
<br><br><br><br>
<h2 style="background-color: #F5DEB3;">Reload the Estate Database - Version 5</h2>


<?php

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


$err_cntr = 0;

$estate_sql = getSQL();  //Retreive the entire SQL statement string

$mySQLArray = explode(';', $estate_sql);  //Break up into individual SQL statements

foreach ($mySQLArray as $element)
{
	//print "<br>$element";
	$sqlstatement = trim($element);
	if ($sqlstatement != '')
	{
		$status = doSQLStatement($sqlstatement);
		if ($status == 'error')
		{
			$err_cntr++;
		}
	}
}

if ($err_cntr > 0)
{
	print "<h1><font color=red>There were errors!</font></h1>";
	print "<br><b>Try running this program one more time by clicking Reload/Refresh</b>";
    print "<br><b>If you get errors again, then email me!</b>";
} else {
	print "<h1>Estate was re-loaded successfully</h1>";
	print "<br><b>Run this script any time you change the database</b>";
}


function doSQLStatement($a_sql_string)
{
	$result = mysql_query($a_sql_string);

	if ($result) {
		$aff_rows = mysql_affected_rows();
		return 'ok';
	} else {
		echo("<br><font color=red>MySQL No: ".mysql_errno()."");
		echo("<br>MySQL Error: ".mysql_error()."");
		echo("<br>SQL: ".$a_sql_string."");
		echo("<br>MySQL Affected Rows: ".mysql_affected_rows()."</font><br>");

		return 'error';
	}
}

?>

<?php
function getSQL()
{

$estate_all_sql = "
drop table realtor;

create table realtor
 (firstname varchar(20) not null,
 img_file varchar(20) not null);
;

drop table homes;

create table homes
  (city varchar(20) null,
  bedrooms int null,
  baths int null,
  price numeric(11,2) null,
  area int null,
  realtor varchar(20) null,
  Grabber varchar(100) null,
  description varchar(300) null,
  img_file varchar(20) not null);
;

drop table client;

create table client
 (firstname varchar(20) null,
 lastname varchar(20) null,
 contact_by varchar(7) null,
 phone_email varchar(20) null,
 city varchar(20) null,
 contact_date varchar(20) null,
 comments varchar(100) null);
 ;

drop table city;

create table city
 (name varchar(20) not null);
;

insert into city
values('Delhi')
;
insert into city
values('Chennai')
;
insert into city
values('Kolkata')
;
insert into city
values('Mumbai')
;
insert into city
values('Pune')
;
insert into city
values('Goa')
;
insert into city
values('Digha')
;



insert into realtor
values('Lara', 'lara.jpg')
;
insert into realtor
values ('Noah', 'n.jpg')
;
insert into realtor
values('Candice', 'pretty-women.jpg')
;
insert into realtor
values('Peter', 'w01.jpg')
;
insert into realtor
values('Lui', 'women.jpg')
;



insert into homes
values('Chennai', '5','3', '16000000', '3000', 'abc', 'Fantastic Home with a Fantastic View!', 'You will never get tired of watching the sunset from your living room sofa or the sunrise from your back porch with a view overlooking the gorgeous coral canyon. Once in a lifetime opportunity!', 'chennai.jpg')
;
insert into homes
values('Delhi', '5','3', '16000000', '3000', 'abc', 'Fantastic Home with a Fantastic View!', 'You will never get tired of watching the sunset from your living room sofa or the sunrise from your back porch with a view overlooking the gorgeous coral canyon. Once in a lifetime opportunity!', 'delhi.jpg')
;
insert into homes
values('Digha', '5','3', '16000000', '3000', 'abc', 'Fantastic Home with a Fantastic View!', 'You will never get tired of watching the sunset from your living room sofa or the sunrise from your back porch with a view overlooking the gorgeous coral canyon. Once in a lifetime opportunity!', 'digha.jpg')
;
insert into homes
values('Goa', '5','3', '16000000', '3000', 'abc', 'Fantastic Home with a Fantastic View!', 'You will never get tired of watching the sunset from your living room sofa or the sunrise from your back porch with a view overlooking the gorgeous coral canyon. Once in a lifetime opportunity!', 'goa.jpg')
;
insert into homes
values('Kolkata', '5','3', '16000000', '3000', 'abc', 'Fantastic Home with a Fantastic View!', 'You will never get tired of watching the sunset from your living room sofa or the sunrise from your back porch with a view overlooking the gorgeous coral canyon. Once in a lifetime opportunity!', 'kolkata.jpg')
;
insert into homes
values('Mumbai', '5','3', '16000000', '3000', 'abc', 'Fantastic Home with a Fantastic View!', 'You will never get tired of watching the sunset from your living room sofa or the sunrise from your back porch with a view overlooking the gorgeous coral canyon. Once in a lifetime opportunity!', 'mumbai.jpg')
;
insert into homes
values('Pune', '5','3', '16000000', '3000', 'abc', 'Fantastic Home with a Fantastic View!', 'You will never get tired of watching the sunset from your living room sofa or the sunrise from your back porch with a view overlooking the gorgeous coral canyon. Once in a lifetime opportunity!', 'pune.jpg')
;


";

return $estate_all_sql;
}


?>

</div>
</body>
</html>