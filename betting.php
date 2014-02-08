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

<div class="text" align="center">

<table width="700" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr class="tableHeader">
		<td>Date</td>
		<td>Shop</td>
		<td>Sport</td>
		<td>Event</td>
		<td>Stake</td>
		<td>Return</td>
		<td>Takings</td>
	</tr>
<?
$query=mysql_query("SELECT * FROM betting WHERE sport!='Deposit' AND sport!='Withdrawal' ORDER BY date ASC");
while($row=mysql_fetch_array($query)) {	
?>
<tr valign="top" class="<?=($c++%2==1) ? 'odd' : 'even' ?>">
<?
echo "<td>".$row['date']."</td>
<td>".$row['shop']."</td>
<td>".$row['sport']."</td>
<td>".$row['event']."</td>
<td>".$row['stake']."</td>
<td>".$row['return']."</td>
<td>".$row['takings']."</td>
</tr>";
}

$query=mysql_query("SELECT SUM(takings) FROM betting WHERE sport='Deposit'");
$row=mysql_fetch_array($query);
	$deposit = $row['SUM(takings)'];
	
$query=mysql_query("SELECT SUM(takings) FROM betting WHERE sport='Withdrawal'");
$row=mysql_fetch_array($query);
	$withdrawal = $row['SUM(takings)'];
	
$query=mysql_query("SELECT SUM(takings) FROM betting WHERE sport!='Deposit' AND sport!='Withdrawal'");
$row=mysql_fetch_array($query);
	$takings = $row['SUM(takings)'];

echo "<tr class='tableHeader'>
	<td><b>Deposited:</b></td>
	<td>".$deposit."</td>
	<td><b>Withdrawn:</b></td>
	<td>".$withdrawal."</td>
	<td><b>Takings:</b></td>
	<td>".$takings."</td>
	<td><b>Balance:</b></td>
	<td>".($takings-$deposit)."</td>
</tr>";
?>
</table>
</div>

</body>
</html>