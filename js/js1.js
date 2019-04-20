url = "http://icd.infinisolutionslk.com/";
var wid = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth ;

function backToShopsMenu(){
	shopMenuLoading();
}
function backToItemsMenu(){
	itemsMenuLoading();
}
function backToItemTypesMenu(){
	itemTypesMenuLoading();
}
function backToVehiclesMenu(){
	vehiclesMenuLoading();
}
function backToRoutesMenu(){
	routesMenuLoading();
}
function backToUsersMenu(){
	usersMenuLoading();
}
function BackToSettingsMenu(){
	settingsSubMenu();
}
	
function editRoot() {
  
  var xhttp;
  var str1 = document.getElementById("Root").value;
  var str2 = document.getElementById("NewRoot").value;
  

  if (!(str1=="" || str2=="")){
  console.log(str1);
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
      		
				if (this.responseText=="Changes have been saved successfully"){
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Changes have been saved successfully</div>";
	 				document.getElementById("OutRoot").innerHTML = "Root name changed into : " + str2;
				}else {
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
				
    		}
  		};
  		xhttp.open('GET', url+"EditRoot.php?Root="+str1+"&NewRoot="+str2, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill the above field";
  }
	
}
function enterEditRoot(e) {
  if (e.which == 13) {editRoot(); }
}
function getRoutesPageLoader(){
			ajaxCommonGetFromNet(url+"ShowRoot.php", "mainStage");
}
function editRoutePageLoader(){
			ajaxCommon("EditRoot.html", "mainStage");
}

	
function removeRoot() {
  loadingModal();
  var xhttp;
  var str1 = document.getElementById("Name").value;

  if (!(str1=="")){
  
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				document.getElementById("Name").value = "";
				hideModal();
				if (this.responseText=="Root was removed successfully"){
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Root was removed successfully</div>";
	 				
				}else {
					
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
      		
    		}
  		};
  		xhttp.open('GET', url+"RemoveRoot.php?Name="+str1, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill the above field";
  }
	
}
function enterRemoveRoot(e) {
  if (e.which == 13) { removeRoot(); }
}
function deleteRoutePageLoader(){
			ajaxCommon("RemoveRoot.html", "mainStage");
}
function removeUser() {
  showModal();
  document.getElementById("modalContent").innerHTML = "<img src='load.gif' >";
  var xhttp;
  var str1 = document.getElementById("UserName").value;

  if (!(str1=="")){
  
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				hideModal();
				document.getElementById("UserName").value = "";
				if (this.responseText=="User was removed successfully"){
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>User was removed successfully</div>";
	 				
				}else {
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
      		
    		}
  		};
  		xhttp.open('GET', url+"RemoveUser.php?UserName="+str1, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill the above field";
  }
	
}
function enterRemoveUser(e) {
  if (e.which == 13) { removeUser(); }
}

function deleteUserPageLoader(){
			ajaxCommon("RemoveUser.html", "mainStage");
}
function enterEditUser(e) {
  if (e.which == 13) { editUser(); }
}

function enter2EditUser(e) {
  if (e.which == 13) { save(); }
}
function editUser() {
  document.getElementById("mainModal").innerHTML = "<img src='load.gif' ><h1 style='color:black'>Loading...Please wait</h1>";
  showModal();
  var xhttp;
  str1 = document.getElementById("UserName").value;
  var str2 = document.getElementById("Password").value;

  if (!(str1=="")){
  
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				hideModal();
      		//document.getElementById("errorMessage").innerHTML = this.responseText;
	 		//document.getElementById("UserName").value = "";
			//this.responseText;
				if (this.responseText=="Invalid Username" || this.responseText=="Invalid Password"){
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}else{
					document.getElementById("show").innerHTML = this.responseText;
				}
	  
    		}
  		};
  		xhttp.open('GET', url+"EditUser.php?UserName="+str1+"&Password="+str2, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill all the fields";
  }
	
}

function save(){
  loadingModal();
  var xhttp;
  var str2 = document.getElementById("NIC_Number").value;
  var str3 = document.getElementById("Phone").value;
  var str4 = document.getElementById("Type").value;
  var str5 = document.getElementById("Password").value;
  var str6 = document.getElementById("ReenterPassword").value;
	

  if (!(str6=="" || str2=="" || str3=="" || str4=="" || str5=="")){
  
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				document.getElementById("mainModal").innerHTML = "<h1 style='color:black'>Data successfully updated</h1>";
				setTimeout(backToUsersMenu,1000);
				
				 document.getElementById("NIC_Number").value = "";
  				 document.getElementById("Phone").value = "";
  				 document.getElementById("Type").value = "";
  				 document.getElementById("Password").value = "";
  				 document.getElementById("ReenterPassword").value = "";
				if (this.responseText=="Changes have been saved successfully"){
					
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Changes have been saved successfully</div>";
					
	 				//document.getElementById("UserName").value = "";
					
					var abc;
	  				if (str4==1){
						abc = "Employee";
					}else if (str4==2){
						abc = "Owner";
					}else if (str4==3){
						abc = "Driver";
					}
		
	  				document.getElementById("OutType").innerHTML = "Type : " + abc;
				}else {
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
      		
	  
    		}
  		};
  		xhttp.open('GET',url + "EditUser2.php?UserName="+str1+"&NIC_Number="+str2+"&Phone="+str3+"&Type="+str4+"&Password="+str5+"&ReenterPassword="+str6, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill all the field";
  }
}

function editUserPageLoader(){
			ajaxCommon("EditUser.html", "mainStage");
}
function shopMenuLoading(){
			ajaxCommon("shopMenu.php", "mainStage");
}

function pastShopCreditsAddpageLoading(){
			
			ajaxCommon("pastShopCreditsSelectShop.php", "mainStage");
}
function itemsMenuLoading(){
			ajaxCommon("itemsMenu.php", "mainStage");
}
function itemTypesMenuLoading(){
			ajaxCommon("itemTypesMenu.php", "mainStage");
}
function vehiclesMenuLoading(){
			ajaxCommon("vehiclesMenu.php","mainStage");
}
function routesMenuLoading(){
			ajaxCommon("RoutesMenu.php","mainStage");
}
function usersMenuLoading(){
			ajaxCommon( "UsersMenu.php","mainStage");
}
function viewUsersPageLoader(){
			ajaxCommonGetFromNet(url+"ShowUser.php","mainStage");
}
function enterAddVehicle(e) {
  if (e.which == 13) { addVehicle();}
}
function enterAddUser(e) {
  if (e.which == 13) { addUser(); }
}
	
