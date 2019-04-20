
<!DOCTYPE html>
<html>
<body>

<?php
	$cookie_name = "user";
		$userN = "";
	setcookie($cookie_name, $userN, time() , "/"); // 86400 = 1 day
	header("Location:LogIn.html");
?>

</body>
</html>