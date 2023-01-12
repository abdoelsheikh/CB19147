<!DOCTYPE html>
<html>
<head>
<style>
body{
	background-color:lightgray;
}
.body-wrapper{
  width:90%;
  text-align:center;
  margin:auto;
  
}
.header-inventory{
	margin-bottom:3%;
}
#btnlogout{
	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:8px 25px;
}
.btn-option{
	margin-bottom:5%;
}
.btn-option input[type=button]{

	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:1%;
	width:20%;
	margin:2%;
}

.btnlogout-wrapper{
	text-align:right;
	margin:2% 2%;
	margin-bottom:5%;
}

.remark-wrapper{
	text-align:left;
	padding-left:16%;
}
</style>
<script>
function sendAction(actionno){
 document.getElementById('action').value = actionno;
  document.getElementById("actionform").submit();
}
</script>
</head>
<body>
<div class="body-wrapper">
	<div class="btnlogout-wrapper">
	<input type="button" value="Logout" onclick="sendAction(-1)" id="btnlogout"> 
	</div>
	<div class="header-inventory">
		<h1>Inventory</h1>
	</div>
	<div class="btn-option">
		<div class="first-row-button-home">
		<input type="button" value="Request Item" id="btnReq" onclick="sendAction(11)"> 
		<input type="button" value="View Status" id="btnView" onclick="sendAction(13)"> 
		</div>
		<div>
		<input type="button" value="Check Stock" id="btnCheck" onclick="sendAction(14)"> 
		<input type="button" value="Pending Request" id="btnPen" onclick="sendAction(16)"> 
		</div> 
		<div>
		<input type="button" value="Back" onclick="sendAction(0)"> 
		</div> 
		<form action="../Controller/InventoryController.php" id="actionform" method="post" style="display:none">
		<input type="hidden" name="action" id="action" value="">
	</form>
	</div>
	<div class="remark-wrapper">
		<h6>*Remark:Some option may not be available for your role.</h6>
	</div>
</div>
<?php
session_start();
if ($_SESSION['STATUS'] == true) {
	$role = $_SESSION['ROLE'];
	$userid = $_SESSION['USERID'];
}
?>
<script>
	<?php 
	echo "var rol = '$role';";
	echo "var userid = '$userid';";
	?>
	if (rol=="Technician"){
		document.getElementById("btnReq").disabled = true;
		document.getElementById("btnView").disabled = true;
	
	}
	else if(rol=="Student"){
		document.getElementById("btnCheck").disabled = true;
		document.getElementById("btnPen").disabled = true;
	}
</script>
</body>
</html>