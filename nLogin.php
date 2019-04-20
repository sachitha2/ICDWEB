<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="mainModal" style="background-color: ;">
  <span class="close" onClick="hideModal()">&times;</span>
    <div class="" id="modalContent">
    	
    
    </div>
  </div>

</div>
<!doctype html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style2.css">

</head>

<body ><br>


	<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div style="opacity: 1.0;">
	  		<form action="LogIn.php" method="post">
	  			<h1 style="font-size: 60px;color: white">Login</h1>
	  	  		<h4>User Name</h4>
				<input type="text" class="txtbox" name="UserName" id="UserName" required><br><br>
  	  	 	    <h4>Password</h4>
				<input type="password" class="txtbox" name="Password" id="Password" onKeyPress="enter(event)" required><br>
  	  	  		<h5 id="errorMessage" style="color: red"></h5><br>
	  	  		<button id="Login" class=" btn-block button button1" type="submit" onClick="" > Login</button>
		
	  		</form>
		</div>
		</div>
		<div class="col-md-4"></div>
	</div>

	

</body>

<script type="text/javascript" >
	
function enter(e) {
  if (e.which == 13) { checkUser(); }
}
	
function checkUser() {
  
  	var xhttp;
  	var str1 = document.getElementById("UserName").value;
  	var str2 = document.getElementById("Password").value;
	
	if (!(str1=="" || str2=="")){
	
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
      		document.getElementById("errorMessage").innerHTML = this.responseText;
	 		document.getElementById("UserName").value = "";
	  		document.getElementById("Password").value = "";
				
				if (this.responseText=="done"){
				
					alert("doed");
				}else{
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
				
    		}
  		};
  		xhttp.open('GET', "http://icd.infinisolutionslk.com/LogIn.php?UserName="+str1+"&Password="+str2, true);
  		xhttp.send();
	}else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill all the fields";
  	}
}
</script>

</html>
