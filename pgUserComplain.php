<?php
session_start();
if($_SESSION["userid"]=="")
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
<title>Crime Rate Prediction | User Complain</title>
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
			<?php include_once "usermenu.php";?>
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
						<div >
							<h2 style="text-align:center">Complain</h2>
								<div><br>
									<label>Crime:-</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<select id="selectCrime" style="width:33%;">
										<option value="">Select</option>
										<?php
											include("db_connect.php");
											$db=new DB_Connect();
											$con=$db->connect();
											$qry="select id,crime_name from crp_crime";
											$run=mysqli_query($con,$qry);
											while($row=mysqli_fetch_array($run)){
												$option.='<option value='.$row["id"].'>'.$row["crime_name"].'</option>';
											}
											echo $option;
										?>
									</select><br><br>
									<label>Location:-</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<select id="selectLocation" style="width:33%;">
										<option value="">Select</option>
										<?php
											$qryloacation="select id,location_name from crp_location";
											$runlocation=mysqli_query($con,$qryloacation);
											while($rowlocation=mysqli_fetch_array($runlocation)){
												$option2.='<option value='.$rowlocation["id"].'>'.$rowlocation["location_name"].'</option>';
											}
											echo $option2;
										?>
									</select><br><br>
									<label>Sublocation:-</label>
									<select id="selectSubLocation" style="width:33%;">
										<option value="">Select</option>
										<?php
											$qrysublocation="select id,sub_location_name from crp_sub_location";
											$runsublocation=mysqli_query($con,$qrysublocation);
											while($rowsublocation=mysqli_fetch_array($runsublocation)){
												$option3.='<option value='.$rowsublocation["id"].'>'.$rowsublocation["sub_location_name"].'</option>';
											}
											echo $option3;
										?>
									</select><br><br>
									<label>Description:-</label>
									<textarea id="txtComplain"></textarea>
									<br><br>
									<input type="Submit" id="btnSubmit" class="btn btn-primary" value="Submit"  onclick="SaveComplain();"/></br></br>
								</div>
									
						</div>
					</div>
					<div class="box-body">
							<table width=100% border=1 id="tableData"  class="table table-bordered table-striped"></table>	
							<input type="hidden" id="hdnId">
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
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider1").responsiveSlides({
									auto: true,
									pager:false,
									nav:true,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							 


 <!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		tableData();
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
	function SaveComplain(){
			if($("#selectCrime").val()==""){
				alert("Please Select Crime");
			}
			else if($("#selectLocation").val()==""){
				alert("Please Select Location");
			}
			else if($("#selectSubLocation").val()==""){
				alert("Please Select Sub Location");
			}
			else if($("#btnSubmit").val()=="Submit"){
				$.ajax({
					type:"POST",
					url:"saveComplain.php",
					data:{crime_name_id:$("#selectCrime").val(),location_name_id:$("#selectLocation").val(),sub_location_name_id:$("#selectSubLocation").val(),complain_description:$("#txtComplain").val()},  
					success:function(response){
						console.log(response);
						if($.trim(response)=="success"){
							alert("Complain Registered Successfully");
							tableData();
								$("#selectLocation").val("");
								$("#selectCrime").val("");
								$("#selectSubLocation").val("");
								$("#txtComplain").val("");
						}
						else{
							alert("Complain Not Registered");
						}
					},
				});
			}
		}
		function tableData(){
			$.ajax({
					type:"POST",
					url:"getUserComplain.php",
					data:{},
					success:function(response){
							$("#tableData").html(response);
									
					}
			});
			
		}
</script>
<!-- start-smoth-scrolling -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
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