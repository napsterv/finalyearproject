<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$location_name_id=$_POST["location_name_id"];
	$sub_location_name=$_POST["sub_location_name"];
	$qrycount="select count(id) as cnt from crp_sub_location where location_name_id='".$location_name_id."' and sub_location_name='".$sub_location_name."'";
	$runcount=mysqli_query($con,$qrycount);
	$rowcount=mysqli_fetch_array($runcount);
	if($rowcount["cnt"]>0){
		echo "exist";
	}
	else{
		$qry="insert into crp_sub_location (location_name_id,sub_location_name) VALUES ('".$location_name_id."','".$sub_location_name."')";
		if($run=mysqli_query($con,$qry)){
			echo "success";
		}
		else {
			echo "error";
		}
	}
?>