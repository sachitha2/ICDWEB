<?php
class DB{
	
	public $conn;
  function dataConn($x){
	  $this->conn = $x;
	  
	  
  }
	
	function selectAll($sql){
	  $sql = "SELECT * FROM `cost`";
	  $result = $this->conn->query($sql);
	  while($row = mysqli_fetch_assoc($result)){
		  echo($row['id']);
	  }
	}
	
	function getItemNameByStockId($id,$d = 1){
		///note chatson this is item
		$sql = "SELECT * FROM `item` WHERE `id` = $id";
	  	$result = $this->conn->query($sql);
	  	while($row = mysqli_fetch_assoc($result)){
			
			$sqlItemType = "SELECT * FROM `item_type` WHERE `id` = ".$row['itemTypeId']."";
			$resultItemType = $this->conn->query($sqlItemType);
			$rowItn = mysqli_fetch_assoc($resultItemType);
		  $name =$rowItn['name']."-".$row['name'];
	  	}
		if($d == 0){
			return($name);
		}else{
			echo($name);
		}
		
	}	
	function getNumRow($sql){
		
		$rusrlt = $this->conn->query($sql);
		$numRow = mysqli_num_rows($rusrlt);
		return($numRow);
	}
	function getShopNameById($id){
		$sql = "SELECT * FROM shop WHERE id = $id";
	  	$result = $this->conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return($row['name']);
	}
	function getRootNameById($id){
		$sql = "SELECT * FROM root WHERE id = $id";
	  	$result = $this->conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return($row['name']);
	}
	function getItemNameFromStockId($id){
		$sql ="SELECT * FROM `t_stock` WHERE `id` = $id";
		$result = $this->conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		//echo($row['item_id']);
		//echo($id);
		$id = $row['item_id'];
		$this->getItemNameByStockId($id);
	}
	function getSumOfATable($table,$col,$logic){
		$sql = "SELECT SUM($col) FROM $table $logic";
		$result = $this->conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return($row['SUM('.$col.')']);
	}
	function getCreditOfShopFromId($id){
		$sql ="SELECT credit FROM shop WHERE id = $id";
		$result = $this->conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return($row['credit']);
	}
	function getItemIdFromstockId($stockId){
		$sql ="SELECT * FROM t_stock WHERE id = $stockId";
		$result = $this->conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return($row['item_id']);
	}
	function slctOneClmnFTbl($table,$col,$logic){
		$sql = "SELECT $col FROM $table $logic";
		$result = $this->conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return($row[$col]);
	}
	function delById($table,$logic){
		$sql = "DELETE FROM $table $logic";
		$result = $this->conn->query($sql);
		return($result);
	}
	function select($table,$logic){
		 $sql = "SELECT * FROM {$table} {$logic}"; 
		 $result = $this->conn->query($sql);
		 
		 $ar = array();
		 $x = 0;
	  	 while($row = mysqli_fetch_assoc($result)){
		  	 $ar[$x] = $row;
			 $x++;
	  	 }
		return($ar);
	}
}

