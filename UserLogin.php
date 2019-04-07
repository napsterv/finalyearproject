
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Crime Rate Prediction | User Login</title>
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
	#loginDiv {
    position:fixed;
    top: 50%;
    left: 50%;
    width:30em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/
    border: 1px solid #ccc;
    background-color: #f3f3f3;
}
</style>
</head>
<body>
<!-- banner -->
	<div  id="home">
		<!-- header -->
		<header>
			<div class="container">

			<!-- navigation -->
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>				  
				<div class="w3-logo">
					<h1><a href="index.php">Crime Rate Prediction</a></h1>
				</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
					<li><a class="active" href="index.php"> Admin Login</a></li>
					<li><a class="active" href="UserLogin.php"> User Login</a></li>
				  </ul>
				
				</div><!-- /.navbar-collapse -->
				 
			</nav>
			<div class="clearfix"></div>
		<!-- //navigation -->
			</div>
		</header>
	<!-- //header -->
	</div>
<!--services-section-->
<div class="services-w3layouts" id="services">
	<div class="container">	
	<div class="head-top-w3ls"></div>
		<h5 class="title-w3">User Login</h5>
		<div class="col-md-12 col-md-offset-4">
				
				<!--<div class="col-md-4 w3layouts-our-advantages-grid">
					<div class="input-group wow fadeInUp animated" data-wow-delay=".5s">
						<span class="input-group-addon" id="basic-addon1">@</span>
						<input type="text" id="txtUsername" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
					</div>
					<div class="input-group wow fadeInUp animated" data-wow-delay=".5s">
						<input type="text" id="txtPassword" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
						<span class="input-group-addon" id="basic-addon2">example@123</span>
					</div>
					<div class="input-group wow fadeInUp animated" data-wow-delay=".5s">
					<h3><a onclick="checkLogin();"  style="cursor: pointer;"><span class="label label-primary">Login</span></a></h3>
					</div>
					<div class="clearfix"> </div>
				</div>-->
				<div class="col-md-4">
					<div >	
						<input type="text" id="txtUsername" class="form-control" placeholder="Email/Mobile" >
					</div>
					<div >
						<br>
						<input type="password" id="txtPassword" class="form-control" placeholder="Password" >
					</div>
					<div >
					<br>
					<h3><a onclick="checkLogin();"  style="cursor: pointer;"><span class="label label-primary">Login</span></a>
					<a onclick="location.href='register.php'"  style="cursor: pointer;"><span class="label label-primary">Register</span></a></h3>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
	</div>
<div class="clearfix"></div>
</div>
<!--//services-section-->
<!--/reviews-->
	

<!-- mid -->

<!--sign-up-section-->
	
<!--//sign-up-section-->
<!-- gallery -->

<!-- Footer -->

			<div class="copyright-wthree">
				<p>&copy; 2019 Crime Rate Prediction . All Rights Reserved | Design by</p>
			</div>
<!-- //Footer -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

	
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script src="js/responsiveslides.min.js"></script>
							<script>
	function checkLogin(){
		if($("#txtUsername").val()==""){
				alert("Please Enter Email or Mobile");
			}
		else if($("#txtPassword").val()==""){
				alert("Please Enter Password");
			}
			
		else {
			$.ajax({
				type:"POST",
				url:"checkUserLogin.php",
				data:{username:$("#txtUsername").val(),password:$("#txtPassword").val()},
				success:function(response){
					console.log(response);
					if($.trim(response)=="success"){
						alert("succesfull login");
						window.location.replace("pgUserHome.php");
						$("#txtUsername").val("");
						$("#txtPassword").val("");
						}
						else if($.trim(response)=="statuserror"){
							alert("Sorry Login Of This User Is Blocked Please Contact With Admin.");
						}
					else{	
						alert("LOGIN INVALID");	
					}
				}	
			});
		}
	}
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
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
<!--gallery-->

<script type="text/javascript">
							$(window).load(function() {
								$("#flexiselDemo1").flexisel({
									visibleItems:3,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,    		
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: { 
										portrait: { 
											changePoint:480,
											visibleItems: 1
										}, 
										landscape: { 
											changePoint:640,
											visibleItems:2
										},
										tablet: { 
											changePoint:768,
											visibleItems: 2
										}
									}
								});
								
							});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<!--gallery-->



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