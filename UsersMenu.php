<?php
include("func/basic.class.php");

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


<?php 
$menu = new basic;
$menu->menuBar("User Menu","BackToSettingsMenu()");
?>
<div onClick="addUserPageLoader()" id="addPageLoaderId" class="tileButton addusersBack"><br><div class="btnTxtP">Add User</div></div>


<div onClick="deleteUserPageLoader()" id="" class="tileButton addShopDelBack"><br><div class="btnTxtP">Remove User</div></div>


<div onClick="editUserPageLoader()" id="" class="tileButton addEditShopBack"><br><div class="btnTxtP">Edit User</div></div>


<div onClick="viewUsersPageLoader()" id="" class="tileButton viewShopBack"><br><div class="btnTxtP">View Users</div></div>