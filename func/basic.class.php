<?php

class basic{
	function menuBar($name,$link){
		
		?>
			<hr width="100%">
			<img src="back.png" width="90" height="90" onClick="<?php echo($link) ?>" class="floateLeft" style="cursor: pointer">
			<div class="mainHeadDiv"><?php echo($name) ?></div>
			<hr width="100%">

		<?php
	}
	function modal(){
		?>
		 <div id="myModal" class="modal">

  		<!-- Modal content -->
  		<div class="modal-content" id="mainModal" style="background-color: ;">
  			<center>
  				<span class="close" onClick="hideModal()">&times;</span>
    			<div class="" id="modalContent">
    			<h1>Loading</h1>
    
    		</div>
  			</center>
  			
  		</div>

		</div>
		<?php
	}
	function noDtaF(){
		?>
		<center>
			<img src="img/nodata.jpg"  width="400" height="200" >
		</center>
		<?php
	}
	function disNon(){
		?>
		style="display: none"
		<?php
	}
	function third($heading,$button,$data){
		?>
		<div class="third">
				<div class="card-header" style="border-bottom: solid 1px black">
        			<h1 class="my-0 font-weight-normal text-primary"><?php echo($heading) ?></h1>
        		</div>
        	<h1 class="card-title pricing-card-title"><?php echo($data) ?></h1>
        	<?php
				if($button['view'] != ''){?>
					<button type="button" onClick="<?php echo($button['view'] )  ?>" class="btn btn-primary btn-lg">View</button>
			<?php	}?>
       		<?php if($button['add'] !=''){
				?>
					<button type="button" onClick="<?php echo($button['add'] )  ?>" class="btn btn-primary btn-lg">Add</button>	
				<?php	}?>
        	
        	<?php if($button['add'] !=''){
				?>
					<button type="button" onClick="<?php echo($button['edit'] )  ?>" class="btn btn-primary btn-lg">Edit</button>
				<?php	}?>
        	
		</div>
		<?php
	}
}

?>