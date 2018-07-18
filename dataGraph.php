<?php
//setting header to json 
header('Content-Type: application/json');

//setting database
$servername = "localhost";
$username = "synerry_cash";
$password = "itoL2oAZ7";
$dbname = "synerry_cash";


//get connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Checkconnection
if($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}


//query to get data from the table
//total Jan
$sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1514739600 AND 1517417999";
$result = $conn-> query($sqlJan);
$val = $result -> fetch_array();
$Jan_total = $val['sum'];
//total Feb
$sqlFeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1517418000 AND 1519837199";
$result = $conn-> query($sqlFeb);
$val = $result -> fetch_array();
$Feb_total = $val['sum'];
//total Mar
$sqlMar = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1519837200 AND 1522515599";
$result = $conn-> query($sqlMar);
$val = $result -> fetch_array();
$Mar_total = $val['sum'];
//total Apr
$sqlApr = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1522515600 AND 1525107599";
$result = $conn-> query($sqlApr);
$val = $result -> fetch_array();
$Apr_total = $val['sum'];
//total May
$sqlMay = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1525107600 AND 1527785999";
$result = $conn-> query($sqlMay);
$val = $result -> fetch_array();
$May_total = $val['sum'];
//total Jun
$sqlJun = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1527786000 AND 1530377999";
$result = $conn-> query($sqlJun);
$val = $result -> fetch_array();
$Jun_total = $val['sum'];
//total Jul
$sqlJul = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1530378000 AND 1533056399";
$result = $conn-> query($sqlJul);
$val = $result -> fetch_array();
$Jul_total = $val['sum'];
//total Aug
$sqlAug = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1533056400 AND 1535734799";
$result = $conn-> query($sqlAug);
$val = $result -> fetch_array();
$Aug_total = $val['sum'];
//total Sep
$sqlSeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1535734800 AND 1538326799";
$result = $conn-> query($sqlSeb);
$val = $result -> fetch_array();
$Seb_total = $val['sum'];
//total Oct
$sqlOct = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1538326800 AND 1541005199";
$result = $conn-> query($sqlOct);
$val = $result -> fetch_array();
$Oct_total = $val['sum'];
//total Nov
$sqlNov = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1541005200 AND 1543597199";
$result = $conn-> query($sqlNov);
$val = $result -> fetch_array();
$Nov_total = $val['sum'];
//total Dec
$sqlDec = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1543597200 AND 1546275599";
$result = $conn-> query($sqlDec);
$val = $result -> fetch_array();
$Dec_total = $val['sum'];

$incomeThisYear = $Jan_total+$Feb_total+$Mar_total+$Apr_total+$May_total+$Jun_total+$Jul_total+$Aug_total+$Seb_total+$Oct_total+$Nov_total+$Dec_total;
//loop through the returned data
$data = array($Jan_total,$Feb_total,$Mar_total,$Apr_total,$May_total,$Jun_total,$Jul_total,$Aug_total,$Seb_total,$Oct_total,$Nov_total,$Dec_total);


//free memory associated with result
$result->close();

//total Jan out
$sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1514739600 AND 1517417999";
$result = $conn-> query($sqlJan);
$val = $result -> fetch_array();
$Jan_total_out = $val['sum'];
//total Feb out
$sqlFeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1517418000 AND 1519837199";
$result = $conn-> query($sqlFeb);
$val = $result -> fetch_array();
$Feb_total_out = $val['sum'];
//total Mar out
$sqlMar = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1519837200 AND 1522515599";
$result = $conn-> query($sqlMar);
$val = $result -> fetch_array();
$Mar_total_out = $val['sum'];
//total Apr out
$sqlApr = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1522515600 AND 1525107599";
$result = $conn-> query($sqlApr);
$val = $result -> fetch_array();
$Apr_total_out = $val['sum'];
//total May out
$sqlMay = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1525107600 AND 1527785999";
$result = $conn-> query($sqlMay);
$val = $result -> fetch_array();
$May_total_out = $val['sum'];
//total Jun out
$sqlJun = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1527786000 AND 1530377999";
$result = $conn-> query($sqlJun);
$val = $result -> fetch_array();
$Jun_total_out = $val['sum'];
//total Jul out
$sqlJul = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1530378000 AND 1533056399";
$result = $conn-> query($sqlJul);
$val = $result -> fetch_array();
$Jul_total_out = $val['sum'];
//total Aug out
$sqlAug = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1533056400 AND 1535734799";
$result = $conn-> query($sqlAug);
$val = $result -> fetch_array();
$Aug_total_out = $val['sum'];
//total Sep out
$sqlSeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1535734800 AND 1538326799";
$result = $conn-> query($sqlSeb);
$val = $result -> fetch_array();
$Seb_total_out = $val['sum'];
//total Oct out
$sqlOct = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1538326800 AND 1541005199";
$result = $conn-> query($sqlOct);
$val = $result -> fetch_array();
$Oct_total_out = $val['sum'];
//total Nov out
$sqlNov = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1541005200 AND 1543597199";
$result = $conn-> query($sqlNov);
$val = $result -> fetch_array();
$Nov_total_out = $val['sum'];
//total Dec out
$sqlDec = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1543597200 AND 1546275599";
$result = $conn-> query($sqlDec);
$val = $result -> fetch_array();
$Dec_total_out = $val['sum'];

