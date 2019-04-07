<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$crime=$_POST["crime"];
	
	if($_POST["type"]=="percrime"){
		$qrylocation="SELECT COUNT(location_name_id) as cnt,location_name_id FROM crp_complain where crime_name_id='".$crime."' GROUP BY location_name_id";
		$runlocation=mysqli_query($con,$qrylocation);
		$data = array();
		while($rowlocation=mysqli_fetch_array($runlocation)){
		$count=$rowlocation["cnt"];
		$qry="select id,location_name from crp_location where id='".$rowlocation["location_name_id"]."'";
		$run=mysqli_query($con,$qry);
		$row=mysqli_fetch_array($run);
		$locationnameid=$row["location_name"];
		array_push($data,array('count'=>$count,'location'=>$locationnameid));
		}
		echo json_encode($data);
	}
	else{
		$qrylocation="SELECT COUNT(location_name_id) as cnt,location_name_id FROM crp_complain GROUP BY location_name_id";
		$runlocation=mysqli_query($con,$qrylocation);
		$data = array();
		while($rowlocation=mysqli_fetch_array($runlocation)){
		$count=$rowlocation["cnt"];
		$qry="select id,location_name from crp_location where id='".$rowlocation["location_name_id"]."'";
		$run=mysqli_query($con,$qry);
		$row=mysqli_fetch_array($run);
		$locationnameid=$row["location_name"];
		array_push($data,array('count'=>$count,'location'=>$locationnameid));
		}
		echo json_encode($data);	
	}
?>