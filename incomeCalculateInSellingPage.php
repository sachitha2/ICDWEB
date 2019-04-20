<?php
///today income calculating
function todayIncome(){
		include("db.php");
		//taking yesterday income
		$sqlGetYesterDayIncome = "SELECT SUM(amount * selling_price) FROM sell WHERE date = (curdate()-1)";
		$resultGetYesterDayIncome = $conn->query($sqlGetYesterDayIncome);
		
		$numRowGetYesterDayIncome = mysqli_fetch_assoc($resultGetYesterDayIncome);
		$yesterDayIncome =  $numRowGetYesterDayIncome['SUM(amount * selling_price)'];
	
		//ending of taking yesterday income
		//getting today income
		$sqlGetTodayDayIncome = "SELECT SUM(amount * selling_price) FROM sell WHERE date = (curdate())";
		$resultGetTodayDayIncome = $conn->query($sqlGetTodayDayIncome);
		
		$numRowGetTodayDayIncome = mysqli_fetch_assoc($resultGetTodayDayIncome);
		$todayIncome  =  $numRowGetTodayDayIncome['SUM(amount * selling_price)'];
		//ending of getting today income
		//deciding null or not
		if($todayIncome != NULL && $yesterDayIncome != NULL){
			$percent = ($todayIncome/$yesterDayIncome)*100;
			//echo("today income $todayIncome <br>");
			//echo("yday income $yesterDayIncome <br>");
			upDownEqualDecide($todayIncome,$yesterDayIncome);
			echo("<br>");
			echo("<strong style='color:red;'>".$todayIncome."<strong>");
		}
		//null or not deciding ending
	}
