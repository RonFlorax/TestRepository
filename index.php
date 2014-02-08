<?php include("header.php"); ?>
//MAKE ITEMS INCIDENTAL, ie Köp av marken is a once+off. This will help highlight them in difference table.	
<div class="text" align="left">

Ron & Melinda's Finanser.<br /><br />

<?
if(isset($_GET['el'])) {

echo "<a href='index.php?el'>All</a> - ";

$query=mysql_query("SELECT DISTINCT(YEAR(date)) AS year FROM data ORDER BY date ASC");
while($row=mysql_fetch_array($query)) {
	echo "<a href='index.php?el&year=".$row['year']."'>".$row['year']."</a> - ";
}
?>
<br /><br />
<table width="650" cellpadding="0" cellspacing="0" border="0" align="left">
<tr class='tableHeader'>
	<td>Date</td>
	<td>Company</td>
	<td>Product</td>
	<td>Amount</td>
	<td>KWH</td>
</tr>
<?
$query=mysql_query("SELECT * FROM data WHERE category='El' ORDER BY date DESC");
while($row=mysql_fetch_array($query)) {
	?><tr class="<?=($c++%2==1) ? 'odd' : 'even' ?>"><?
	echo "<td>".$row['date']."</td>
	<td>".$row['company']."</td>
	<td>".$row['product']."</td>
	<td>".$row['amount']."</td>
	<td>".$row['el_kwh']."</td>
	</tr>";
}

if(isset($_GET['year'])) { $year = $_GET['year']; }
else { $year = date('Y'); }
$number = 1;

echo "
	<tr><td colspan='5'><br /><br />
	<script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'KWH'],";
          $query=mysql_query("SELECT el_kwh, MONTH(date) AS month FROM data WHERE category='El' AND YEAR(date)=$year ORDER BY date ASC");
			while($row=mysql_fetch_array($query)) {
				echo "['".date('M', mktime(0,0,0,$row['month']))."', ".$row['el_kwh']."],";
				$number++;
			}
		echo "]);
        
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 650, height: 400, legend: 'none', pointSize: 5, vAxis: {format: '#'}, hAxis: {slantedText: true, slantedTextAngle: 60}, chartArea: {top:5, width:520}});
      }
    </script>
    <div id='chart_div'></div>
    ";
?>
</td></tr>
</table><br /><br />
<?
}

elseif(isset($_GET['vatten'])) {
?>
<table width="500" cellpadding="0" cellspacing="0" border="0" align="left">
<tr class='tableHeader'>
	<td>Date</td>
	<td>Company</td>
	<td>Product</td>
	<td>Amount</td>
	<td>KBM</td>
</tr>
<?
$query=mysql_query("SELECT * FROM data WHERE category='Vatten' ORDER BY date DESC");
while($row=mysql_fetch_array($query)) {
	?><tr class="<?=($c++%2==1) ? 'odd' : 'even' ?>"><?
	echo "<td>".$row['date']."</td>
	<td>".$row['company']."</td>
	<td>".$row['product']."</td>
	<td>".$row['amount']."</td>
	<td>".$row['va_kbm']."</td>
	</tr>";
}
?>
</table><br />
<?
}

elseif(isset($_GET['lan'])) {
?>
<table width="500" cellpadding="0" cellspacing="0" border="0" align="left">
<tr class='tableHeader'>
	<td>Date</td>
	<td>Company</td>
	<td>Product</td>
	<td>Amount</td>
</tr>
<?
$query=mysql_query("SELECT * FROM data WHERE category='Lån' ORDER BY date DESC");
while($row=mysql_fetch_array($query)) {
	?><tr class="<?=($c++%2==1) ? 'odd' : 'even' ?>"><?
	echo "<td>".$row['date']."</td>
	<td>".$row['company']."</td>
	<td>".$row['product']."</td>
	<td>".$row['amount']."</td>
	</tr>";
}
?>
</table><br />
<?
}

elseif(isset($_GET['kommunikation'])) {
?>
<table width="500" cellpadding="0" cellspacing="0" border="0" align="left">
<tr class='tableHeader'>
	<td>Date</td>
	<td>Company</td>
	<td>Product</td>
	<td>Amount</td>
</tr>
<?
$query=mysql_query("SELECT * FROM data WHERE category='Kommunikation' ORDER BY date DESC");
while($row=mysql_fetch_array($query)) {
	?><tr class="<?=($c++%2==1) ? 'odd' : 'even' ?>"><?
	echo "<td>".$row['date']."</td>
	<td>".$row['company']."</td>
	<td>".$row['product']."</td>
	<td>".$row['amount']."</td>
	</tr>";
}
?>
</table><br />
<?
}

