<?php 
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
	$qry="select status,id from crp_user_login where id='".$_POST["id"]."'";
	$run=mysqli_query($con,$qry);	
	$row=mysqli_fetch_array($run);
	  	if($row["status"]=='Off'){
			$qry="update crp_user_login set status='On' where id='".$row["id"]."'" ;
			  if($run=mysqli_query($con,$qry)){
				  echo "success";
			  }
			  else{
				  echo "error";
			  }
		}
	else{
		$qry="update crp_user_login set status='Off' where id='".$row["id"]."'" ;
		  if($run=mysqli_query($con,$qry)){
			  echo "success";
		  }
		  else{
			  echo "error";
		  }
	}
	
?>