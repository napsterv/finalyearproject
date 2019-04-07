<?php 
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$qry="delete from crp_sub_location where id='".$_POST["id"]."'";
	if($run=mysqli_query($con,$qry)){
		echo "success";
	}
	else{
		echo "error";
	}
?>