elseif(isset($_GET['forsakring'])) {
?>
<table width="500" cellpadding="0" cellspacing="0" border="0" align="left">
<tr class='tableHeader'>
	<td>Date</td>
	<td>Company</td>
	<td>Product</td>
	<td>Amount</td>
</tr>
<?
$query=mysql_query("SELECT * FROM data WHERE category='Försäkring' ORDER BY date DESC");
while($row=mysql_fetch_array($query)) {
	?><tr class="<?=($c++%2==1) ? 'odd' : 'even' ?>"><?
	echo "<td>".$row['date']."</td>
	<td>".$row['company']."</td>
	<td>".$row['product']."</td>
	<td>".$row['amount']."</td>
	</tr>";
}
?>
</table><br />
<?
}

elseif(isset($_GET['ombyggning'])) {
?>
<table width="500" cellpadding="0" cellspacing="0" border="0" align="left">
<tr class='tableHeader'>
	<td>Date</td>
	<td>Company</td>
	<td>Product</td>
	<td>Amount</td>
</tr>
<?
$query=mysql_query("SELECT * FROM data WHERE category='Ombyggning' ORDER BY date DESC");
while($row=mysql_fetch_array($query)) {
	?><tr class="<?=($c++%2==1) ? 'odd' : 'even' ?>"><?
	echo "<td>".$row['date']."</td>
	<td>".$row['company']."</td>
	<td>".$row['product']."</td>
	<td>".$row['amount']."</td>
	</tr>";
}
?>
</table><br />
<?
}

elseif(isset($_GET['underhall'])) {
?>
<table width="500" cellpadding="0" cellspacing="0" border="0" align="left">
<tr class='tableHeader'>
	<td>Date</td>
	<td>Company</td>
	<td>Product</td>
	<td>Amount</td>
</tr>
<?
$query=mysql_query("SELECT * FROM data WHERE category='Underhåll' ORDER BY date DESC");
while($row=mysql_fetch_array($query)) {
	?><tr class="<?=($c++%2==1) ? 'odd' : 'even' ?>"><?
	echo "<td>".$row['date']."</td>
	<td>".$row['company']."</td>
	<td>".$row['product']."</td>
	<td>".$row['amount']."</td>
	</tr>";
}
?>
</table><br />
<?
}

elseif(isset($_GET['arsjamforelser'])) {
?>
<br /><br />
<table width="650" cellpadding="0" cellspacing="0" border="0" align="left">
<?
echo "
	<tr><td><br /><br />
	<script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
      google.load('visualization', '1', {packages:['corechart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', '2011', '2012', '2013'],";
				$month = 1;
				
				while($month<13) {
					echo "['".date('M', mktime(0,0,0,$month))."', ";
				
					$query1 = mysql_query("SELECT SUM(amount) FROM data WHERE MONTH(date)=$month AND YEAR(date)=2011");
					$row1 = mysql_fetch_assoc($query1);
						if($row1['SUM(amount)']==NULL) { echo "0, "; }
						else { echo $row1['SUM(amount)'].", "; }
					
					$query1 = mysql_query("SELECT SUM(amount) FROM data WHERE MONTH(date)=$month AND YEAR(date)=2012");
					$row1 = mysql_fetch_assoc($query1);
						if($row1['SUM(amount)']==NULL) { echo "0, "; }
						else { echo $row1['SUM(amount)'].", "; }
					
					$query1 = mysql_query("SELECT SUM(amount) FROM data WHERE MONTH(date)=$month AND YEAR(date)=2013");
					$row1 = mysql_fetch_assoc($query1);
						if($row1['SUM(amount)']==NULL) { echo "0, "; }
						else { echo $row1['SUM(amount)'].", "; }
					
					$month++;
					
					echo "],";
				}
		echo "]);
        
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 650, height: 400, legend: 'none', pointSize: 5, vAxis: {format: '#'}, hAxis: {slantedText: true, slantedTextAngle: 60}, chartArea: {top:5, width:520}});
      }
    </script>
    <div id='chart_div'></div>
    ";
?>
</td></tr>
</table><br /><br />
<?
}

