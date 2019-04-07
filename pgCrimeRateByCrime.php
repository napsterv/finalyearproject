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
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Crime Rate Prediction | Using Crime Name</title>
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
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
		
		element.style {
		overflow: hidden;
		position: relative;
		left: -0.5px;
		width: 1200px;
		height: 500px;
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
					<h2 style="text-align:center">Crime Rate Prediction Using Crimes</h2>
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
										<option value="all">All Crime</option>
										<option value="particularcrime">With Particular Crime</option>
									</select>
								</th>
							</tr>
							<tr id="crimeabc" style="display:none">
								<th>
									<label id="cri" style="display:none">Select Crime For Crime Prediction:-</label>
								</th>
								<th>
									<select id="selectCrime" onchange="showlocation();" style="width:247px;height:21px;display:none">
										<option value="">Select</option>
										<?php
											$qry="select id,crime_name from crp_crime";
											$res=mysqli_query($con,$qry);
											$option="";
											while($row=mysqli_fetch_array($res))
											{
											$option.='<option value='.$row["id"].'>'.$row["crime_name"].'</option>';
											}
											echo $option;
										?>
									</select>
								</th>
							</tr>
						</table><br>
					</div>
				</div><br><br>
				<div class="row">
					<div id="mysecondchart">
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
			$("#crimeabc").hide();
			$("#cri").hide();
			$("#selectCrime").hide();
			$("#tableData1").hide();
			alldata();
		}
		else if($("#selectOpt").val()=="particularcrime"){
			$("#crimeabc").show();
			$("#cri").show();
			$("#selectCrime").show();
			$("#tableData1").show();
			$("#tableData").hide();
		}
		else{
			$("#crimeabc").hide();
			$("#tableData").hide();
			$("#tableData1").hide();
		}
	}
	
	function alldata(){
		$("#mysecondchart").empty();
		var type="crime";
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
			url:'getCrimePredictionCrimeGraph.php',
			datatype:"JSON",
			data:{type:"allcrime",crime:$("#selectCrime").val()},
			success:function(data){
				var customer1=(data); 
				Morris.Bar({
					element: 'mysecondchart',
					data:jQuery.parseJSON(customer1),
					xkey: 'location',
					ykeys: ['count'],
					labels: ['count'],
					parseTime: false,
					xLabelAngle: 25
				});
			},
		});
			
	}
	
	function showlocation(){
		$("#mysecondchart").empty();
		$.ajax({
			type:'POST',
			url:'getCrimePredictionCrime.php',
			data:{crime:$("#selectCrime").val()},
			success:function(response){
			//console.log(response);
			$("#tableData1").html(response);
			}
		});
			
		$.ajax({
			type:'POST',
			url:'getCrimePredictionCrimeGraph.php',
			datatype:"JSON",
			data:{type:"percrime",crime:$("#selectCrime").val()},
			success:function(data){
				var customer1=(data); 
				Morris.Bar({
					element: 'mysecondchart',
					data:jQuery.parseJSON(customer1),
					xkey: 'location',
					ykeys: ['count'],
					labels: ['count'],
					parseTime: false,
					xLabelAngle: 25
				});
			},
		});
	}
		/*
		function showlocation(){
			$.ajax({
			type:'POST',
			url:'getCrimePredictionLocation.php',
			data:{location:$("#selectLocation").val()},
			success:function(response){
			console.log(response);
			
			// var name = [];
            // var count = [];

                    // for (var i in response) {
                        // name.push(response[i].crimename);
                        // count.push(response[i].Count);
                    // }
					new Morris.Line({
							element: $("#myfirstchart").show(),
							data: [
							{ Crime: name, value: count },
							// { year: '2009', value: 10 },
							// { year: '2010', value: 5 },
							// { year: '2011', value: 5 },
							// { year: '2012', value: 20 }
						  ],
					  xkey: 'Crime',
					  ykeys: ['count'],
					  labels: ['Crime']
					});
			}
			});
		}
	*/
	/*function showlocation(){
		$.ajax({
			type:'POST',
			url:'getCrimePredictionLocation.php',
			data:{location:$("#selectLocation").val()},
			success:function(data){
			console.log(data);
			var name = [];
            var count = [];

                    for (var i in data) {
                        name.push(data[i].crime_name_id);
                        count.push(data[i].cnt);
                    }
					new Morris.Line({
							element: $("#myfirstchart").show(),
							data: [
							{ Crime: 'name', value: count },
							// { year: '2009', value: 10 },
							// { year: '2010', value: 5 },
							// { year: '2011', value: 5 },
							// { year: '2012', value: 20 }
						  ],
					  xkey: 'Crime',
					  ykeys: ['count'],
					  labels: ['name']
					});
					 

			}
	});
	}*/
	
<!---------------- For Morris js ---------------->
		// new Morris.Line({
	// element: $("#myfirstchart").show(),
	  // data: [
		// { year: '2008', value: 20 },
		// { year: '2009', value: 10 },
		// { year: '2010', value: 5 },
		// { year: '2011', value: 5 },
		// { year: '2012', value: 20 }
	  // ],
  // xkey: 'year',
  // ykeys: ['value'],
  // labels: ['Value']
// });
<!---------------------------------- For Cahrt js ---------------------------->
// var chartdata = {
						// element: $("#myfirstchart").show(),
                        // labels: name,
                        // datasets: [
                            // {
                                // label: 'Crime Rate Prediction',
                                // backgroundColor: '#49e2ff',
                                // borderColor: '#46d5f1',
                                // hoverBackgroundColor: '#CCCCCC',
                                // hoverBorderColor: '#666666',
                                // data: marks
                            // }
                        // ]
                    // };
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