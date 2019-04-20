
<?php 
$timezone  = +5.30; 
$x =  gmdate("Y-m-j", time() + 3600*($timezone+date("I"))); 
echo($x);

?>