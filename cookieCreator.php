<?php
header('Access-Control-Allow-Origin: *'); 
$userN = $_GET['uName'];
$cookie_name = "user";
setcookie($cookie_name, $userN, time() + (86400 * 30), "/"); // 86400 = 1 day
if(!isset($_COOKIE[$cookie_name])) {
    echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
}
?>