function addUser(){
  showModal();
  document.getElementById("modalContent").innerHTML = "<img src='load.gif' >";
  var xhttp;
  var str1 = document.getElementById("UserName").value;
  var str2 = document.getElementById("NIC_Number").value;
  var str3 = document.getElementById("Phone").value;
  var str4 = document.getElementById("Password").value;
  var str5 = document.getElementById("ReenterPassword").value;
  var str6 = document.getElementById("Type").value;
	
  if (!(str1=="" || str2=="" || str3=="" || str4=="" || str5=="" ||  str6=="")){
	  
	   	xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
      		hideModal();
			//document.getElementById("UserName").value = "";
	  		document.getElementById("Password").value = "";
	  		document.getElementById("ReenterPassword").value = "";
				
				document.getElementById("errorMessage").innerHTML = this.responseText;
				document.getElementById("UserName").value = ""
  			    document.getElementById("NIC_Number").value = "";
                document.getElementById("Phone").value = "";
	  
				/*if (this.responseText=="User was registered successfully"){
					hideModal();
					//document.getElementById("modalContent").innerHTML = "<div style='color: blue;font-size:30px'>User was registered successfully<br>Username "+str1+"</div>";
					 document.getElementById("UserName").value = ""
  			         document.getElementById("NIC_Number").value = "";
                     document.getElementById("Phone").value = "";
                     document.getElementById("Password").value = "";
                     document.getElementById("ReenterPassword").value = "";
					//document.getElementById("OutName").innerHTML = "User Name : " + str1;
	    			//document.getElementById("OutNIC").innerHTML = "NIC Number : " + str2;
	    			//document.getElementById("OutPhone").innerHTML = "Phone Number : " + str3;
			
					
	  				document.getElementById("OutType").innerHTML = "Type : " + abc;
					document.getElementById("DelUser").innerHTML = "<button class='button button1 delButton' type='button' onClick='delUser()'>Delete User</button>";
				}else{
					hideModal();
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}*/
				
    		}
  		};
  		xhttp.open('GET', url+"AddUser.php?UserName="+str1+"&NIC_Number="+str2+"&Phone="+str3+"&Password="+str4+"&ReenterPassword="+str5+"&Type="+str6, true);
  		xhttp.send();   
	
	    
	  
  }else{
	  document.getElementById("errorMessage").innerHTML = "Please fill all the fields";
  }
}
	

function delUser(){
	var xhttp;
  	var str1 = document.getElementById("UserName").value;
	
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var msg = this.responseText;
			alert(msg);
		}	
	};
	xhttp.open('GET', "RemoveUser.php?UserName="+str1, true);
  	xhttp.send();
}
function addUserPageLoader(){
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
        		document.getElementById("mainStage").innerHTML  =  this.responseText;
				
           		}
        	};
        	xmlhttp.open("GET", "AddUser.html" , true);//generating  get method link
        	xmlhttp.send();
}
function enterAddShop(e) {
  if (e.which == 13) { addShop(); }
}
	
function addShop() {
  
  var xhttp;
  var str1 = document.getElementById("Name").value;
  var str2 = document.getElementById("Address").value;
  var str3 = document.getElementById("Phone").value;
  var str4 = document.getElementById("NIC_Number").value;
  var str5 = document.getElementById("Root_Id").value;
	
   

	
if (!(str1=="" || str2=="" || str3=="" || str4=="" || str5=="")){
	    showModal();
  	    document.getElementById("modalContent").innerHTML = "<img src='load.gif' >";
	   	xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
      			hideModal();
					document.getElementById("Name").value = "";
					document.getElementById("Address").value = "";
  					document.getElementById("Phone").value = "";
  					document.getElementById("NIC_Number").value = "";
			//giving out put
			if (this.responseText=="Shop was registered successfully"){
					
	
				
				
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Shop was registered successfully</div>";
					document.getElementById("OutName").innerHTML = "Shop Name : " + str1;
	    			document.getElementById("OutAddress").innerHTML = "Address : " + str2;
	    			document.getElementById("OutPhone").innerHTML = "Phone Number : " + str3;
					document.getElementById("OutNIC").innerHTML = "Owner's NIC Number : " + str4;
	    			document.getElementById("OutRoot").innerHTML = "Root ID : " + str5;
					document.getElementById("DelShop").innerHTML = "<button class='button button1 delButton' type='button' onClick='delShop()'>Delete Shop</button>";

			}else {
				document.getElementById("errorMessage").innerHTML = this.responseText;
			}
				
    		}
  		};
  		xhttp.open('GET', url+"AddShop.php?Name="+str1+"&Address="+str2+"&Phone="+str3+"&NIC_Number="+str4+"&Root_Id="+str5, true);
  		xhttp.send();   
	
  }else{
	  document.getElementById("errorMessage").innerHTML = "Please fill all the fields";
  }
}
	
function delShop(){
	var xhttp;
  	var str1 = document.getElementById("Name").value;
	
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var msg = this.responseText;
			alert(msg);
		}	
	};
	xhttp.open('GET', "RemoveShop.php?Name="+str1, true);
  	xhttp.send();
}
	
function showRoot(){
	var xhttp;
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("show").innerHTML=this.responseText;
			//document.getElementById("show").innerHTML="111";
		}	
	};
	xhttp.open('GET', "ShowRoot.php", true);
  	xhttp.send();
}	
	
function addShopPageLoader(){
	
	
			if(navigator.onLine){
					loadingModal();
			
					var xmlhttp = new XMLHttpRequest();
        			xmlhttp.onreadystatechange = function() {
        			if (this.readyState === 4 && this.status == 200) {
        				document.getElementById("mainStage").innerHTML  =  this.responseText;
						hideModal();
           				}
        			};
        		xmlhttp.open("GET", url+"AddShopInterface.php" , true);//generating  get method link
        		xmlhttp.send();
			 }
			else {
  				document.getElementById("mainModal").innerHTML = "<span class='close' onClick='hideModal()'>×</span><img src='noNet.png'><h1 style='color:black'>There is no Internet connection</h1>";
  					showModal();
 				}
			
}
function enterAddRoot(e) {
  if (e.which == 13) { addRoot(); }
}
	
	
function addRoot() {
  loadingModal();
  var xhttp;
  var str1 = document.getElementById("Root").value;
	
  if (!(str1=="")){
	
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        	hideModal();
	   // document.getElementById("UserName").value = "";
		  
		if (this.responseText=='Root was registered successfully'){
			showModal();
			document.getElementById("modalContent").innerHTML = "<div style='color: blue'>Root was registered successfully</div>";
			//document.getElementById("OutName").innerHTML = "Root Name : " + str1;
			//document.getElementById("DelRoot").innerHTML = "<button class='button button1 delButton' type='button' onClick='delRoot()'>Delete Root</button>";
			
		}else {
			document.getElementById("errorMessage").innerHTML = this.responseText;
			document.getElementById("Root").value = "";
		}
	  
      }
    };
    xhttp.open('GET', url+"AddRoot.php?Root="+str1, true);
    xhttp.send();   
  }else{
	    document.getElementById("errorMessage").innerHTML = "Please fill all the fields";
  }
	
}
	
function delRoot(){
	var xhttp;
  	var str1 = document.getElementById("Root").value;
	
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("mainStage").innerHTML  =  this.responseText;
		}	
	};
	xhttp.open('GET', url+"RemoveRoot.php?Name="+str1, true);
  	xhttp.send();
}
	
function addRootPageLoader(){
			ajaxCommon("AddRoot.html", "mainStage");
}
function getShopIdTotransActionPage(){
	shopId = document.getElementById("ShopId").value;
	if(shopId == ""){
		alert("Enter shop id");
	}
	else{
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
        		document.getElementById("mainStage").innerHTML  =  this.responseText;
				
           		}
        	};
        	xmlhttp.open("GET", "addTransactionsToShop.php?shopId="+shopId , true);//generating  get method link
        	xmlhttp.send();
	}
	
}
function addTransactionPageLoader(){
			ajaxCommon("addTransactionPage.php", "mainStage");
}
function addVehicle(){
	vehicleNumber = document.getElementById("vehicleNumber").value;
	if(vehicleNumber == ""){
		alert("Enter Vehicle Number");
		
	}else{
		//send data to database
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
        		//document.getElementById("mainStage").innerHTML  =  this.responseText;
				showModal();
				document.getElementById("modalContent").innerHTML =this.responseText;
				
           		}
        	};
        	xmlhttp.open("GET",url + "addVehicle.php?vehicleNumber="+vehicleNumber , true);//generating  get method link
        	xmlhttp.send();
	}
}
function addVehiclePageLoader(){
			ajaxCommon("addVehiclePageLoader.php", "mainStage");
}
			

