<?php
header('Access-Control-Allow-Origin: *'); 
include("db.php");
$sql = "SELECT * FROM shop";
$result = $conn->query($sql);

include("func/basic.class.php");

$menu = new basic;
$menu->menuBar("Past Credits +","BackToSettingsMenu()");
?>

<br>
			

			
			
		
	
<div class="row">
	  <div class="col-md-4"></div>
	  <div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C">
	  	<div style="opacity: 1.0;">
	  	
	  	  <h4>Selct Shop</h4>
			<input list="shops" name="shop" id="inputShops" style="color: black" class="txtbox" >
			<datalist id="shops">
				<?php 
					while($row = $result->fetch_assoc()){
						?>
							<option value="<?php echo($row['id']) ?>"><?php echo($row['name']) ?></option>
						<?php
					}
				
				?>
				
			</datalist>
			<br>
			<br>
			<div id="msg"></div>
			<button onClick="loadPastShopCreditsToStage(inputShops.value)" class=" btn-block button button1">Next</button>
			
			<div id="pastShopCredits" style="color: black">
				
				
			</div>
		</div>
		</div>
		<div class="col-md-4">
			<div align="center" style="vertical-align:middle;">
				<h5 id="OutName"></h5>
				<div id="DelRoot"></div>
			</div>
		</div>
	</div>