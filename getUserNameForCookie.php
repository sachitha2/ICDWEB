<!doctype html>
<html>
<head>
<script>
	//get user name form server
	getUserNameFromServer();
	function getUserNameFromServer(){
		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
			createCookie(this.responseText);
			}
		};
		xhttp.open('GET',"http://shpsachitha.000webhostapp.com/ICD/readCookie.php", true);
  		xhttp.send();
										 				 }
	
	//create user name in cookie
	function createCookie(uName){
		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
			
			}
		};
		xhttp.open('GET',"createCookieInLocal.php?uName="+uName, true);
  		xhttp.send();
	}
	
</script>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>