function viewItems(){
			ajaxCommon("viewItems.php", "mainStage");
}
function itemTypesDelete(id,address,tableName){
	commonDel(id,address,tableName);
	viewItemTypes();
	
}
function addItemPageLoader(){
			ajaxCommonGetFromNet(url+"addItemPhp.php", "mainStage");
}
function e(event){
		var x = event.which || event.keyCode;
		if(x == 13){
			addItemType();
		}
}
function eAddItem(event){
		var x = event.which || event.keyCode;
		if(x == 13){
			addItem();
		}
}
	function dbClickForm(id,type,func,value){
		document.getElementById(id).innerHTML = '<input type="number" value="'+value+'"><input type="button" value="save">';
		
	}
/*function loadItemTypeList(){
		
		//calling ajax request
				//-----------------------------------------------------------------------------------
				//sending and receiving data from php file starting
				//-----------------------------------------------------------------------------------
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
        		if (this.readyState == 4 && this.status == 200) {
								document.write(this.responseText);
           			}
        		};
        		xmlhttp.open("GET","loadItemTypeList.php", true);//generating  get method link
        		xmlhttp.send();//sending data
				//-----------------------------------------------------------------------------------
					//sending and receiving data from php file ending
				//-----------------------------------------------------------------------------------
}*/
	function commonDel(id,tableName){
				var conformation;
    var r = confirm("Press OK To Delete!");
    if (r == true) {
        
    

				//calling ajax request
				//-----------------------------------------------------------------------------------
				//sending and receiving data from php file starting
				//-----------------------------------------------------------------------------------
				address = "http://icd.infinisolutionslk.com/del.php";
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
        		if (this.readyState == 4 && this.status == 200) {
						if(tableName == "shop"){
							
							ajaxCommonGetFromNet('http://icd.infinisolutionslk.com/ShowShop.php','mainStage');
						}
        				//rFunc;	
						//document.getElementById("msg").innerHTML = this.resoponseText;
						return 1;
					}else{
						return 0;
					}
        		};
        		xmlhttp.open("GET", address+"?id="+id+"&tableName="+tableName, true);//generating  get method link
        		xmlhttp.send();//sending data
				//-----------------------------------------------------------------------------------
					//sending and receiving data from php file ending
				//-----------------------------------------------------------------------------------
				} else {
        conformation = "You pressed Cancel!";
    }
	}
//add item js function
	function addItem(){
		loadingModal();
		itemName = document.getElementById("itemName").value;
		type = document.getElementById("itemTypesList").value;
		//validating the value of itemName inpuput field
			if(itemName == ''){
				alert("Text field is null");
			}
		//validating ending
			else{
				//if valid
				//calling ajax request
				//-----------------------------------------------------------------------------------
				//sending and receiving data from php file starting
				//-----------------------------------------------------------------------------------
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
        		if (this.readyState == 4 && this.status == 200) {
					//showModal();
					hideModal();
        			document.getElementById("errorMessage").innerHTML=  this.responseText;
					document.getElementById("itemName").value ="";
           			}
        		};
        		xmlhttp.open("GET", url+"addItem.php?itemId="+type+"&iName="+itemName , true);//generating  get method link
        		xmlhttp.send();//sending data
				//-----------------------------------------------------------------------------------
					//sending and receiving data from php file ending
				//-----------------------------------------------------------------------------------
			}
	}
//add item js function
//add item type js funcion
	function addItemType(){
		loadingModal();
		itemName = document.getElementById("itemTypeName").value;
		
		//validation starting
		if(itemName == ''){
			//showModal();
			document.getElementById("errorMessage").innerHTML = "Enter a Item Name";
		}
		//validation ending
		else{
			//-----------------------------------------------------------------------------------
				//sending and receiving data from php file starting
			//-----------------------------------------------------------------------------------
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState == 4 && this.status == 200) {
				hideModal();
        		//alert( this.responseText);
				//showModal();
				document.getElementById("errorMessage").innerHTML = this.responseText;
				
				document.getElementById("itemTypeName").value ="";
           		}
        	};
        	xmlhttp.open("GET",url + "addItemType.php?iName="+itemName, true);//generating  get method link
        	xmlhttp.send();//sending data
			//-----------------------------------------------------------------------------------
					//sending and receiving data from php file ending
			//-----------------------------------------------------------------------------------
			
		}
		
	}
//additem type js function
function settingsSubMenu(){
			if(wid <= 600){
				menuHS();	
			}
			
			ajaxCommon("settingsMenu.php", "mainStage");
			$("#dashInSubMenuId").css("background-color", "#3C3C3C");
			$("#costInSubMenuId").css("background-color", "#3C3C3C");
			$("#sellInSubMenuId").css("background-color", "#3C3C3C");
			$("#stockMenuId").css("background-color", "#3C3C3C");
			$("#settingInSubMenuId").css("background-color", "#0E0E0E");
}
function sellingSubMenu(){
			if(wid <= 600){
				menuHS();	
			}
			ajaxCommonGetFromNet(url + "sellSubmenu.php", "mainStage");
			$("#dashInSubMenuId").css("background-color", "#3C3C3C");
			$("#costInSubMenuId").css("background-color", "#3C3C3C");
			$("#sellInSubMenuId").css("background-color", "#0E0E0E");
			$("#stockMenuId").css("background-color", "#3C3C3C");
			$("#settingInSubMenuId").css("background-color", "#3C3C3C");
			
}
function costSubMenu(){
			if(wid <= 600){
				menuHS();	
			}
			ajaxCommon("costMenu.php", "mainStage");
			$("#dashInSubMenuId").css("background-color", "#3C3C3C");
			$("#costInSubMenuId").css("background-color", "#0E0E0E");
			$("#sellInSubMenuId").css("background-color", "#3C3C3C");
			$("#stockMenuId").css("background-color", "#3C3C3C");
			$("#settingInSubMenuId").css("background-color", "#3C3C3C");
}
//add btn in menu bar
function dashSubMenu(){
			if(wid <= 600){
				menuHS();	
			}
			
			$("#dashInSubMenuId").css("background-color", "#0E0E0E");
			$("#costInSubMenuId").css("background-color", "#3C3C3C");
			$("#sellInSubMenuId").css("background-color", "#3C3C3C");
			$("#stockMenuId").css("background-color", "#3C3C3C");
			$("#settingInSubMenuId").css("background-color", "#3C3C3C");
			window.location.assign("index.php");
}
function stockMenu(){
			if(wid <= 600){
				menuHS();	
			}
			ajaxCommon("stockMenu.php", "mainStage");
			$("#dashInSubMenuId").css("background-color", "#3C3C3C");
			$("#costInSubMenuId").css("background-color", "#3C3C3C");
			$("#sellInSubMenuId").css("background-color", "#3C3C3C");
			$("#stockMenuId").css("background-color", "#0E0E0E");
			$("#settingInSubMenuId").css("background-color", "#3C3C3C");
}
function loadMainMenu(){
	var menu = '<button class="mainButton" onMouseOver="onHoverDash()" onclick="dashSubMenu()" id="dashInSubMenuId"><img src="dash.png" width="50" height="50"><br>DashBoard</button><button class="mainButton" onMouseOver="onHoverCostMenu()" onclick="costSubMenu()" id="costInSubMenuId"><img src="cost.png" width="50" height="50"><br>Expenses</button><button class="mainButton" onClick="sellingSubMenu()" onMouseOver="onHoverSellingMenu()" id="sellInSubMenuId"><img src="sell.png" width="50" height="50"><br>Trades</button><button class="mainButton" onMouseOver="onHoverStockMenu()" onclick="stockMenu()" id="stockMenuId"><img src="stock.png" width="50" height="50"><br>Stock</button><button class="mainButton" onMouseOver="onHoverSettingsMenu()" onclick="settingsSubMenu()" id="settingInSubMenuId"><img src="setting.png" width="50" height="50"><br>Settings</button><button class="mainButton" onMouseOver="" onclick="logout()" id=""><img src="logout.png" width="50" height="50"><br>Logout</button><div class="collapsMenu" id="collapsMenu">Collaps menu</div>';
	return menu;
	//<button class="mainButton" onClick="addInSubMenu()" id="addInSubMenuId">ADD</button>
}
function viewItemTypes(){
			ajaxCommon("viewItemTypes.php", "mainStage");
}
function addPageLoader(){
			ajaxCommon("addItemTypeHtml.php", "mainStage");
}
function searchShopAvailability(shopId){
			ajaxCommon(url+"searchShop.php?shopId="+shopId, "mainStage");
}
function showVehiclesPageLoader(){
			ajaxCommonGetFromNet(url+"showVehicles.php", "mainStage");
}
function showItemTypesPageLoader(){
			ajaxCommonGetFromNet(url+"viewItemTypes.php", "mainStage");
}
function showItemsPageLoader(){
			ajaxCommonGetFromNet(url+"viewItems.php", "mainStage");
}
function backToCostMenu(){
			costMenuLoading();
}
function costMenuLoading(){
			ajaxCommon("costMenu.php", "mainStage");
}
function addCostPageLoader(){
			ajaxCommonGetFromNet(url+"addCosthtml.php", "mainStage");
}
function costTodayPageLoader(){
			ajaxCommonGetFromNet(url+"costToday.php" , "mainStage");
}
function costSpecificDayPageLoader(){
			ajaxCommon( "costSpecificDay.html", "mainStage");
}
function costThisMonthPageLoader(){
			ajaxCommonGetFromNet(url+"costThisMonth.php", "mainStage");
}
function costSpecificMonthPageLoader(){
			ajaxCommon("costSpecificMonth.html", "mainStage");
}
function deleteItemPageLoader(){
			ajaxCommon("deleteItem.html", "mainStage");
}
function deleteItemTypePageLoader(){
			ajaxCommon("deleteItemType.html", "mainStage");
}
function editItemPageLoader(){
			ajaxCommon("editItem.html", "mainStage");
}
function costPeriodOfTimePageLoader(){
			ajaxCommon("costPeriodOfTime.html", "mainStage");
}
function enterCost(e){
		if (e.which == 13) { addCost(); }
	}
