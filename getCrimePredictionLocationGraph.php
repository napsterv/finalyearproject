<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$location=$_POST["location"];
	
	if($_POST["type"]=="plocation"){
		$qrylocation="SELECT COUNT(crime_name_id) as cnt,crime_name_id FROM crp_complain where location_name_id='".$location."' GROUP BY crime_name_id";
		$runlocation=mysqli_query($con,$qrylocation);
		$data = array();
		while($rowlocation=mysqli_fetch_array($runlocation)){
		$count=$rowlocation["cnt"];
		$qry="select id,crime_name from crp_crime where id='".$rowlocation["crime_name_id"]."'";
		$run=mysqli_query($con,$qry);
		$row=mysqli_fetch_array($run);
		$crimenameid=$row["crime_name"];
		array_push($data,array('count'=>$count,'crimename'=>$crimenameid));
		}
		echo json_encode($data);
	}
	else{
		$qrylocation="SELECT COUNT(crime_name_id) as cnt,crime_name_id FROM crp_complain GROUP BY crime_name_id";
		$runlocation=mysqli_query($con,$qrylocation);
		$data = array();
		while($rowlocation=mysqli_fetch_array($runlocation)){
		$count=$rowlocation["cnt"];
		$qry="select id,crime_name from crp_crime where id='".$rowlocation["crime_name_id"]."'";
		$run=mysqli_query($con,$qry);
		$row=mysqli_fetch_array($run);
		$crimenameid=$row["crime_name"];
		array_push($data,array('count'=>$count,'crimename'=>$crimenameid));
		}
		echo json_encode($data);	
	}
?>