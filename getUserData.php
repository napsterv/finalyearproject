<?php
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$qry="select * from crp_user_login order by id desc";
	//echo $qry;
	$run=mysqli_query($con,$qry);
	$i=1;
	$table="";
	$table.="<thead><tr><th>Sr No</th><th>User Name</th><th>Mobile</th><th>Email</th><th>Status</th></tr></thead><tbody>";		
	while($row=mysqli_fetch_array($run)){		
	$table.="<tr>";
	$table.="<td>".$i."</td>";
	$table.="<td >".$row["name"]."</td>";
	$table.="<td >".$row["mobile"]."</td>";
	$table.="<td >".$row["email"]."</td>";
	$table.="<td><a href='javascript:void(0)' onclick='ChangeStatus(".$row["id"].")'>".$row["status"]."</a></td>";
	$table.="</tr>";
	$i++;
	}
	$table.="</tbody>";
	echo $table;
	?>