function addCost(){
	var xhttp;
  	var str1 = document.getElementById("Cost").value;
  	var str2 = document.getElementById("Purpose").value;
  	var str3 = document.getElementById("DateTime").value;

		
  		if (!(str1=="" || str2=="" || str3=="")){
			if (!(isNaN(str1))){
	  
	   		xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
      		
				//document.getElementById("UserName").value = "";	
	  				alert(this.responseText);
					/*if (this.responseText=="Cost was added successfully"){
						alert("hrrr");
						document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Cost was added successfully</div>";
						document.getElementById("OutCost").innerHTML = "Cost : " + str1;
	    				document.getElementById("OutPurpose").innerHTML = "Purpose : " + str2;
	    				document.getElementById("OutDateTime").innerHTML = "Date : " + str3;
			
						//document.getElementById("DelUser").innerHTML = "<button class='button button1 delButton' type='button' onClick='delUser()'>Delete User</button>";
					}*/
				
    			}
  			};
  			xhttp.open('GET', url+"addCost.php?Cost="+str1+"&Purpose="+str2+"&DateTime="+str3, true);
  			xhttp.send();   
	
		}else{
			document.getElementById("errorMessage").innerHTML = "Cost should be numeric";
		}
	  
  	}else{
			document.getElementById("errorMessage").innerHTML = "Please fill all the fields";
  	}
}

function enterCostDay(e){
	if (e.which == 13) { viewCostDay(); }
}
	
function viewCostDay(){
	var xhttp;
  	var str1 = document.getElementById("Date").value;

  	if (!(str1=="")){
			
	   		xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
      				document.getElementById("show").innerHTML=this.responseText;
    			}
  			};
  			xhttp.open('GET', url+"costSpecificDay.php?Date="+str1, true);
  			xhttp.send();   
	
			
	  
  	}else{
			document.getElementById("errorMessage").innerHTML = "Please select a date";
  	}
		
}

function viewCostMonth(){
	var xhttp;
  	var str1 = document.getElementById("Year").value;
	var str2 = document.getElementById("Month").value;

  		if (!(str1=="" || str2=="")){
			
	   		xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
      				document.getElementById("show").innerHTML=this.responseText;
    			}
  			};
  			xhttp.open('GET', url+"costSpecificMonth.php?Year="+str1+"&Month="+str2, true);
  			xhttp.send();   
	
			
	  
  		}else{
			document.getElementById("errorMessage").innerHTML = "Please enter year and month";
  		}
		
}
//-----------------------------------------------------------------------------------------------
function enterCostTimePeriod(e){
	if (e.which == 13) { viewCostTimePeriod(); }
}
	
function viewCostTimePeriod(){
	var xhttp;
  	var str1 = document.getElementById("From").value;
	var str2 = document.getElementById("To").value;

  	if (!(str1=="" || str2=="")){
			
	   		xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
      				document.getElementById("show").innerHTML=this.responseText;
    			}
  			};
  			xhttp.open('GET', url+"costPeriodOfTime.php?From="+str1+"&To="+str2, true);
  			xhttp.send();   
	
			
	  
  	}else{
			document.getElementById("errorMessage").innerHTML = "Please select a time period";
  	}
		
}
//-----------------------------------------------------------------------------------------------
function enterEditItemType(e) {
  if (e.which == 13) { editItemType(); }
}

function enter2EditItemType(e) {
  if (e.which == 13) { saveItemType(); }
}
function editItemType() {
  loadingModal();
  var xhttp;
  ItemTypeId = document.getElementById("Id").value;

  if (!(ItemTypeId=="")){
	  	xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				hideModal();
				if (this.responseText=='Invalid ID'){
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}else{
					document.getElementById("show").innerHTML = this.responseText;
				}
    		}
  		};
  		xhttp.open('GET', url + "editItemType.php?Id="+ItemTypeId, true);
  		xhttp.send();  

  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill the above field";
  }
	
}

function saveItemType(){
  loadingModal();
  var xhttp;
  var str2 = document.getElementById("name").value;
  var str3 = document.getElementById("date").value;
  var str4 = document.getElementById("status").value;
	

  if (!(str2=="" || str3=="" || str4=="")){
  
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				document.getElementById("name").value = "";
  				document.getElementById("date").value = "";
  				document.getElementById("status").value = "";
				hideModal();
				if (this.responseText=="Changes have been saved successfully"){
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Changes have been saved successfully</div>";
	 				//document.getElementById("UserName").value = "";
					document.getElementById("OutId").innerHTML = "ID : " + ItemTypeId;
	    			document.getElementById("OutName").innerHTML = "Item Type : " + str2;
	    			document.getElementById("OutDate").innerHTML = "Date : " + str3;
					document.getElementById("OutStatus").innerHTML = "Status : " + str4;

				}else {
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
      		
	  
    		}
  		};
  		xhttp.open('GET',url + "editItemType2.php?id="+ItemTypeId+"&name="+str2+"&date="+str3+"&status="+str4, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill all the field";
  }
}
function enterRemoveItemType(e) {
  if (e.which == 13) { removeItemType(); }
}
function removeItemType() {
  
  var xhttp;
  var str1 = document.getElementById("Id").value;

  if (!(str1=="")){
  
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				if (this.responseText=="Item Type was deleted successfully"){
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Item Type was deleted successfully</div>";
	 				document.getElementById("Id").value = "";
				}else {
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
      		
    		}
  		};
  		xhttp.open('GET', "deleteItemType.php?Id="+str1, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill the above field";
  }
	
}
function enterRemoveItem(e) {
  if (e.which == 13) { removeItem(); }
}
function removeItem() {
  
  var xhttp;
  var str1 = document.getElementById("Id").value;

  if (!(str1=="")){
  
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				if (this.responseText=="Item was deleted successfully"){
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Item was deleted successfully</div>";
	 				document.getElementById("Id").value = "";
				}else {
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
      		
    		}
  		};
  		xhttp.open('GET', "deleteItem.php?Id="+str1, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill the above field";
  }
	
}
function enterEditItem(e) {
  if (e.which == 13) { editItem(); }
}

