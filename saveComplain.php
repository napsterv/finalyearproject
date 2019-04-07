<?php
session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$crime_name_id=$_POST["crime_name_id"];
	$location_name_id=$_POST["location_name_id"];
	$sub_location_name_id=$_POST["sub_location_name_id"];
	$complain_description=$_POST["complain_description"];
	$qryuser="select id,name,mobile,email from crp_user_login where id='".$_SESSION["userid"]."' ";
	$runuser=mysqli_query($con,$qryuser);
	$rowuser=mysqli_fetch_array($runuser);
	$qry="insert into crp_complain (user_name,user_id,mobile,email,crime_name_id,location_name_id,sublocation_name_id,complain_description,status) VALUES ('".$rowuser["name"]."','".$rowuser["id"]."','".$rowuser["mobile"]."','".$rowuser["email"]."','".$crime_name_id."','".$location_name_id."','".$sub_location_name_id."','".$complain_description."','Pending')";
	if($run=mysqli_query($con,$qry)){
		echo "success";
	}
	else {
		echo "error";
	}
	
?>