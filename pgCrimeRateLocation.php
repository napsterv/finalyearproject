<?php
session_start();
if($_SESSION["adminid"]=="")
{
	header("Location:index.php");
}

	include("db_connect.php");
	$db=new DB_Connect();
	$con=$db->connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Crime Rate Prediction | Using Location Name</title>
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
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link href="https://www.cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<!--//web-fonts-->
<!--//fonts-->
<!-- js -->
<style>
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: center;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
		tr:nth-child(odd) {
		  background-color: #dddddd;
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
					<h2 style="text-align:center">Crime Rate Prediction Using Location</h2>
					<div class="col-md-6 col-md-offset-3">
						<br>
						<table>
							<tr>
								<th>
									<label id="select_main">Select Option For Crime Prediction:-</label>
								</th>
								<th>
									<select id="selectOpt" onchange="selectoption();" style="width: 247px;height:21px;">
										<option value="">Select</option>
										<option value="all">All Locations</option>
										<option value="Location">With Particular Location</option>
									</select>
								</th>
							</tr>
							<tr id="locationabc" style="display:none">
								<th>
									<label id="loc" style="display:none">Select Location For Crime Prediction:-</label>
								</th>
								<th>
									<select id="selectLocation" onchange="showlocation();" style="width:247px;height:21px;display:none">
										<option value="">Select</option>
										<?php
											$qry="select id,location_name from crp_location";
											$res=mysqli_query($con,$qry);
											$option="";
											while($row=mysqli_fetch_array($res))
											{
											$option.='<option value='.$row["id"].'>'.$row["location_name"].'</option>';
											}
											echo $option;
										?>
									</select>
								</th>
							</tr>
						</table><br>
					</div>
				</div>
				<div class="row">
					<div id="myfirstchart" style="position: relative;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
					</div>
				</div>
				<div class="row">
					<div class="box-body">
						<table width=100% border=1 id="tableData"  class="table table-bordered table-striped"></table>	
						<input type="hidden" id="hdnId">
					</div>	
				</div>
				<div class="row">
					<div class="box-body">
						<table width=100% border=1 id="tableData1"  class="table table-bordered table-striped"></table>	
						<input type="hidden" id="hdnId">
					</div>	
				</div>
			</div>
		</div>
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
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		//tableData();
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
		
		function selectoption(){
			if($("#selectOpt").val()=="all"){
				$("#tableData").show();
				$("#locationabc").hide();
				$("#loc").hide();
				$("#selectLocation").hide();
				$("#tableData1").hide();
				alldata();
			}
			else if($("#selectOpt").val()=="Location"){
				$("#locationabc").show();
				$("#loc").show();
				$("#selectLocation").show();
				$("#tableData1").show();
				$("#tableData").hide();
			}
			else{
				$("#locationabc").hide();
				$("#tableData").hide();
				$("#tableData1").hide();
			}
		}
	
		function alldata(){
			$("#myfirstchart").empty();
			var type="location";
			$.ajax({
				type:"POST",
				url:"getAllCrimePrediction.php",
				data:{type:type},
				success:function(data){
					//console.log(data);
					$("#tableData").html(data);
				}
			});	
			$.ajax({
				type:'POST',
				url:'getCrimePredictionLocationGraph.php',
				datatype:'JSON',
				data:{type:"alocation",location:$("#selectLocation").val()},
				success:function(data){
					var customer1=(data); 
					Morris.Bar({
						element: 'myfirstchart',
						data:jQuery.parseJSON(customer1),
						xkey: 'crimename',
						ykeys: ['count'],
						labels: ['count'],
						parseTime: false,
						xLabelAngle: 25
					});
				},
			});
		}
	
		function showlocation(){
			$("#myfirstchart").empty();
			$.ajax({
				type:'POST',
				url:'getCrimePredictionLocation.php',
				data:{location:$("#selectLocation").val()},
				success:function(response){
				//console.log(response);
				$("#tableData1").html(response);
				}
			});
		
			$.ajax({
				type:'POST',
				url:'getCrimePredictionLocationGraph.php',
				datatype:'JSON',
				data:{type:"plocation",location:$("#selectLocation").val()},
				success:function(data){
				 var customer1=(data); 
					Morris.Bar({
						element: 'myfirstchart',
						data:jQuery.parseJSON(customer1),
						xkey: 'crimename',
						ykeys: ['count'],
						labels: ['count'],
						parseTime: false,
						xLabelAngle: 25,
					});
				},
			});
		}
</script>
<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
</script>
<script src="js/bootstrap.js"></script>
	<script>					
		$("span.menu").click(function(){
			$(".top-nav ul").slideToggle("slow" , function(){
			});
		});
	</script>
</body>
</html>