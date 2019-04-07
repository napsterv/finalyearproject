<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$qry="select * from crp_sub_location order by id desc";
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>Sr No</th><th>Location Name</th><th>Sub Location Name</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";		
	while($row=mysqli_fetch_array($run)){		
	$qry2="select location_name from crp_location where id='".$row["location_name_id"]."' order by id desc";
	$run2=mysqli_query($con,$qry2);
	$row2=mysqli_fetch_array($run2);
	$table.="<tr>";
	$table.="<td>".$i."</td>";
	$table.="<td>".$row2["location_name"]."</td>";
	$table.="<td >".$row["sub_location_name"]."</td>";
	$table.="<td><a href='javascript:void(0)' onclick='editRecord(".$row["id"].")'>Edit</a></td>";
	$table.="<td><a href='javascript:void(0)' onclick='deleteRecord(".$row["id"].")'>Delete</a></td>";
	$table.="</tr>";
	$i++;
	}
	$table.="</tbody>";
	echo $table;
	?>