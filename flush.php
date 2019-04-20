<?php
include("func/basic.class.php");
$menu = new basic;
$menu->menuBar("Flush all data","BackToSettingsMenu()");
?>
<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div style="opacity: 1.0;">
	  		<div id="msg"></div>
			<input type="text" placeholder="password" id="pass"  style="color:black" class="txtbox">
			<br>
			<br>
			<input type="button" value="Flush" class=" btn-block button button1" onClick="flush(pass.value)" >
	  	  
		</div>
		</div>
		<div class="col-md-4">
			<div align="center" style="vertical-align:middle;">
				<h5 id="OutName"></h5>
				<div id="DelRoot"></div>
			</div>
		</div>
	</div>