$moneyOutThisYear = $Jan_total_out+$Feb_total_out+$Mar_total_out+$Apr_total_out+$May_total_out+$Jun_total_out+$Jul_total_out+$Aug_total_out+$Seb_total_out+$Oct_total_out+$Nov_total_out+$Dec_total_out;
//loop through the returned data
$dataOut = array($Jan_total_out,$Feb_total_out,$Mar_total_out,$Apr_total_out,$May_total_out,$Jun_total_out,$Jul_total_out,$Aug_total_out,$Seb_total_out,$Oct_total_out,$Nov_total_out,$Dec_total_out);


$today=strtotime("today");
$sql = "SELECT SUM(balance) as sum FROM income WHERE inputDate = $today";
$result = $conn-> query($sql);
$val = $result -> fetch_array();
$incomeToday = $val['sum'];

$today=strtotime("today");
$sql = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate = $today";
$result = $conn-> query($sql);
$val = $result -> fetch_array();
$moneyOutToday = $val['sum'];

$m=strtotime("today");
$M = date("M", $m);
if ($M =="Jan") {
	$sqlJan = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1514739600 AND 1517417999";
	$result = $conn-> query($sqlJan);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];
}
else if ($M =="Feb") {
//total Feb
	$sqlFeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1517418000 AND 1519837199";
	$result = $conn-> query($sqlFeb);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];
}
else if ($M =="Mar") {
//total Mar
	$sqlMar = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1519837200 AND 1522515599";
	$result = $conn-> query($sqlMar);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="Apr") {
//total Apr
	$sqlApr = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1522515600 AND 1525107599";
	$result = $conn-> query($sqlApr);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="May") {
//total May
	$sqlMay = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1525107600 AND 1527785999";
	$result = $conn-> query($sqlMay);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="Jun") {
//total Jun
	$sqlJun = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1527786000 AND 1530377999";
	$result = $conn-> query($sqlJun);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="Jul") {
//total Jul
	$sqlJul = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1530378000 AND 1533056399";
	$result = $conn-> query($sqlJul);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="Aug") {
//total Aug
	$sqlAug = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1533056400 AND 1535734799";
	$result = $conn-> query($sqlAug);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="Seb") {
//total Sep
	$sqlSeb = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1535734800 AND 1538326799";
	$result = $conn-> query($sqlSeb);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="Oct") {
//total Oct
	$sqlOct = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1538326800 AND 1541005199";
	$result = $conn-> query($sqlOct);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="Nov") {
//total Nov
	$sqlNov = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1541005200 AND 1543597199";
	$result = $conn-> query($sqlNov);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];	
}
else if ($M =="Dec") {
//total Dec
	$sqlDec = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN 1543597200 AND 1546275599";
	$result = $conn-> query($sqlDec);
	$val = $result -> fetch_array();
	$incomeThisMonth = $val['sum'];
}

