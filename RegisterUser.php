<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$name=$_POST["name"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$password=$_POST["password"];
	$qrycount="select count(id) as cnt from crp_user_login where mobile='".$mobile."' or email='".$email."'";
	$runcount=mysqli_query($con,$qrycount);
	$rowcount=mysqli_fetch_array($runcount);
	if($rowcount["cnt"]>0){
		echo "exist";
	}
	else{
		$status='Off';
		$qry="insert into crp_user_login (name,email,mobile,password,status) VALUES ('".$name."','".$email."','".$mobile."','".$password."','".$status."')";
		// echo $qry;
		if($run=mysqli_query($con,$qry)){
			echo "success";
		}
		else {
			echo "error";
		}
	}
?>