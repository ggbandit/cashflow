<?php
$servername = "localhost";
$username = "synerry_cash";
$password = "itoL2oAZ7";
$dbname = "synerry_cash";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
  $number = count($_POST["list"]);
  $list = array_filter($_POST["list"]);
  $balance = array_filter($_POST["balance"]);
  $inputDate = strtotime($_POST["datepicker"]);
  
  if(!empty($list) && !empty($balance) && !empty($inputDate)) {
      for($i=0; $i<$number; $i++)
      {
        if (!empty($list[$i]) && !empty($balance[$i])) {
            $sql =  $conn->query("INSERT INTO moneyout (list, inputDate, balance)
          VALUES ('$list[$i]','$inputDate','$balance[$i]')");    
        }      
      }
        exit('Insert success!'); 
      }
   else if (empty($inputDate)) {
      echo "โปรดเลือกวันที่";
  }

$conn->close();
?>