function enter2EditItem(e) {
  if (e.which == 13) { saveItem(); }
}
function editItem() {
  
  var xhttp;
  ItemId = document.getElementById("Id").value;

  if (!(ItemId=="")){
	  	xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				if (this.responseText=='Invalid ID'){
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}else{
					document.getElementById("show").innerHTML = this.responseText;
				}
    		}
  		};
  		xhttp.open('GET', "editItem.php?Id="+ItemId, true);
  		xhttp.send();  

  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill the above field";
  }
	
}

function saveItem(){
  var xhttp;
  var str2 = document.getElementById("name").value;
  var str3 = document.getElementById("date").value;
  var str4 = document.getElementById("status").value;
  var str5 = document.getElementById("TypeId").value;

  if (!(str2=="" || str3=="" || str4=="" || str5=="")){
  
  		xhttp = new XMLHttpRequest();
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				if (this.responseText=="Changes have been saved successfully"){
					document.getElementById("errorMessage").innerHTML = "<div style='color: blue'>Changes have been saved successfully</div>";
	 				//document.getElementById("UserName").value = "";
					document.getElementById("OutId").innerHTML = "Item ID : " + ItemId;
	    			document.getElementById("OutName").innerHTML = "Item Name : " + str2;
					document.getElementById("OutName").innerHTML = "Item Type ID : " + str5;
	    			document.getElementById("OutDate").innerHTML = "Date : " + str3;
					document.getElementById("OutStatus").innerHTML = "Status : " + str4;

				}else {
					document.getElementById("errorMessage").innerHTML = this.responseText;
				}
      		
	  
    		}
  		};
  		xhttp.open('GET', "editItem2.php?id="+ItemId+"&name="+str2+"&date="+str3+"&status="+str4+"&TypeId="+str5, true);
  		xhttp.send();  
  }else{
	  	document.getElementById("errorMessage").innerHTML = "Please fill all the field";
  }
}
//-----------------------------------------------------------------------------------------------
//javascript ending
function getMainStockPageLoader(){
			ajaxCommon("mainStockPage.php", "mainStage");
}
function BackToStockMenu(){
	stockMenu();
}
function getVehiclePageLoader(){
			ajaxCommonGetFromNet(url+"vehicleStock.php", "mainStage");
}
//phpFileName
//outPutStage

//ajax common getter
function ajaxCommon(phpFileName, outPutStage){
			 //if(navigator.onLine){
  					//alert("Loading");
					var xmlhttp = new XMLHttpRequest();
        			xmlhttp.onreadystatechange = function() {
        			if (this.readyState === 4 && this.status == 200) {
        				document.getElementById(outPutStage).innerHTML  =  this.responseText;
						//alert("loading complete");
           				}
        			};
        			xmlhttp.open("GET", phpFileName, true);//generating  get method link
        			xmlhttp.send();
 				//}
			//else {
  				//alert('offline');
 				//}
			
}
//ending of ajax common getter



//ajax common  loading from net getter
function ajaxCommonGetFromNet(phpFileName, outPutStage){
			 if(navigator.onLine){
					document.getElementById("mainModal").innerHTML = "<center><img src='load.gif' ><h1 style='color:black' class='lImg'>Loading...Please wait</h1></center>";
  					showModal();
					
					var xmlhttp = new XMLHttpRequest();
        			xmlhttp.onreadystatechange = function() {
        			if (this.readyState === 4 && this.status == 200) {
        				document.getElementById(outPutStage).innerHTML  =  this.responseText;
						hideModal();
           				}
        			};
        			xmlhttp.open("GET", phpFileName, true);//generating  get method link
        			xmlhttp.send();
			 }
			else {
  				document.getElementById("mainModal").innerHTML = "<span class='close' onClick='hideModal()'>×</span><img src='noNet.png'><h1 style='color:black'>There is no Internet connection</h1>";
  					showModal();
 				}
			
}
//ending of ajax common Loading from netgetter


