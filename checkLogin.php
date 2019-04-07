<?php
session_start(); 
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$username=$_POST["username"];
	$password=$_POST["password"];
	$qry="select count(id) as cnt,id  from crp_admin_login where username='".$username."' and password='".$password."'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
	if($row["cnt"]==1){
		$_SESSION["adminid"]=$row["id"];
		echo "success";
	}
	else {
		echo "error";
	}
?>