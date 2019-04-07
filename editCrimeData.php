<?php 
	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();	
	$id=$_POST["id"];
	$crime_name=$_POST["crime_name"];
	$qrycount="select count(id) as cnt from crp_crime where crime_name='".$crime_name."' and id!='".$id."'";
	$runcount=mysqli_query($con,$qrycount);
	$rowcount=mysqli_fetch_array($runcount);
	if($rowcount["cnt"]>0){
		echo "exist";
	}
	else{
	$qry="update crp_crime set crime_name='".$crime_name."' where id='".$id."'" ;
	  if($run=mysqli_query($con,$qry)){
		  echo "success";
	  }
	  else{
		  echo "error";
	  }
	}
?>