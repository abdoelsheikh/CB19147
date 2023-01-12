<!DOCTYPE html>
<html>
<head>
<style>
body{
	background-color:lightgray;
}
.body-wrapper{
  width:90%;
  display:block;
  text-align:center;
  margin:auto;

}
.header-request{
	margin-bottom:3%;
}
.btnlogout-wrapper{
	text-align:right;
	margin:2% 2%;
	margin-bottom:5%;
}
#btnlogout{
	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:8px 25px;
}
.remark-wrapper{
	text-align:left;
	padding-left:16%;
}
.btn-option input[type=button]{
	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:1%;
	width:10%;
	margin:2%;
}
#searchbtn{
	font-size:70%;
	color:white;
	background-color:#4CAF50;
	
	width:5%;
	
}
.search-wrapper{

	font-size:120%;
	margin-bottom:1.5%;
}
.search-wrapper input{
	padding:0.3%;
	margin:2% 1% 2% 1%;
}
.search-wrapper label{
	padding-right:1%;
}
.tableitem-wrapper{
	text-align:center;
}
#tableitem{
	width:80%;
	border: 2px solid black;
	border-collapse: separate;
	border-spacing: 0px 10px;
	margin-left: auto;
 	 margin-right: auto;
}
#tableitem th{
font-size: 1.2em;
font-weight: bold;
width: 10%;
} 
.lblreq{
	text-decoration:underline;
	color:blue;
}

#tableitem th{
 
  }
</style>
<script>
function sendAction(actionno){
 document.forms["actionform"]["action"].value = actionno;
 var x = document.getElementById("searchItem").value;
 document.forms["actionform"]["searchKey"].value = x;
  document.getElementById("actionform").submit();
}
function sendRequest(itemid){

 if(document.getElementById('itemreqquan').value === "") {
    alert("please enter amount");
	}else{
	var itemreqid=itemid;
 	var reqquan = document.getElementById('itemreqquan').value;
 	document.forms["reqform"]["action"].value = 12;
  	document.forms["reqform"]["reqitemid"].value = itemreqid;
  	document.forms["reqform"]["reqquantity"].value = reqquan;
  	document.getElementById("reqform").submit();
	}
}

</script>
</head>
<body>
<div class="body-wrapper">
	<div class="btnlogout-wrapper">
	<input type="button" value="Logout" onclick="sendAction(-1)" id="btnlogout"> 
	</div>
	<div class="header-request">
		<h1>Item Request</h1>
	</div>
	<div class="search-wrapper">
		<label>Search:</label>
		<input type="text" id="searchItem" name="searchItem" >		
		<input type="button" value="Search" id="searchbtn" onclick="sendAction(11)"> 

	</div>
	<div class="tableitem-wrapper">
		<table id="tableitem">
			<tr>
				<th>Item ID</th><th>Item Name</th><th>Quantity</th><th>Action</th><th>Request Quantity:<input type="text" id="itemreqquan" name="itemreqquan" size="4" value=""></th>
			</tr>
			<?php 
			extract($_POST);
			$item_id=unserialize($itemid);
			$item_name=unserialize($itemname);
			$item_quantity=unserialize($itemquantity);
			for($i=0;$i<sizeof($item_id);$i++){
			?>
			<tr>
				<td><?php echo $item_id[$i]; ?></td>
				<td><?php echo $item_name[$i]; ?></td>
				<td><?php echo $item_quantity[$i]; ?></td>
				<td><label class="lblreq"><a href="javascript:sendRequest(<?php echo $item_id[$i]; ?>)">Request</a></label></td>
			</tr>
		<?php 
			}
			?>

		</table>
	</div>
	<div class="btn-option">
		<div>
		<input type="button" value="Back" onclick="sendAction(6)"> 
		</div> 
	</div>
	
	<div class="remark-wrapper">
		<h6>*Remark:Some option may not be available for your role.</h6>
	</div>
		<form action="../Controller/InventoryController.php" id="actionform" name="actionform" method="post" style="display:none">
		<input type="hidden" name="action" id="action" value="">
		<input type="hidden" name="searchKey" id="search" value="">
	</form>
		<form action="../Controller/InventoryController.php" id="reqform" name="reqform" method="post" style="display:none">
			<input type="hidden" name="action" id="action" value="">
		<input type="hidden" name="reqitemid" id="reqitemid" value="">
		<input type="hidden" name="reqitemname" id="reqitemname" value="">
		<input type="hidden" name="reqquantity" id="reqquantity" value="">
	</form>
</div>
</body>
</html>