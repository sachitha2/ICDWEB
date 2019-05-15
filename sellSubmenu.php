<?php 
header('Access-Control-Allow-Origin: *'); 
include("incomeCalculateInSellingPage.php");
include("db.php");
include("url.php");
?>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" id="mainModal" style="background-color: ;">
  <span class="close" onClick="hideModal()">&times;</span>
    <div class="" id="modalContent">
    	<h1>Loading</h1>
    
    </div>
  </div>

</div>
<hr width="100%">
<div  class="mainHeadDiv">Trades</div>
<hr width="100%">

<center><div style="width: 90%;height: 70%;">
<div  class="mainHeadDiv2">Temporary Invoices</div>
<hr width="100%">
	<div class="tileButton" onClick="selectVehicleForTmpInvoices()">
		<strong style="font-size: 20px;">TMP INVOICES</strong><br>
	</div>
<hr width="100%">
<div  class="mainHeadDiv2">Income</div>
<hr width="100%">
<!--
	<div class="tileButton" onClick="getTodayIncome()"  style="width: 100%">
		<strong style="font-size: 20px;">Today Income</strong><br><br>
		
	</div>
-->
	<div class="tileButton" onClick="getTodayIncome()" style="width: 100%">
		<strong style="font-size: 20px;">Today Income</strong><br><br>
		<?php echo(todayIncome()) ?>
	</div>
	<div class="tileButton" onClick="getMonthIncome()" style="width: 100%">
		<strong style="font-size: 20px;">This month Income</strong><br><br>
		<?php echo(thisMonthIncome()) ?>
	</div>
	<div class="tileButton" onClick="" style="width: 100%">
		<strong style="font-size: 20px;">This Year Income</strong><br><br>
		<?php echo(yearIncomeCalculating()) ?>
	</div>
	<div class="tileButton"  style="width: 100%">
		<strong style="font-size: 20px;">Select a date</strong><br><br>
		<input type="date" onChange="ajaxCommonGetFromNet('<?php echo($url) ?>incomeOnCustomDate.php?date='+this.value, 'mainStage');">
	</div>
<hr width="100%">
<div  class="mainHeadDiv2">Profit</div>
<hr width="100%">
	<div class="tileButton" onClick="ajaxCommonGetFromNet('<?php echo($url) ?>todayProfit.php', 'mainStage');">Today Profit</div>
	
	<div class="tileButton" onClick="">Month Profit</div>
	<div class="tileButton" style="width: 100%">
		
		Profit of a date
		<input type="date" onChange="ajaxCommonGetFromNet('<?php echo($url) ?>profitOfADay.php?date='+this.value, 'mainStage');">
	</div>
<table width="100%" height="70%" border="0">
	<tr>
		<td align="center" height="210">
			<table width="100%" border="0">
				
				
				<!--<tr>
					<td colspan="3">
						
						<ol style="width: 100%;background-color: white;color: black;font-size: 30px;opacity: 0.9" class="IVHeading">
							<li>
								
								<div  onClick="toggleItemViseIncomeToday()" id="IVIToday"><center>Item vise income - Today <img src="icons/whiteDownArrow.png" width="40px" height="40px"></center></div>
								<div id="itemViseIncomeToday" style="display: none"><?php 
									echo(loadItems());
								?>
								</div>
							
							</li>
							<li>Item vise income - This Month</li>
							<li>Item vise income - Year</li>
						</ol>
					</td>
				</tr>-->
				
			</table>
			
		</td>
	</tr>
</table>
<div class="row">
	  			<div class="col-md-4 transbox" align="center" style="color:beige;background-color: #3C3C3C;width: 100%">
	  			<div style="opacity: 1.0;">
	  				<h1>+ Transaction</h1>
	  				<input type="text" placeholder="Enter shop id" id="shopId" list="item" style="font-size: 20px;color: black" onKeyPress="eSearchShop(event,shopId.value)"><br><bR>
	  				<datalist id="item">
   					<?php
						$sqlItems = "SELECT * FROM shop";
						$queryItems = $conn->query($sqlItems);
						while($rowItems = mysqli_fetch_assoc($queryItems)){
							?>
							<option  value="<?php echo($rowItems['id']) ?>"><?php echo($rowItems['name']) ?></option>
							<?php
							}
					?>
    			
  					</datalist>
					<input type="button" class="button button1" value="Next" onClick="sellPageGet(shopId.value)">
					
					
<!--
					<br><br>
					or
					<h1>Search Shops</h1>
					<input id="itemId"  name="item" style="font-size: 20px;color: black;" onKeyPress="enterFindItemNameForVehicleLoading(event,itemId.value,<?php echo($vehicleId) ?>)">
-->
  					
				</div>
				</div>
			</div>
</div></center>
<br>
<br>


