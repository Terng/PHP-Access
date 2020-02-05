<?php
try{
	require_once('connect.php');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
	$error = $e->getMessage();
}
 //$id = $_GET['id'];
 $DelSql = "DELETE FROM `tblEmployees` WHERE pkeyEmployeeID=?";
 $result = $conn->prepare($DelSql);
 $res = $result->execute(array($_GET['pkeyEmployeeID']));
 if($res){
 	header('location: view.php');
 }else{
 	echo "Failed to Delete Record";
 }
?>