<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$location=$_POST["location"];
	$qry="select * from crp_complain where location_name_id='".$location."' order by id desc";
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>Sr No</th><th>Location</th><th>Crime Name</th></tr></thead><tbody>";	
	while($row=mysqli_fetch_array($run)){
	$table.="<tr>";
	$table.="<td>".$i."</td>";
	//$table.="<td id='user_name".$row["id"]."'>".$row["user_name"]."</td>";
	//$table.="<td id='mobile".$row["id"]."'>".$row["mobile"]."</td>";
	//$table.="<td id='email".$row["id"]."'>".$row["email"]."</td>";
	$qry2="select location_name from crp_location where id='".$row["location_name_id"]."'";
	$run2=mysqli_query($con,$qry2);
	$row2=mysqli_fetch_array($run2);
	$table.="<td id='location_name_id".$row["id"]."'>".$row2["location_name"]."</td>";
	$qry1="select crime_name from crp_crime where id='".$row["crime_name_id"]."'";
	//echo $qry1;
	$run1=mysqli_query($con,$qry1);
	$row1=mysqli_fetch_array($run1);
	$table.="<td id='crime_name_id".$row["id"]."'>".$row1["crime_name"]."</td>";
	$table.="</tr>";
	$i++;
	}
	$table.="</tbody>";
	echo $table;
	
	
?>