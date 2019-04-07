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
<title>Crime Rate Prediction | Change Password</title>
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
<style>
td { 
                padding: 10px; 
                background-color:none; 
            }
</style>
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
						<table cellpadding="10" cellspacing="10">
							<tr>	
								<td><label>Old Password</label></td>
								<td><input name="oldpass" id="oldpass" type="password" ></td>
							
							</tr>	
							<tr><br>
								<td><label>New Password</label></td>
								<td><input name="newpass" id="newpass" type="password" ></td>
							</tr><br>
							<tr><br>
								<td><label>Retype Password</label></td>
								<td><input name="repass" id="repass" type="password"></td>
							</tr>
							<tr>
								<td colspan='2'>
									<input type="Submit" id="btnSubmit" class="btn btn-primary" value="Submit"  onclick="changePass();"/>
								</td>
							</tr>
						</table>
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
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
	function changePass(){
				if($("#oldpass").val()=="" ){
					alert("Please Enter Old Password");
				}
				else if($("#newpass").val()==""){
					alert("Please Enter New Password");
					}
				else if($("#newpass").val()==$("#oldpass").val()){
					alert("New Password and Old Password Can't be same");
					$("#oldpass").val(""); 
					$("#newpass").val("");
					$("#repass").val("");
					}
				else if($("#repass").val()==""){
					alert("Please Re-enter New Password");
				}
				else if($("#repass").val()!=$("#newpass").val()){
					alert("Password Does't Match");
					$("#repass").val("");
				}
				else{
					$.ajax({
						type:"POST",
						url:"editPassword.php",
						data:{oldpass:$("#oldpass").val(),newpass:$("#newpass").val()},
						success:function(response){
						console.log(response);
						if($.trim(response)=="success"){
							alert("password updated successfully");
							window.location.replace("index.php");
						 }
						else if($.trim(response)=="error"){
							alert("password not updated successfully");
						}
						else{
							alert("invalid old password");
							$("#oldpass").val(""); 
							$("#newpass").val("");
							$("#repass").val("");
						}
					}
					
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