//today income calculating ending
///This month income calculating
function thisMonthInCome(){
	include("db.php");
		//taking yesterday income
		$sqlGetPriviousMonthIncome = "SELECT SUM(amount * selling_price) FROM sell WHERE MONTH(date) = (MONTH(curdate())-1)";
		$resultGetPriviousMonthIncome = $conn->query($sqlGetPriviousMonthIncome);
		$numRowGetPriviousMonthIncome = mysqli_fetch_assoc($resultGetPriviousMonthIncome);
		$priviousMonthIncome =  $numRowGetPriviousMonthIncome['SUM(amount * selling_price)'];
		//ending of taking yesterday income
		//getting today income
		$sqlGetThisMonthIncome = "SELECT SUM(amount * selling_price) FROM sell WHERE MONTH(date) = MONTH(curdate())";
		$resultGetThisMonthIncome = $conn->query($sqlGetThisMonthIncome);
		$numRowGetThisMonthIncome = mysqli_fetch_assoc($resultGetThisMonthIncome);
		$thisMonthInCome  =  $numRowGetThisMonthIncome['SUM(amount * selling_price)'];
		//ending of getting today income
		//deciding null or not
		if($thisMonthInCome != NULL ){
			$percent = ($thisMonthInCome/$priviousMonthIncome)*100;
			//echo("today income $thisMonthInCome <br>");
			//echo("yday income $priviousMonthIncome <br>");
			upDownEqualDecide($thisMonthInCome,$priviousMonthIncome);
			echo("<br>");
			echo("<strong style='color:red;'>".round($thisMonthInCome,2)."<strong>");
		}
		//null or not deciding ending
}
///year income calculating
function yearIncomeCalculating(){
	include("db.php");
		//taking yesterday income
		$sqlGetPriviousYearIncome = "SELECT SUM(amount * selling_price) FROM sell WHERE YEAR(date) = (YEAR(curdate())-1)";
		$resultGetPriviousYearIncome = $conn->query($sqlGetPriviousYearIncome);
		$numRowGetPriviousYearIncome = mysqli_fetch_assoc($resultGetPriviousYearIncome);
		$priviousYearIncome =  $numRowGetPriviousYearIncome['SUM(amount * selling_price)'];
		//ending of taking yesterday income
		//getting today income
		$sqlGetThisYearIncome = "SELECT SUM(amount * selling_price) FROM sell WHERE YEAR(date) = YEAR(curdate())";
		$resultGetThisYearIncome = $conn->query($sqlGetThisYearIncome);
		$numRowGetThisYearIncome = mysqli_fetch_assoc($resultGetThisYearIncome);
		$thisYearInCome  =  $numRowGetThisYearIncome['SUM(amount * selling_price)'];
		//ending of getting today income
		//deciding null or not
		if($thisYearInCome != NULL ){
			$percent = ($thisYearInCome/$priviousYearIncome)*100;
			//echo("today income $thisYearInCome <br>");
			//echo("yday income $priviousYearIncome <br>");
			upDownEqualDecide($thisYearInCome,$priviousYearIncome);
			echo("<br>");
			echo("<strong style='color:red;'>".round($thisYearInCome,2)."<strong>");
		}
		//null or not deciding ending
}
///year income calculating ending
///loadItems
function loadItems(){
	include("db.php");
	$sql = "SELECT * FROM item WHERE status = 1";
	$result = $conn->query($sql);
	echo("<ol>");	
	$numRows = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		$itemName = $row['name'];
		$itemId = $row['id'];
		echo("<li>");
		?>
		<div id="IVIT<?php echo($row['id']) ?>">
			<?php echo($row['name']);?>
			<img src="icons/blackDownArrow.png" width="40px" height="40px"  onClick="toggleItemViseIncomeTodaySub(<?php echo($row['id']) ?>,<?php echo("'$itemName'") ?>)">
		</div>
		
		
		<div style="display: none;height: 450px;" id="toggleItemViseIncomeTodaySub<?php echo($row['id']) ?>">
			<table width="100%" border="1" id="table">
				<tr>
					<?php
						$total = array();
						for($x=7;$x>=0;$x--){
						$sqlGetSum = "SELECT SUM(amount * selling_price) FROM sell WHERE date = DATE_SUB(curdate(), INTERVAL $x DAY) AND item_id = $itemId ";
						$resultGetSum = $conn->query($sqlGetSum);
						$rowGetSum = mysqli_fetch_assoc($resultGetSum);
							$total["$x"] = $rowGetSum['SUM(amount * selling_price)'];
							//echo("<br>");
							//echo($total["$x"]);
						}
						for($x=6;$x>=0;$x--){
							//echo($x);
							$sql2 = "SELECT * FROM sell WHERE date = DATE_SUB(curdate(), INTERVAL $x DAY) AND item_id = $itemId; ";
							$result2 = $conn->query($sql2);
							$row2 = mysqli_fetch_assoc($result2);
							?>
							<th style="font-size: 17px;"><?php echo($row2['date']); ?></th>
							<?php
						}
					?>
				</tr>
				<tr>
						<?php
							for($x=6;$x>=0;$x--){
								?>
								<td  valign="bottom"  style="font-size: 14px">
								<center>
								<?php
								echo($total[$x]);
								echo("<br>");
								echo(round(upDownEqualDecide($total[$x],$total[$x+1]),2));
								echo("</center></td>");
							}
						?>
				</tr>
				<tr>
					<td colspan="7">
						<div id='line_top_x'></div>
					</td>
				</tr>
			</table>
		</div>
		<?php
		echo("</li>");
		 }
	echo("</ol>");
}
function upDownEqualDecide($currentVal,$priviousVal){
			
			if($currentVal == NULL || $priviousVal == NULL){
				echo("Values are null");
			}
			else{
				$percent = round((($currentVal / $priviousVal) * 100),2);
			//UP Income
				if($currentVal > $priviousVal){
					echo(" + ".round($percent,2)."%<br>");
					echo("<img src='icons/upArrow.png' width='20' heigh='20'>");
				}
			//UP Income ending
			//Equal Income
				else if($currentVal == $priviousVal){
					echo(round($percent,2)."%<br>");
					echo("<img src='icons/' width='20' heigh='20'>");
				}
			//equal income ending
			//down income
			else{
				echo(" - ".round($percent,2)."%<br>");
				echo("<img src='icons/downArrow.png' width='20' heigh='20'>");
			}
			//down income ending
			}
			
}
///ending of load items
?>