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
<title>Crime Rate Prediction | User Complains</title>
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
					<div >
						<h2 style="text-align:center">Complain</h2>
							<div class="col-md-6 col-md-offset-3">
								<br>
								<label>Crime:-</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text" id="txtCrime" disabled>
									<br><br>
								<label>Location:-</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text" id="txtLocation" disabled><br><br>
								<label>Sublocation:-</label>
								<input type="text" id="txtSubLocation" disabled><br><br>
								<label>Description:-</label>
								<textarea id="txtComplain" disabled></textarea>
								<br><br>
								<label>Admin Relpy:-</label>
								<textarea id="txtReply" ></textarea>
								<br><br>
								<label>Status:-</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<select id="selectStatus" style="width:33%;">
									<option value="">Select</option>
									<option value="Pending">Pending</option>
									<option value="Inprogres">Inprogres	</option>
									<option value="Completed">Completed</option>
									<option value="Rejected">Rejected</option>
									<option></option>
								</select>
								<br><br>
								<input type="Submit" id="btnSubmit" class="btn btn-primary" value="Submit"  onclick="SaveComplainReply();"/></br></br>
							</div>
							<div class="box-body">
								<table width=100% border=1 id="tableData"  class="table table-bordered table-striped"></table>	
								<input type="hidden" id="hdnId">
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
		function tableData(){
			$.ajax({
					type:"POST",
					url:"getComplain.php",
					data:{},
					success:function(response){
							$("#tableData").html(response);
									
					}
			});	
		}
		function editRecord(id){
			$.ajax({
					type:"POST",
					url:"getUserDataForEdit.php",
					dataType:"JSON",
					data:{id:id},
					success:function(response){
						console.log(response);
						$("#txtCrime").val(response["crime_name_id"]);
						$("#txtLocation").val(response["location_name_id"]);
						$("#txtSubLocation").val(response["sublocation_name_id"]);
						$("#txtComplain").val(response["complain_description"]);
						$("#txtReply").val(response["admin_reply"]);
						$("#selectStatus").val(response["status"]);
						$("#btnSubmit").val("Edit");
						$("#hdnId").val(id);
					}
			});
		}
		function SaveComplainReply(){
			if($("#txtReply").val()==""){
				alert("Please Enter Reply");
			}
			else if($("#selectStatus").val()==""){
				alert("Please Select Status");
			}
			else {
				$.ajax({
					type:"POST",
					url:"saveComplainReply.php",
					data:{id:$("#hdnId").val(),admin_reply:$("#txtReply").val(),status:$("#selectStatus").val()},  
					success:function(response){
						console.log(response);
						if($.trim(response)=="success"){
							alert("Complain Registered Successfully");
							tableData();
								$("#selectLocation").val("");
								$("#selectCrime").val("");
								$("#selectSubLocation").val("");
								$("#txtComplain").val("");
								$("#txtReply").val("");
								$("#selectStatus").val("");
						}
						else{
							alert("Complain Not Registered");
						}
					},
				});
			}
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