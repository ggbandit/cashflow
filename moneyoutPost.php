<?php
include("inc/config.php");
 // echo "รายรับ"; exit;
// print_r($_POST); exit;
  $balance = ($_POST["balance"]);
  $inputDate = strtotime($_POST["datepicker"]);
  $countInsert = array();
  if(count($_POST["list"])  && !empty($inputDate)) {
    if(count($_POST["list"])) {
      foreach ($_POST["list"] as $i => $value) {
          if (!empty($_POST["list"][$i]) && !empty($balance[$i])) {
            $sql = "INSERT INTO moneyout (list, inputDate, balance)
              VALUES ('$value','$inputDate','$balance[$i]')";
            $insertID =  $conn->query($sql);
            $countInsert[] = $insertID;
          }           
      } 
      if(count($countInsert)) {
        echo "Insert success!";
      } else {
        echo "error insert";
      }
    }
  }else if (empty($inputDate)) {
      echo "โปรดเลือกวันที่";
  }


$conn->close();
?>