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
.header-welcome{
	margin-bottom:5%;
}
#btnlogout{
	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:8px 25px;
}
.btn-option{
	margin-bottom:2%;
}
.btn-option input[type=button]{

	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:1%;
	width:20%;
	margin:2%;
}
.presentation input[type=button]{
	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:1%;
	width:20%;
	margin:2%;
}
.presentation h2{

	text-align:left;
	padding-left:10%;
	display:inline-block;
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
	<div class="header-welcome">
		<h1>PSM Management System</h1>
	</div>
	<div class="btn-option">
		<div>
		<input type="button" value="Lecturer Expertise" id="btnExper" onclick="sendAction(2)"> 
		<input type="button" value="Profile" id="btnProf" onclick="sendAction(3)"> 
		<input type="button" value="SV Hunting" id="btnSV" onclick="sendAction(40)"> 
		</div>
		<div>
		<input type="button" value="Title" id="btnTitle" onclick="sendAction(4)"> 
		<input type="button" value="Inventory" id="btnInvent" onclick="sendAction(6)"> 
		<input type="button" value="Presentation" id="btnPresent" onclick="sendAction(5)">
		</div> 
	</div>
	<div class="remark-wrapper">
		<h6>*Remark:Some option may not be available for your role.</h6>
	</div>
	<form action="Manage_Inventory/Controller/InventoryController.php" id="actionform" method="post" style="display:none">
		<input type="hidden" name="action" id="action" value="">
	</form>
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
		document.getElementById("btnExper").disabled = true;
		document.getElementById("btnProf").disabled = true;
		document.getElementById("btnSV").disabled = true;
		document.getElementById("btnTitle").disabled = true;
		document.getElementById("btnMeeting").disabled = true;
		document.getElementById("btnPresent").disabled = true;
	}
	else if(rol=="Lecturer"){
		document.getElementById("btnInvent").disabled = true;
	}
	else if (rol=="Coordinator"){
		document.getElementById("btnExper").disabled = true;
		document.getElementById("btnProf").disabled = true;
		document.getElementById("btnSV").disabled = true;
		document.getElementById("btnTitle").disabled = true;
		document.getElementById("btnMeeting").disabled = true;
	
		document.getElementById("btnInvent").disabled = true;
	}
</script>
</body>
</html>