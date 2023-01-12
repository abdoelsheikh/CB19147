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
.header-status{
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
</style>
<script>
function sendAction(actionno){
  document.forms["actionform"]["action"].value = actionno;

  document.getElementById("actionform").submit();
}
</script>
</head>
<body>
<div class="body-wrapper">
	<div class="btnlogout-wrapper">
	<input type="button" value="Logout" onclick="sendAction(-1)" id="btnlogout"> 
	</div>
	<h2 class="header-status">Status</h2>
		<div class="tableitem-wrapper">
		<table id="tableitem">
			<tr>
				<th>Request ID</th><th>Item ID</th><th>Request Quantity</th><th>Status</th>
			</tr>
			<?php 
			extract($_POST);
			$request_id=unserialize($requestid);
			$requestitemid=unserialize($itemid);
			$request_amount=unserialize($requestamount);
			$request_status=unserialize($requeststatus);
			for($i=0;$i<sizeof($request_id);$i++){
			?>
			<tr>
				<td><?php echo $request_id[$i]; ?></td>
				<td><?php echo $requestitemid[$i]; ?></td>
				<td><?php echo $request_amount[$i]; ?></td>
				<td><?php echo $request_status[$i]; ?></td>
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
	<form action="../Controller/InventoryController.php" id="actionform" method="post" style="display:none">
		<input type="hidden" name="action" id="action" value="">
	</form>
</div>
</body>
</html>