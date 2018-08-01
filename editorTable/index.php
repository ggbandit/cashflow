<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inline Editor</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="jquery.tabledit.js"></script>
  <script type="text/javascript" src="custom_table_edit.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
  <table id="data_table" class="table table-striped">
<thead>
<tr>
<th>Id</th>
<th>list</th>
<th>Jan</th>
<th>Feb</th>
</tr>
</thead>
<tbody>
<?php
include('connect.php');
$sql_query = "SELECT * FROM income";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
while( $income = mysqli_fetch_assoc($resultset) ) {
?>
<tr>
<td><?php echo $income ['id']; ?></td>
<td><?php echo $income ['list']; ?></td>
<td><?php 
		if ($income["inputDate"] >= 1514739600 && $income["inputDate"] <= 1517417999)
          echo $income["balance"]; 
	?>
</td>
<td><?php 
		if ($income["inputDate"] >= 1517418000 && $income["inputDate"] <= 1519837199)
          echo $income["balance"]; 
	?>
</td>

</tr>
<?php } ?>
</tbody>
</table>
</body>
</html>