function eSearchShop(event,shopId){
		var x = event.which || event.keyCode;
		if(x == 13){
			sellPageGet(shopId);
		}
}
function viewVehicleStock(x){
			document.getElementById("mainModal").innerHTML = "<img src='load.gif' ><h1 style='color:black'>Loading...Please wait</h1>";
  			showModal();
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
        		document.getElementById("mainStage").innerHTML  =  this.responseText;
				//alert("loading complete");
				hideModal();
           		}
        	};
        	xmlhttp.open("GET", url+"viewVehicleStock.php?vehicleId="+x, true);//generating  get method link
        	xmlhttp.send();
	
}
function getItemNameAndAvailability(itemId){
			if(navigator.onLine){
				
				if(itemId == ''){
					alert("enter  a item id");
			}
			else{var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
					document.getElementById("formStage").innerHTML   =   this.responseText;
           		}
        	};
        	xmlhttp.open("GET",url+"updateMainStock.php?itemId="+itemId, true);//generating  get method link
        	xmlhttp.send();
	}
			}else{
				document.getElementById("mainModal").innerHTML = "<span class='close' onClick='hideModal()'>×</span><img src='noNet.png'><h1 style='color:black'>There is no Internet connection</h1>";
  					showModal();
			}
			
}
function updateStock(amount,id,bPrice,exDate){
			showModal();
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
					ajaxCommonGetFromNet(url+'addStock.php', 'mainStage');
					showModal();
					document.getElementById("modalContent").innerHTML   =   this.responseText;
					document.getElementById("formStage").innerHTML  = "";
					document.getElementById("itemId").value = "";
					
					hideModal();
           		}
        	};
        	xmlhttp.open("GET", url+"updateMainStockAmount.php?amount="+amount+"&id="+id+"&bPrice="+bPrice+"&exDate="+exDate, true);//generating  get method link
        	xmlhttp.send();
}
function enterUpdateMainStockItemFinder(e,itemId) {
  if (e.which == 13) {
	  //alert(itemId);
	  getItemNameAndAvailability(itemId);
  }
}
function enterLoadStock(e,amount,itemId,vehicleId) {
  if (e.which == 13) {
	  //alert(itemId);
	  //alert(" " +amount +" " + itemId +""+vehicleId);
	 //loadingGoodsToVehicles(amount,itemId)
	 loadingGoodsToVehicles(amount,itemId,vehicleId);
  }
}
function enterUpdateMainStockItems(e) {
  if (e.which == 13) {
	  amount = document.getElementById("amount").value;
	  id = document.getElementById("itemId").value;
	  updateStock(amount,id);
  }
}
function selectVehicleToAddStocks(){
	ajaxCommonGetFromNet(url+"selectVehicle.php", "mainStage");
}
function addStockToVehiclePage(vehicleId){
	ajaxCommon(url+"putStockToVehicle.php?vehicleId="+vehicleId, "mainStage");
	
	
}
function findItemNameForVehicleLoading(itemId,vehicleId){
	document.getElementById("formStage").innerHTML = "<img src='LO.gif' ><h1>Loading.....</h1>";
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("formStage").innerHTML = this.responseText;
			document.getElementById("amount").focus;
			loadVehicleStockToLoadingPage(vehicleId);
			hideModal();
			
		}	
	};
	xhttp.open('GET',url+"searchAvailabilityOfItemForVehicleStock.php?itemId="+itemId+"&vehicleId="+vehicleId,true);
  	xhttp.send();
}
function enterFindItemNameForVehicleLoading(e,itemId,vehicleId){
	if (e.which == 13) {
	  findItemNameForVehicleLoading(itemId,vehicleId);
  }
}
function loadingGoodsToVehicles(amount,itemId,vehicleId){
	//ajaxCommon("addingStockToVehicle.php?itemAmount="+amount+"&itemId="+itemId, "formStage");
	document.getElementById("formStage").innerHTML = "<img src='LO.gif' ><h1>Adding Items.....</h1>";
	if(amount != 0){
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("formStage").innerHTML = this.responseText;
			loadVehicleStockToLoadingPage(vehicleId);
			document.getElementById("itemId").value = "";
			document.getElementById("itemId").focus;
		}	
	};
	xhttp.open('GET',url+"addingStockToVehicle.php?itemAmount="+amount+"&itemId="+itemId+"&vehicleId="+vehicleId, true);
  	xhttp.send();
}
	else{
		document.getElementById("modalContent").innerHTML = '<br><br><br><br><h1 style="color:white;background-color:red;font-size:100px;">Enter valid Amount</h1>';
		showModal();
	}
}
function loadVehicleStockToLoadingPage(vehicleId){
	
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("vehicleStockTable").innerHTML = this.responseText;
		}	
	};
	xhttp.open('GET',url+"getVehicleStockFromId.php?vehicleId="+vehicleId, true);
  	xhttp.send();
}
function removeItemsFromVehicleStock(id,vehicleId){
	document.getElementById("vehicleStockTable").innerHTML = "<br><br><center><img src='load.gif' ></center><h2>Deleting......</h2>";
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
//			document.getElementById("mainStage").innerHTML = this.responseText;
			loadVehicleStockToLoadingPage(vehicleId);
		}	
	};
	xhttp.open('GET',url+"removeStockFromVehicle.php?id="+id, true);
  	xhttp.send();
}
function checkItemAvailability(itemId,shopId,billNumber){
	document.getElementById("tOutPut").innerHTML ="<img src='LO.gif' ><h1>Loading....</h1>";
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("tOutPut").innerHTML =this.responseText;
		}	
	};
	xhttp.open('GET',url+"checkItemAvailability.php?itemId="+itemId+"&shopId="+shopId+"&billNumber="+billNumber, true);
  	xhttp.send();
}
function enterCheckItemAvailability(e,itemId,shopId,billNumber){
	if (e.which == 13) {
		if(itemId != ""){
			checkItemAvailability(itemId,shopId,billNumber); 
		}
		else{
			alert("enter valid number");
		}
	 
  }
	
}
function sellPageGet(shopId){
	if(shopId != ""){
		ajaxCommon(url+"SellPage.php?shopId="+shopId, "mainStage");
	}
	
}
function getBill(billId,shopId){
	document.getElementById("billTable").innerHTML = "<img src='load.gif' >";
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("billTable").innerHTML = this.responseText;
		}	
	};
	xhttp.open('GET',url + "getBill.php?billId="+billId+"&shopId="+shopId, true);
  	xhttp.send();
}
function addBill(){
	alert("this is add bill");
}
function enterAddBill(e,amount,itemId,shopId,billNumber,itemPriceRangeId){
	if (e.which == 13) {
		
		makeBill(amount,itemId,shopId,billNumber,itemPriceRangeId)
	}
}
function makeBill(amount,itemId,shopId,billNumber,itemPriceRangeId){
	//alert("Amount "+amount +"item id"+itemId+"shop id"+shopId+"billNumber="+billNumber+"itemPriceRangeId"+itemPriceRangeId);
	document.getElementById("tOutPut").innerHTML = "<img src='LO.gif' >";
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);
			document.getElementById("tOutPut").innerHTML = this.responseText;
			document.getElementById("itemId").value = "";
			getBill(billNumber,shopId);
		}	
	};
	xhttp.open('GET',url + "makeBill.php?amount="+amount+"&itemId="+itemId+"&shopId="+shopId+"&billNumber="+billNumber+"&itemPriceRangeId="+itemPriceRangeId, true);
  	xhttp.send();
}
function billHistory(shopId){
	xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);
			document.getElementById("mainStage").innerHTML = this.responseText;
			
		}	
	};
	xhttp.open('GET',url + "shopHistory.php?shopId="+shopId, true);
  	xhttp.send();
}
function getTodayIncome(){
	ajaxCommonGetFromNet(url +"todayIncome.php", "mainStage");
}
function getMonthIncome(){
	ajaxCommonGetFromNet(url + "monthIncomeModified.php","mainStage");
}
function whichButton(event) {
   kCode = event.keyCode;
   if(kCode == 174){
	   dashSubMenu();
   }
	else if(kCode == 175){
		costSubMenu();
	}
	else if(kCode == 177){
		sellingSubMenu();
	}
	else if(kCode == 179){
		stockMenu();
	}
	else if(kCode == 176){
		settingsSubMenu();
	}
	else{
		
	}
}
function onHoverDash(){
			$("#dashInSubMenuId").css("background-color", "#0E0E0E");
			$("#costInSubMenuId").css("background-color", "#3C3C3C");
			$("#sellInSubMenuId").css("background-color", "#3C3C3C");
			$("#stockMenuId").css("background-color", "#3C3C3C");
			$("#settingInSubMenuId").css("background-color", "#3C3C3C");
}
function onHoverCostMenu(){
			$("#dashInSubMenuId").css("background-color", "#3C3C3C");
			$("#costInSubMenuId").css("background-color", "#0E0E0E");
			$("#sellInSubMenuId").css("background-color", "#3C3C3C");
			$("#stockMenuId").css("background-color", "#3C3C3C");
			$("#settingInSubMenuId").css("background-color", "#3C3C3C");
}
function onHoverSellingMenu(){
			$("#dashInSubMenuId").css("background-color", "#3C3C3C");
			$("#costInSubMenuId").css("background-color", "#3C3C3C");
			$("#sellInSubMenuId").css("background-color", "#0E0E0E");
			$("#stockMenuId").css("background-color", "#3C3C3C");
			$("#settingInSubMenuId").css("background-color", "#3C3C3C");
}
function onHoverStockMenu(){
			$("#dashInSubMenuId").css("background-color", "#3C3C3C");
			$("#costInSubMenuId").css("background-color", "#3C3C3C");
			$("#sellInSubMenuId").css("background-color", "#3C3C3C");
			$("#stockMenuId").css("background-color", "#0E0E0E");
			$("#settingInSubMenuId").css("background-color", "#3C3C3C");
}

function onHoverSettingsMenu(){
			$("#dashInSubMenuId").css("background-color", "#3C3C3C");
			$("#costInSubMenuId").css("background-color", "#3C3C3C");
			$("#sellInSubMenuId").css("background-color", "#3C3C3C");
			$("#stockMenuId").css("background-color", "#3C3C3C");
			$("#settingInSubMenuId").css("background-color", "#0E0E0E");
}

