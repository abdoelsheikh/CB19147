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
#tablerequest{
	width:80%;
	border: 2px solid black;
	border-collapse: separate;
	border-spacing: 0px 10px;
	margin-left: auto;
 	 margin-right: auto;
}
#tablerequest th{
font-size: 1.2em;
font-weight: bold;
width: 10%;
}
.lblapprove{
margin-right:3%;
}
.lblrej{
margin-left:3%;
}
</style>
<script>
function sendAction(actionno){
document.getElementById('action').value = actionno;
  document.getElementById("actionform").submit();
}
function approvereq(requestid){
	var reqid=requestid;
 	document.forms["reactform"]["reqid"].value = reqid;
 	document.forms["reactform"]["action"].value = 17;
  	document.forms["reactform"]["approve"].value = "Approved";
  	document.getElementById("reactform").submit();
}
function rejectreq(requestid){
 	var reqid=requestid;
 	document.forms["reactform"]["reqid"].value = reqid;
 	document.forms["reactform"]["action"].value = 17;
 	document.forms["reactform"]["approve"].value = "Rejected";
  	document.getElementById("reactform").submit();
}
</script>
</head>
<body>
<div class="body-wrapper">
	<div class="btnlogout-wrapper">
	<input type="button" value="Logout" onclick="sendAction(-1)" id="btnlogout"> 
	</div>
	<h2 class="header-status">Request List</h2>
		<div class="tablerequest-wrapper">
		<table id="tablerequest">
			<tr>
				<th>Request ID</th><th>Student ID</th><th>Item</th><th>Request Amount</th><th>Request Status</th>
			</tr>
			<?php 
			extract($_POST);
			$reqid=unserialize($requestid);
			$stdid=unserialize($studid);
			$reqitem=unserialize($itemname);
			$reqamount=unserialize($requestamount);
			$requeststatus=unserialize($reqstatus);
			for($i=0;$i<sizeof($reqid);$i++){
			?>
			<tr>
				<td><?php echo $reqid[$i]; ?></td>
				<td><?php echo $stdid[$i]; ?></td>
				<td><?php echo $reqitem[$i]; ?></td>
				<td><?php echo $reqamount[$i]; ?></td>
				<td><?php if($requeststatus[$i]=="Approved" or $requeststatus[$i]=="Rejected"){
					echo $requeststatus[$i]; ?></td><?php }
				else{
					?>
					<label class="lblapprove"><a href="javascript:approvereq(<?php echo $reqid[$i]; ?>)">Approve</a></label>/<label class="lblrej"><a href="javascript:rejectreq(<?php echo $reqid[$i]; ?>)">Reject</a></label></td><?php
				}?>
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
			<form action="../Controller/InventoryController.php" id="reactform" name="reactform" method="post" style="display:none">
			<input type="hidden" name="action" id="action" value="">
		<input type="hidden" name="reqid" id="reqid" value="">
		<input type="hidden" name="approve" id="approve" value="">
		
	</form>
</div>
</body>
</html>