elseif(isset($_GET['lagtill'])){
?>
<form action="index.php?P" method="POST">
<table width="400" cellpadding="0" cellspacing="0" border="0" align="left">
<tr class='tableHeader'>
	<td width="100"></td>
	<td></td>
</tr>
<tr>
	<td><b>Date:</b></td>
	<td><input type="text" class='box' name="date" /></td>
</tr>
<tr>
	<td><b>Category:</b></td>
	<td><select name='category'>
		<option value="El">El</option>
		<option value="Vatten">Vatten</option>
		<option value="Lån">Lån</option>
		<option value="Kommunikation">Kommunikation</option>
		<option value="Försäkring">Försäkring</option>
		<option value="Ombyggning">Ombyggning</option>
		<option value="Underhåll">Underhåll</option>
	</select></td>
</tr>
<tr>
	<td><b>Company:</b></td>
	<td><input type="text" class='box' name="company" /></td>
</tr>
<tr>
	<td><b>Product:</b></td>
	<td><input type="text" class='box' name="product" /></td>
</tr>
<tr>
	<td><b>Cost:</b></td>
	<td><input type="text" class='box' name="amount" /></td>
</tr>
<tr>
	<td><b>EL: KWH:</b></td>
	<td><input type="text" class='box' name="el_kwh" /></td>
</tr>
<tr>
	<td><b>VATTEN: KBM:</b></td>
	<td><input type="text" class='box' name="va_kbm" /></td>
</tr>
<tr>
	<td></td>
	<td align="right"><input type="submit" class="Button"></td>
</tr>
</table><br />
</form>
<?
}

elseif(isset($_GET['P'])) {
	$date = $_POST['date'];
	$category = $_POST['category'];
	$company = $_POST['company'];
	$product = $_POST['product'];
	$amount = $_POST['amount'];
	$el_kwh = $_POST['el_kwh'];
	$va_kbm = $_POST['va_kbm'];
	
	$query="INSERT INTO data(date,category,company,product,amount,el_kwh,va_kbm) VALUES('$date','$category','$company','$product','$amount','$el_kwh','$va_kbm')";
	if (!mysql_query($query, $con)) { die('Error: ' . mysql_error()); }
	else { echo "done"; }
}

else { ?>
<table width="600" cellpadding="0" cellspacing="0" border="0" align="left">
<?
$divnum = 1;

$query9=mysql_query("SELECT DISTINCT(YEAR(date)) AS years FROM data ORDER BY years DESC");
while($row9=mysql_fetch_array($query9)) {
	$year = $row9['years'];
	
?>
			<tr valign="top" class="<?=($c++%2==1) ? 'odd' : 'even' ?>">
					<?
					echo "<td width='200'>
<b>Årets Överskit - ".$year."</b><br />";

$query1=mysql_query("SELECT category, SUM(amount) as amount FROM data WHERE YEAR(date)=$year GROUP BY category ORDER BY amount DESC, category ASC");
while($row1=mysql_fetch_assoc($query1)) {
	echo $row1['category'].": ".number_format($row1['amount'], 0, ',', '.')."<br />";
}
	
$query=mysql_query("SELECT SUM(amount) FROM data WHERE YEAR(date)=$year");
$row=mysql_fetch_array($query);

$query1=mysql_query("SELECT COUNT(DISTINCT(MONTH(date))) AS months, (SUM(amount) / COUNT(DISTINCT(MONTH(date)))) AS average FROM data WHERE YEAR(date)=$year");
$row1=mysql_fetch_array($query1);
	echo "<b>Total: </b>".number_format($row['SUM(amount)'], 0, ',', '.')." SEK<br />
<b>Average: </b>".number_format($row1['average'], 0, ',', '.')." SEK
</td>
<td>";

$query=mysql_query("SELECT COUNT(DISTINCT category) AS categories FROM data WHERE YEAR(date)=$year");
$row=mysql_fetch_assoc($query);
	$numberCategories = $row['categories'];
			
$number = 0;
		
echo "<script type='text/javascript' src='http://www.google.com/jsapi'></script>
<script type='text/javascript'>
google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type='text/javascript'>	
function drawVisualization() {
var data = new google.visualization.DataTable();
data.addColumn('string', 'Category');
data.addColumn('number', 'Amount');
data.addRows(".$numberCategories.");";

$query1=mysql_query("SELECT category, SUM(amount) as amount FROM data WHERE YEAR(date)=$year GROUP BY category ORDER BY amount DESC, category ASC");
while($row1=mysql_fetch_assoc($query1)) {
	$category = $row1['category'];
	$amount = $row1['amount'];
				
echo "data.setValue(".$number.", 0, '".$category.": ".$amount."');
	data.setValue(".$number.", 1, ".$amount.");";
  				 
$number++;
}
  	
echo "new google.visualization.PieChart(document.getElementById('".$divnum."')).
draw(data, {chartArea:{left:0,top:0,width:'100%',height:'100%'},is3D:true,legend:'right'});
}
google.setOnLoadCallback(drawVisualization);
</script>

<div id='".$divnum."' style='width: 400px; height: 280px;'></div>
</td></tr>";

$divnum++;
}
echo "</table>";
}
?>
</div>

</body>
</html>