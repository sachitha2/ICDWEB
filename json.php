<?php
$age = array("Peter"=>"Sachitha","hello", "Ben"=>[1,2,3], "Joe"=>"43");

$age['Ben'][3] = 5;
$myJSON = json_encode($age);
echo $myJSON;
?>