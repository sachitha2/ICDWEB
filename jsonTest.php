<?php
$id = $_GET['json'];
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
$txt = "$id\n";
fwrite($myfile, $txt);
fclose($myfile);
echo("hello");
echo($id);

?>
