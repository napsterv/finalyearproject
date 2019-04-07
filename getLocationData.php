<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$qry="select * from crp_location order by id desc";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>Sr No</th><th>Location Name</th><th>Edit</th><th>Delete</th></tr></thead><tbody>";		
	while($row=mysqli_fetch_array($run)){		
	$table.="<tr>";
	$table.="<td>".$i."</td>";
	$table.="<td >".$row["location_name"]."</td>";
	$table.="<td><a href='javascript:void(0)' onclick='editRecord(".$row["id"].")'>Edit</a></td>";
	$table.="<td><a href='javascript:void(0)' onclick='deleteRecord(".$row["id"].")'>Delete</a></td>";
	$table.="</tr>";
	$i++;
	}
	$table.="</tbody>";
	echo $table;
	?>