<?php 
session_start();
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$oldpass=$_POST["oldpass"];
	$newpass=$_POST["newpass"];
	$qry="select password,id from crp_admin_login where id='".$_SESSION["userid"]."'";
	$run=mysqli_query($con,$qry);	
	$r=mysqli_fetch_array($run);
	$password=$r["password"];
    	if($password==$oldpass)
		{
			$qry="update crp_admin_login set password='".$newpass."' where id='".$r["id"]."'" ;
			  if($run=mysqli_query($con,$qry)){
				  echo "success";
				  session_destroy();
			  }
			  else{
				  echo "error";
			  }
		}
	else{
		echo "invalid";
	}
	
?>