<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$qry="select crime_name from crp_crime where id='".$_POST["id"]."'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
	$ro = json_encode($row);
	echo $ro;
?>