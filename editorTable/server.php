<?php
include_once("connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
	$update_field='';
	if(isset($input['รายรับ'])) {
		$update_field.= "list='".$input['รายรับ']."'";
	} else if(isset($input['balance'])) {
		$update_field.= "balance='".$input['balance']."'";
	}
	if($update_field && $input['id']) {
		$sql_query = "UPDATE income SET $update_field WHERE id='" . $input['id'] . "'";
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
	}
	if(isset($input['รายจ่าย'])) {
		$update_field.= "list='".$input['รายจ่าย']."'";
	} else if(isset($input['balance'])) {
		$update_field.= "balance='".$input['balance']."'";
	}
	if($update_field && $input['id']) {
		$sql_query = "UPDATE moneyout SET $update_field WHERE id='" . $input['id'] . "'";
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
	}
}
?>