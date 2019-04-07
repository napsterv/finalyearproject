<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$qry="select * from crp_complain where id='".$_POST["id"]."'";
	$run=mysqli_query($con,$qry);
	$row=mysqli_fetch_array($run);
	$qrycrime="select crime_name from crp_crime where id='".$row["crime_name_id"]."'";
	$runcrime=mysqli_query($con,$qrycrime);
	$rowcrime=mysqli_fetch_array($runcrime);
	$row["crime_name_id"]=$rowcrime["crime_name"];
	$qrylocation="select location_name from crp_location where id='".$row["location_name_id"]."'";
	$runlocation=mysqli_query($con,$qrylocation);
	$rowlocation=mysqli_fetch_array($runlocation);
	$row["location_name_id"]=$rowlocation["location_name"];
	$qrysublocation="select sub_location_name from crp_sub_location where id='".$row["sublocation_name_id"]."'";
	$runsublocation=mysqli_query($con,$qrysublocation);
	$rowsublocation=mysqli_fetch_array($runsublocation);
	$row["sublocation_name_id"]=$rowsublocation["sub_location_name"];
	$ro = json_encode($row);
	echo $ro;
?>