$m=strtotime("today");
$M = date("M", $m);
if ($M =="Jan") {
	$sqlJan = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1514739600 AND 1517417999";
	$result = $conn-> query($sqlJan);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];
}
else if ($M =="Feb") {
//total Feb
	$sqlFeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1517418000 AND 1519837199";
	$result = $conn-> query($sqlFeb);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];
}
else if ($M =="Mar") {
//total Mar
	$sqlMar = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1519837200 AND 1522515599";
	$result = $conn-> query($sqlMar);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="Apr") {
//total Apr
	$sqlApr = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1522515600 AND 1525107599";
	$result = $conn-> query($sqlApr);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="May") {
//total May
	$sqlMay = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1525107600 AND 1527785999";
	$result = $conn-> query($sqlMay);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="Jun") {
//total Jun
	$sqlJun = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1527786000 AND 1530377999";
	$result = $conn-> query($sqlJun);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="Jul") {
//total Jul
	$sqlJul = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1530378000 AND 1533056399";
	$result = $conn-> query($sqlJul);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="Aug") {
//total Aug
	$sqlAug = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1533056400 AND 1535734799";
	$result = $conn-> query($sqlAug);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="Seb") {
//total Sep
	$sqlSeb = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1535734800 AND 1538326799";
	$result = $conn-> query($sqlSeb);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="Oct") {
//total Oct
	$sqlOct = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1538326800 AND 1541005199";
	$result = $conn-> query($sqlOct);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="Nov") {
//total Nov
	$sqlNov = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1541005200 AND 1543597199";
	$result = $conn-> query($sqlNov);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];	
}
else if ($M =="Dec") {
//total Dec
	$sqlDec = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN 1543597200 AND 1546275599";
	$result = $conn-> query($sqlDec);
	$val = $result -> fetch_array();
	$moneyOutThisMonth = $val['sum'];
}

	$startWeek1 = strtotime(date('1-m-Y 00:00:00',strtotime('today')));
	$endWeek1 = strtotime(date('7-m-Y 23:59:59',strtotime('today')));
	$startWeek2 = strtotime(date('8-m-Y 00:00:00',strtotime('today')));
	$endWeek2 = strtotime(date('14-m-Y 23:59:59',strtotime('today')));
	$startWeek3 = strtotime(date('15-m-Y 00:00:00',strtotime('today')));
	$endWeek3 = strtotime(date('21-m-Y 23:59:59',strtotime('today')));
	$startWeek4 = strtotime(date('22-m-Y 00:00:00',strtotime('today')));
	$endWeek4 = strtotime(date('t-m-Y 23:59:59',strtotime('today')));

	$sql = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN $startWeek1 AND $endWeek1";
	$result = $conn-> query($sql);
	$val = $result -> fetch_array();
	$incomeWeek1 = $val['sum'];

	$sql = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN $startWeek2 AND $endWeek2";
	$result = $conn-> query($sql);
	$val = $result -> fetch_array();
	$incomeWeek2 = $val['sum'];

	$sql = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN $startWeek3 AND $endWeek3";
	$result = $conn-> query($sql);
	$val = $result -> fetch_array();
	$incomeWeek3 = $val['sum'];

	$sql = "SELECT SUM(balance) as sum FROM income WHERE inputDate BETWEEN $startWeek4 AND $endWeek4";
	$result = $conn-> query($sql);
	$val = $result -> fetch_array();
	$incomeWeek4 = $val['sum'];

	$sql = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN $startWeek1 AND $endWeek1";
	$result = $conn-> query($sql);
	$val = $result -> fetch_array();
	$moneyOutWeek1 = $val['sum'];

	$sql = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN $startWeek2 AND $endWeek2";
	$result = $conn-> query($sql);
	$val = $result -> fetch_array();
	$moneyOutWeek2 = $val['sum'];

	$sql = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN $startWeek3 AND $endWeek3";
	$result = $conn-> query($sql);
	$val = $result -> fetch_array();
	$moneyOutWeek3 = $val['sum'];

	$sql = "SELECT SUM(balance) as sum FROM moneyout WHERE inputDate BETWEEN $startWeek4 AND $endWeek4";
	$result = $conn-> query($sql);
	$val = $result -> fetch_array();
	$moneyOutWeek4 = $val['sum'];

$incomeTotalWeek = array($incomeWeek1,$incomeWeek2,$incomeWeek3,$incomeWeek4);
$moneyOutTotalWeek = array($moneyOutWeek1,$moneyOutWeek2,$moneyOutWeek3,$moneyOutWeek4);

//free memory associated with result
$result->close();

//close connection

$conn->close();
$arr = array($data,$dataOut,$incomeToday,$moneyOutToday,$incomeThisMonth,$moneyOutThisMonth,$incomeThisYear,$moneyOutThisYear,$incomeTotalWeek,$moneyOutTotalWeek);

//now print the data
print json_encode($arr);

?>
