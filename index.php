<?php
header('Access-Control-Allow-Origin: *'); 
?>
<!doctype html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript" src="js/chart.js"></script>
   
    <script type="text/javascript">
		function menuHS(){
			 var x = document.getElementById("mainMenu");
    		if (x.style.display === "none") {
        		x.style.display = "block";
    		} else {
        		x.style.display = "none";
    		}
				}
		
		
		var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        var h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
		function thisMonthBarChart(){
			alert("hello");
		}
		function monthBarChart(){
			//document.getElementById("dual_x_div").innerHTML = "<img src='load.gif' >";
			var xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
        	 google.charts.load('current', {'packages':['corechart', 'line']});
      		google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
		 
		  
		 
        var data = new google.visualization.arrayToDataTable([
          ['', 'Income', 'Expenses'],
          ['January', myObj['I1'], myObj['E1']],
          ['February', myObj['I2'],myObj['E2'] ],
          ['March', myObj['I3'], myObj['E3']],
          ['April', myObj['I4'], myObj['E4']],
          ['May', myObj['I5'],myObj['E5']],
		  ['June', myObj['I6'], myObj['E6']],
		  ['July', myObj['I7'], myObj['E7']],
		  ['August', myObj['I8'],myObj['E8'] ],
		  ['September', myObj['I9'], myObj['E9']],
		  ['October', myObj['I10'],myObj['E10'] ],
		  ['November', myObj['I11'], myObj['E11']],
		  ['December', myObj['I12'], myObj['E12']]
        ]);
		 
        var options = {
          width: (w/100)*90,
          chart: {
            title: 'Anual Sales Report',
            subtitle: ''
          },
          bars: 'vertical', // Required for Material Bar Charts.
          series: {
            0: { axis: 'Income' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'Expenses' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'parsecs'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

      var chart = new google.visualization.LineChart(document.getElementById('dual_x_div2'));
     
		  chart.draw(data, options);
	  
    };
			
			
    		}
		  };
		  xmlhttp.open("GET", "https://icd.infinisolutionslk.com/yearDataReport.php", true);
		  xmlhttp.send();
		 setTimeout(yearBarChart,100000);
		}
		function yearBarChart(){
			//document.getElementById("dual_x_div").innerHTML = "<img src='load.gif' >";
			var xmlhttp = new XMLHttpRequest();
		  xmlhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
			var myObj = JSON.parse(this.responseText);
        	 google.charts.load('current', {'packages':['corechart', 'line']});
      		google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
		 
		  
		 
        var data = new google.visualization.arrayToDataTable([
          ['', 'Income', 'Expenses'],
          ['2018', myObj['I1'], myObj['E1']],
          ['2019', myObj['I2'],myObj['E2'] ],
          ['2020', myObj['I3'], myObj['E3']],
          ['2021', myObj['I4'], myObj['E4']],
          ['2022', myObj['I5'],myObj['E5']],
		  ['2023', myObj['I6'], myObj['E6']],
		  ['2024', myObj['I7'], myObj['E7']],
        ]);
		 
        var options = {
          width: (w/100)*90,
          chart: {
            title: 'Anual Sales Report',
            subtitle: ''
          },
          bars: 'vertical', // Required for Material Bar Charts.
          series: {
            0: { axis: 'Income' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'Expenses' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'parsecs'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

      var chart = new google.visualization.LineChart(document.getElementById('dual_x_div1'));
     
		  chart.draw(data, options);
	  
    };
			
			
    		}
		  };
		  xmlhttp.open("GET", "https://icd.infinisolutionslk.com/monthlyDataReport.php", true);
		  xmlhttp.send();
		 setTimeout(yearBarChart,100000);
		}
      
    </script>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/temp.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link href="css/style2.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/js1.js"></script>
<script src="https://icd.infinisolutionslk.com/js/r.js"></script>
<script src="js/jquery1.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<meta charset="utf-8">
<title>Theme</title>
<?php
	include("url.php");
	include("db.php");
	include("func/basic.class.php");
	include("func/DB.class.php");
	$basic = new basic;
	$basic->modal();
	?>
</head>
<body  onkeyup="whichButton(event)" onLoad="loadMonthReportBarChart();ajaxCommon('dashThirds.php', 'dashT');dashTH()" id="myvideo">

<div class="menubarS" style="" onClick="menuHS()" id="menubarS">
	Menu
</div>
<img src="island-logo.png" width="50px" height="50px" style="position: fixed;top: 15px;right: 50px;z-index: 100" class="hideMe">
<div style="position: fixed;bottom: 10px;right: 15px;z-index: 100;color: white" class="hideMe">Developed by Infini Solutions</div>
<!--	<div class="mainDiv">-->

		<div class="floateLeft mainMenu" id="mainMenu">
		        
			<script type="text/javascript" >
				
				x=loadMainMenu();
				document.write(x);
			</script>
			<center><p style="font-size: 10px;">Logged in as <?php 
					if(!isset($_COOKIE['user'])) {
    					///call log out
//						echo '<script>window.location.href = "LogIn.html";</script>';	
						} else {
    							//echo "Cookie user  is set!<br>";
    							echo  $_COOKIE['user'];
							}?>
			</p></center>
			
		</div>
		<div class="floateLeft mainStage" id="mainStage">
				<center><div class="row" id="dashT" style="width: 800px">
					
					
					
					
					
				</div></center>
				<div id="barCharts" style="height: auto;background-color: white;margin: auto;width: 100%;opacity: 0.9">
					bar chrts loading
				</div>
					
					
				
				
				
			
			<div style="width: 100%;height: auto;background-color: rgb(60, 60, 60);" >
				<button onClick="loadMonthReportBarChart()"  class="btn btn-primary btn-lg" style="color: black">Yearly</button> 
				<button onClick="loadYearReportBarChart()" class="btn btn-primary btn-lg" style="color: black">This year</button>
				<button  class="btn btn-primary btn-lg" style="color: black">Today</button>
				<button  class="btn btn-primary btn-lg" style="color: black">This month</button>
				 </div>
				 <div>
				 	<button class="btn btn-warning btn-lg" onClick="ajaxCommonGetFromNet('<?php echo($url) ?>creditsOfShops.php','mainStage')">Credits</button>
				 </div>
			<div>
				<?php include("profitThisMonth.php") ?>
			</div>
		</div>
		
<!--	</div>-->
<script type="text/javascript">
	//JS going here
	//----------------------------------------------------------
		//Enter key press catching startig
//----------------------------------------------------------
	function keyc(){
alert("sam");
	}
//-----------------------------------------------------------
		//Enter key press catching Ending
//-----------------------------------------------------------s
	//for key caching functions ex- enter key press
</script>
	
</body>
</html>
