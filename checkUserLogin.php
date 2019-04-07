<?php
session_start(); 
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$username=$_POST["username"];
	$password=$_POST["password"];
	$qry="select count(id) as cnt,id,status  from crp_user_login where (mobile='".$username."' or email='".$username."') and password='".$password."'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
	if($row["status"]=="Off"){
		echo "statuserror";
	}
	else if($row["cnt"]==1){
		$_SESSION["userid"]=$row["id"];
		echo "success";
	}
	else {
		echo "error";
	}
?>