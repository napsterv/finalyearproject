<?php 
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$id=$_POST["id"];
	$admin_reply=$_POST["admin_reply"];
	$status=$_POST["status"];
	$qry="update crp_complain set admin_reply='".$admin_reply."',status='".$status."' where id='".$id."'" ;
	  if($run=mysqli_query($con,$qry)){
		  echo "success";
	  }
	  else{
		  echo "error";
	  }
?>