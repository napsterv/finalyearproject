<?php
session_start();
if($_SESSION["adminid"]=="")
{
	header("Location:index.php");
}
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Crime Rate Prediction | Crimes</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Educative Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 

<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!--//web-fonts-->
<!--//fonts-->
<!-- js -->
</head>
<body>
<!-- banner -->
	<div class="" id="home">
		<!-- header -->
		<header>
			<div class="container">

			<!-- navigation -->
			<?php include_once "menu.php";?>
			<div class="clearfix"></div>
		<!-- //navigation -->
			</div>
		</header>
	<!-- //header -->
	</div>
<!-- //banner -->
<!--about-->
<!-- //main-content -->
		<div class="wthree-main-content">
		<!-- About-page -->
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="text-center">
							<h2 style="text-align:center">Crimes</h2>
								<div><br>
									<label>Crime Name:-</label>
									<input type="text" id="txtCrime">
									<input type="Submit" id="btnSubmit" class="btn btn-primary" value="Submit"  onclick="SaveCrime();"/></br></br>
								</div>
								<div class="box-body">
								<table width=100% border=1 id="tableData"  class="table table-bordered table-striped"></table>	
								<input type="hidden" id="hdnId">
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
<!--//about-->
<!-- team -->
	
	<!-- //team -->

<!--//services-section-->
<!-- Footer -->

			<div class="copyright-wthree ">
				<p>&copy; 2019 Crime Rate Prediction . All Rights Reserved | Design by </p>
			</div>
<!-- //Footer -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

	
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
							 
							 
							 <script>
								$(document).ready(function() {
								tableData();
								});
							 </script>
							 


 <!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
	function SaveCrime(){
			if($("#txtCrime").val()==""){
				alert("Please Enter Crime Name");
				}
			else if($("#btnSubmit").val()=="Submit"){
				$.ajax({
					type:"POST",
					url:"saveCrime.php",
					data:{crime_name:$("#txtCrime").val()},  
					success:function(response){
						console.log(response);
						if($.trim(response)=="success"){
							alert("Crime Name Saved Successfully");
							tableData();
								$("#txtCrime").val("");
						}
						else if($.trim(response)=="exist"){
							alert("Record Already Exist");
						}
						else{
							alert("Failed");
						}
					},
				});
			}
			
			else{
				$.ajax({
						type:'POST',
						url:'editCrimeData.php',
						data:{id:$("#hdnId").val(),
						crime_name:$("#txtCrime").val()
						},
						success:function(response){
							console.log(response);
							if($.trim(response)=="success"){
								alert("Details Updated Successfully");
								tableData();
								$("#txtCrime").val("");
								$("#btnSubmit").val("Submit");
							}
							else if($.trim(response)=="exist"){
								alert("Record Already Exist");
							}
							else{
								alert("Details Not Update");
							}
						},
						
					});
			}
		}
		function tableData(){
			$.ajax({
					type:"POST",
					url:"getCrimeData.php",
					data:{},
					success:function(response){
							$("#tableData").html(response);
									
					}
			});
			
		}
		function editRecord(id){
			$.ajax({
					type:"POST",
					url:"getCrimeDataForEdit.php",
					dataType:"JSON",
					data:{id:id},
					success:function(response){
						console.log(response);
						//$("#hdnId").val(id);
						$("#txtCrime").val(response["crime_name"]);
						$("#btnSubmit").val("Edit");
						$("#hdnId").val(id);
					}
			});
		}
				
		function deleteRecord(id){
			var ans=confirm("Are You Sure To Delete This Record ?");
			if(ans==true){
				$.ajax({
					type:"POST",
					url:"deleteCrimeData.php",
					data:{id:id},
					success:function(response){
						if($.trim(response)=="success"){
							alert("Record Deleted Successfully");
							tableData();
						}
						else{
							alert("Record Not Deleted");
						}
					}
				});
			}
		}
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		
	</script>
<!-- //here ends scrolling icon -->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->


<!-- script-for-menu -->
					<script>					
						$("span.menu").click(function(){
							$(".top-nav ul").slideToggle("slow" , function(){
							});
						});
					</script>
					<!-- script-for-menu -->

</body>
</html>