function logout(){
	window.location.assign("logout.php");
}
function loadMonthReportBarChart(){
	yearBarChart();
	document.getElementById("barCharts").innerHTML = '<div id="dual_x_div1" style="width: 900px; height: 500px;"><img src="load.gif">Month</div>';
}
function loadYearReportBarChart(){
	 monthBarChart();
	document.getElementById("barCharts").innerHTML = '<div id="dual_x_div2" style="width: 900px; height: 500px;"><img src="load.gif">Year</div>';
}
function showModal(){		
	$( "#myModal" ).show();
}
function hideModal(){
	$( "#myModal" ).hide();
}
function deleteVehiclePageLoader(){
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
        		document.getElementById("mainStage").innerHTML  =  this.responseText;
				
           		}
        	};
        	xmlhttp.open("GET", "removeVehicle.html", true);//generating  get method link
        	xmlhttp.send();
}
function editVehiclePageLoader(){
	ajaxCommon("editVehiclePage.php","mainStage");
}
function toggleItemViseIncomeToday(){
	$("#itemViseIncomeToday").toggle();
	if ( $("#itemViseIncomeToday").css('display') == 'none' ){
    	document.getElementById("IVIToday").innerHTML = '<center>Item vise income - Today<img src="icons/whiteDownArrow.png" width="40px" height="40px"></center>';
	}
	else{
		document.getElementById("IVIToday").innerHTML = '<center>Item vise income - Today<img src="icons/whiteUpArrow.png" width="40px" height="40px"></center>';
	}
}
function toggleItemViseIncomeTodaySub(id,itemName){
	$("#toggleItemViseIncomeTodaySub"+id).toggle();
	if ($("#toggleItemViseIncomeTodaySub"+id).css('display') == 'none' ){
		document.getElementById("IVIT"+id).innerHTML = itemName+'<img src="icons/blackDownArrow.png" width="40px" height="40px"  onClick="toggleItemViseIncomeTodaySub('+id+',\''+itemName+'\')">';
	}
	else{
		document.getElementById("IVIT"+id).innerHTML = itemName+'<img src="icons/blackUpArrow.png" width="40px" height="40px"  onClick="toggleItemViseIncomeTodaySub('+id+',\''+itemName+'\')">';
	}
	drawChartIVT(itemName);
	
}
function loadingModal(){
	document.getElementById("mainModal").innerHTML = "<center><img src='load.gif' class='lImg'><h1 style='color:black'>Loading...Please wait</h1></center>";
  	showModal();
}
function editShop(){
	shopId = document.getElementById("Id").value;
	
	ajaxCommonGetFromNet(url+'EditShop.php?id='+shopId,'mainStage');
}
function enterEditShop(e,shopId){
	if (e.which == 13) {
		
		ajaxCommonGetFromNet(url+'EditShop.php?id='+shopId,'mainStage');
	 
  }
}
function saveInEditShop(shopName,address,phone,idCardN,rootId,id){
	if(shopName != "" && address != "" && phone != "" && (idCardN != "") && rootId != ""){
		if(idCardN.length == 9 || idCardN.length == 12){
			
			if(phone.length == 10){
				loadingModal();
				document.getElementById("errorMessage").innerHTML = "";
				var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
        		if (this.readyState === 4 && this.status == 200) {
        			document.getElementById("errorMessage").innerHTML  =  this.responseText;
					document.getElementById("mainModal").innerHTML = "<h1 style='color:black'>Done updating </h1>";
					hideModal();
					setTimeout(shopMenuLoading,500);
					//to here
           			}
        		};
        		xmlhttp.open("GET", url+"EditShop2.php?Name="+shopName+"&Address="+address+"&Phone="+phone+"&NIC_Number="+idCardN+"&Root_Id="+rootId+"&id="+id, true);//generating  get method link
        		xmlhttp.send();
				
			}else{
				document.getElementById("errorMessage").innerHTML = "phone number not valid";
			}
		}else{
			document.getElementById("errorMessage").innerHTML = "Id card number not valid";
		}
	}else{
		document.getElementById("errorMessage").innerHTML = "Fill all fields";
	}
}
function test(){
	alert("hello sam");
}
function addPriceRange(id){
	document.getElementById("modalContent").innerHTML = "LOADING......";
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				hideModal();
				document.getElementById("mainStage").innerHTML = this.responseText;
  				
				
           		}
        	};
        	xmlhttp.open("GET", url+"editItemsPage.php?id="+id, true);//generating  get method link
        	xmlhttp.send();
}
function saveItemName(name,id){
	document.getElementById("itemNameMsg").innerHTML = "<img src='LO.gif' width='50' height='50'>";
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("itemNameMsg").innerHTML = this.responseText;
  				showModal();
				addPriceRange(id);
           		}
        	};
        	xmlhttp.open("GET", url+"saveItemName.php?name="+name+"&id="+id, true);//generating  get method link
        	xmlhttp.send();
	
}
function editCommon(errorID,id,data,table,name){
	document.getElementById(errorID).innerHTML = "<img src='LO.gif' width='50' height='50'>";
	
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById(errorID).innerHTML = this.responseText;
  				showModal();
				addPriceRange(id);
           		}
        	};
        	xmlhttp.open("GET", url+"commonEdit.php?id="+id+"&table="+table+"&name="+name+"&value="+data, true);//generating  get method link
        	xmlhttp.send();
}
function addItemRange(errorID,id,value){
			document.getElementById(errorID).innerHTML = "<img src='LO.gif' width='50' height='50'>";
			sql = "INSERT INTO item_price_range (id, item_id, price) VALUES (NULL, '"+id+"', '"+value+"');"
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById(errorID).innerHTML = this.responseText;
  				
				addPriceRange(id);
           		}
        	};
        	xmlhttp.open("GET", url+"commonInsert.php?id="+id+"&sql="+sql, true);//generating  get method link
        	xmlhttp.send();
}
function cDel(rId,errorID,id){
			alert("Deleting");
			document.getElementById(errorID).innerHTML = "<img src='LO.gif' width='50' height='50'>";
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById(errorID).innerHTML = this.responseText;
  				showModal();
				addPriceRange(id);
           		}
        	};
        	xmlhttp.open("GET", url+"cDel.php?id="+rId, true);//generating  get method link
        	xmlhttp.send();
}
function editInViewStock(id){
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("modalContent").innerHTML = this.responseText;
  				showModal();
				
           		}
        	};
        	xmlhttp.open("GET", url+"viewStockEdit.php?id="+id, true);//generating  get method link
        	xmlhttp.send();
}

function editVehicle(id){
	document.getElementById("modalContent").innerHTML = "LOADING......";
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("modalContent").innerHTML = this.responseText;
  				showModal();
				
           		}
        	};
        	xmlhttp.open("GET", url+"editIVehicles.php", true);//generating  get method link
        	xmlhttp.send();
}
function viewVehicleHistoryStock(id){
	document.getElementById("modalContent").innerHTML = "LOADING......";
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("mainStage").innerHTML = this.responseText;
  				showModal();
				
           		}
        	};
        	xmlhttp.open("GET", url+"vehicleStockHistory.php", true);//generating  get method link
        	xmlhttp.send();

}
function moveStock(vehicleId,rA,aId,id){
	//moving stock to the main wherehouse
			showModal();
			document.getElementById("modalContent").innerHTML = "LOADING......";
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				
				//document.getElementById("mainStage").innerHTML = this.responseText;
				hideModal();
				viewVehicleStock(vehicleId);
  				
				
           		}
        	};
        	xmlhttp.open("GET", url+"moveStockToMainWhereHouseOneByOne.php?aId="+aId+"&rA="+rA+"&id="+id, true);//generating  get method link
        	xmlhttp.send();
	
	//moving stock to the main wherehouse
}
function stockHistoryByDate(date,vehicleId){
			document.getElementById("modalContent").innerHTML = "LOADING......";
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("mainStage").innerHTML = this.responseText;
  				hideModal();
				
           		}
        	};
        	xmlhttp.open("GET", url+"stockLoaderByDateSSide.php?date="+date+"&vehicleId="+vehicleId, true);//generating  get method link
        	xmlhttp.send();
}

