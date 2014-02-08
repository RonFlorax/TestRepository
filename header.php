<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	$con = mysql_connect("localhost","root","root");
	
	if(!$con) {
		die('could not connect: '.mysql_error());
	}
	else {
		mysql_select_db('finanser');
		mysql_query("SET NAMES'utf8'");
	}
?>
<link href="../inc/styles.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div align="left" class="menuWrapperAdmin">
<img src="logo.png" width="200px" height="200px" />
<a href='index.php'>Totaler</a><br /><br />
- <a href='index.php?el'>El</a><br />
- <a href='index.php?vatten'>Vatten</a><br />
- <a href='index.php?lan'>Lån</a><br />
- <a href='index.php?kommunikation'>Kommunikation</a><br />
- <a href='index.php?forsakring'>Försäkring</a><br />
- <a href='index.php?ombyggning'>Ombyggning</a><br />
- <a href='index.php?underhall'>Underhåll</a><br /><br />
- <a href='index.php?arsjamforelser'>Årsjämförelser</a><br /><br />
- <a href='index.php?lagtill'>Läg till</a><br />
</div>

<div class="adminContent" align="center">
<test>