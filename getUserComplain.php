<?php
session_Start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$qry="select * from crp_complain where user_id='".$_SESSION["userid"]."' order by id desc";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>Sr No</th><th>Crime</th><th>User Name</th><th>Mobile</th><th>Email</th><th>Location</th><th>Sub Location</th><th>Complain Description</th><th>Case Details</th><th>Status</th></tr></thead><tbody>";		
	while($row=mysqli_fetch_array($run)){		
	$table.="<tr>";
	$table.="<td>".$i."</td>";
	$qrycrime="select crime_name from crp_crime where id='".$row["crime_name_id"]."'";
	$runcrime=mysqli_query($con,$qrycrime);
	$rowcrime=mysqli_fetch_array($runcrime);
	$table.="<td >".$rowcrime["crime_name"]."</td>";
	$table.="<td >".$row["user_name"]."</td>";
	$table.="<td >".$row["mobile"]."</td>";
	$table.="<td >".$row["email"]."</td>";
	$qrylocation="select location_name from crp_location where id='".$row["location_name_id"]."'";
	$runlocation=mysqli_query($con,$qrylocation);
	$rowlocation=mysqli_fetch_array($runlocation);
	$table.="<td >".$rowlocation["location_name"]."</td>";
	$qrysublocation="select sub_location_name from crp_sub_location where id='".$row["sublocation_name_id"]."'";
	$runsublocation=mysqli_query($con,$qrysublocation);
	$rowsublocation=mysqli_fetch_array($runsublocation);
	$table.="<td >".$rowsublocation["sub_location_name"]."</td>";
	$table.="<td >".$row["complain_description"]."</td>";
	$table.="<td >".$row["admin_reply"]."</td>";
	$table.="<td >".$row["status"]."</td>";
	$table.="</tr>";
	$i++;
	}
	$table.="</tbody>";
	echo $table;
	?>