function unloadStockSS(){
	document.getElementById("modalContent").innerHTML = "LOADING......";
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				ajaxCommonGetFromNet(url+'unloadStock.php', 'mainStage');
  				hideModal();
				
           		}
        	};
        	xmlhttp.open("GET", url+"unloadStockSS.php", true);//generating  get method link
        	xmlhttp.send();
}
function unloadStockOneByOneSS(sId,amount,id){
	document.getElementById("modalContent").innerHTML = "LOADING......";
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				ajaxCommonGetFromNet(url+'unloadStock.php', 'mainStage');
  				hideModal();
				
           		}
        	};
        	xmlhttp.open("GET", url+"unloadStockOneByOneSS.php?sId="+sId+"&soledAmount="+amount+"&id="+id, true);//generating  get method link
        	xmlhttp.send();
}
function getTmpInvoices(vehicleId){
	//document.getElementById("modalContent").innerHTML = "LOADING......";
	showModal();
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("mainStage").innerHTML = this.responseText;
  				hideModal();
				
           		}
        	};
        	xmlhttp.open("GET", url+"tmpInvoices.php?vehicleId="+vehicleId, true);//generating  get method link
        	xmlhttp.send();
}
function viewTmpInvoiceOneByOne(invoiceN,vehicleId,shopId){
			showModal();
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("mainStage").innerHTML = this.responseText;
  				hideModal();
				//alert("data came");
           		}
        	};
        	xmlhttp.open("GET", url+"viewTmpInvoicesOneByOne.php?invoiceN="+invoiceN+"&vehicleId="+vehicleId+"&shopId="+shopId, true);//generating  get method link
        	xmlhttp.send();
}
function selectVehicleForTmpInvoices(){
	//document.getElementById("modalContent").innerHTML = "LOADING......";
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("mainStage").innerHTML = this.responseText;
  				//hideModal();
				//alert("data came");
           		}
        	};
        	xmlhttp.open("GET", url+"selectVehicleForTmpInvoices.php", true);//generating  get method link
        	xmlhttp.send();
}
function finishBtnClick(){
			showModal();
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("mainModal").innerHTML = this.responseText;
  				//hideModal();
				//alert("data came");
           		}
        	};
        	xmlhttp.open("GET", url+"finishInvoicePage.php", true);//generating  get method link
        	xmlhttp.send();
}
function getCreditAmountAndTotal(invoiceN,shopId){
	
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("tmpOut").innerHTML = this.responseText;
  				//hideModal();
				//alert("data came");
           		}
        	};
        	xmlhttp.open("GET", url+"finishInvoice.php", true);//generating  get method link
        	xmlhttp.send();
}
function conformTmpInvoice(shopId,invoiceN,vehicleId){
			showModal();
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				//document.getElementById("mainStage").innerHTML = this.responseText;
  				//hideModal();
				hideModal();
				getTmpInvoices(vehicleId);
				//getTmpInvoices(vehicleId);
           		}
        	};
        	xmlhttp.open("GET", url+"conformTmpInvoices.php?shopId="+shopId+"&invoiceN="+invoiceN+"&vehicleId="+vehicleId, true);//generating  get method link
        	xmlhttp.send();
}
//////////////////2018/11/06
/*function unConformedStock(){
	console.log("uncomformed stock loading ");
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("mainStage").innerHTML = this.responseText;
  				//hideModal();
				//getTmpInvoices(vehicleId);
           		}
        	};
        	xmlhttp.open("GET", url+"conformTmpInvoices.php?shopId="+shopId+"&invoiceN="+invoiceN+"&vehicleId="+vehicleId, true);//generating  get method link
        	xmlhttp.send();
}*/
function conformMainStockByID(id){
			var r = confirm("Are you sure want to Add to the main stock");
			if(r == true){showModal();
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
  				ajaxCommonGetFromNet(url+'addStock.php', 'mainStage');
				hideModal();
				
				//getTmpInvoices(vehicleId);
				//getTmpInvoices(vehicleId);
           		}
        	};
        	xmlhttp.open("GET", url+'conformMainStockById.php?id='+id, true);//generating  get method link
        	xmlhttp.send();}
}
function deleteMainStockByID(){
	alert(id);
	ajaxCommon('conformMainStockById.php','mainStage');
	
}
function deleteTmpI1B1(tId,vId){
			var r = confirm("Are you sure want to delete");
			if(r == true){showModal();
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("mainStage").innerHTML = this.responseText;
  				//hideModal();
				hideModal();
				getTmpInvoices(vId);
				
				//getTmpInvoices(vehicleId);
				//getTmpInvoices(vehicleId);
           		}
        	};
        	xmlhttp.open("GET", url+"deleteTmpS1B1.php?vId="+vId+"&tId="+tId, true);//generating  get method link
        	xmlhttp.send();}
}

function addStockBtnStage(){
	document.getElementById("addStockStage").style.display = "block";
	document.getElementById("addStockBtn").style.display = "none";
}
function addStockSHide(){
	document.getElementById("addStockStage").style.display = "none";
	document.getElementById("addStockBtn").style.display = "block";
}

function dashTH(){
	x = document.getElementById("dashT");
	
	
	if(wid <= 600){
		x.style.width = "100%";
		x.style.marginLeft = "auto";
		x.style.marginRight = "auto";
		x.style.height="3000px";
	}else{
		x.style.width = "100%";
		x.style.height="800px";
	}
	
}
function updateInBItemId(id){
	//document.getElementById("itemId").value = id;
	alert(id);
}
function loadPastShopCreditsToStage(id){
			
			if(id.length != 0){
			loadingModal();
			var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
  				hideModal();
				
				document.getElementById("pastShopCredits").innerHTML = this.responseText;
				//getTmpInvoices(vehicleId);
				//getTmpInvoices(vehicleId);
           		}
        	};
        	xmlhttp.open("GET", "loadPastShopCreditsToStage.php?id="+id, true);//generating  get method link
        	xmlhttp.send();
	
}
else{
	document.getElementById("msg").innerHTML = "Enter shop Id";
}
}

function flush(pass){
	if(pass.length != 0){
	document.getElementById("msg").innerHTML = "LOADING......";
	var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("msg").innerHTML = this.responseText;
  				hideModal();
				
           		}
        	};
        	xmlhttp.open("GET", url+"flusher.php?pass="+pass, true);//generating  get method link
        	xmlhttp.send();
 }else{
	 document.getElementById("msg").innerHTML = "enter password";
 }

}



function pastCreditAdder(shopId,amount){
		if(amount != ""){
			
		
		showModal();
		var xmlhttp = new XMLHttpRequest();
        	xmlhttp.onreadystatechange = function() {
        	if (this.readyState === 4 && this.status == 200) {
				document.getElementById("msg").innerHTML = this.responseText;
  				hideModal();
           		}
        	};
        	xmlhttp.open("GET", url+"pastCreditAdder.php?=shopId"+shopId+"&amount="+amount, true);//generating  get method link
        	xmlhttp.send();
 
	
 

}}