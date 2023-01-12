
<?php


//To find out whats the action, what function to call-----------------------------------
 $actioncode=$_POST['action'];
switch ($actioncode){
	case 0:
	backhomebtn();
	break;
	case 1:
	loginHandler();
	break;
	case 2:
	expertisepage();
	break;
	case 3:
	profilepage();
	break;
	case 4:
	titlepage();
	break;
	case 40:
	svhuntingpage();
	break;
	case 5:
	presentationpage();
	break;
	case 6:
	inventorypage();
	break;
	case 7:
	requestitempage();
	break;
	case 8:
	viewstatuspage();
	break;
	case 9:
	checkupdatestock();
	break;
	case 10:
	managerequestpage();
	break;
	case 11:
	displayitem();
	break;
	case 12:
	requestItem();
	break;
	case 13:
	displayrequest();
	break;
	case 14:
	displaystock();
	break;
	case 15:
	updateStock();
	break;
	case 16:
	manageRequest();
	break;
	case 17:
	approverejectrequest();
	break;
	case-1:
	logout();
	break;
}
//Function to handle login activity----------------------------------------------------
function loginHandler(){
include("../Model/dbcon.php");
session_start();
extract($_POST);
$userID=$userid;
$pass=$password;
if(strtoupper(substr($userID,0,2)) === "TC" ){

	$query = "SELECT * FROM  technician WHERE Technician_ID = '$userID'";
	$result=mysqli_query($conn, $query) or die("Error Occured");
	if(isset($result)){
		if(mysqli_num_rows($result)==1)
		{
		session_regenerate_id();
		$member= mysqli_fetch_assoc($result);
		$_SESSION['USERID'] = $member['Technician_ID'];
		$_SESSION['ROLE'] = "Technician";
		$_SESSION['STATUS'] = true;
		session_write_close();
		$msg= "Login Successful";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		echo "<script type='text/javascript'>window.location='../../home.php'</script>";
		exit();
		}
		else{
		$errormsg= "Invalid Input";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
    	echo "<script type='text/javascript'>window.location='../..//login.php'</script>";
    	exit();
  	  	}
 	}
}elseif(substr( strtoupper($userID), 0, 2 ) === "LT" ){
$query = "SELECT * FROM  lecturers WHERE Lect_ID = '$userID'";
$result=mysqli_query($conn, $query) or die("Error Occured");
if(isset($result)){
		if(mysqli_num_rows($result)==1)
		{
			
		session_regenerate_id();
		$member= mysqli_fetch_assoc($result);
		$_SESSION['USERID'] = $member['Lect_ID'];
		$_SESSION['ROLE'] = "Lecturer";
		$_SESSION['STATUS'] = true;
		session_write_close();
		$msg= "Login Successful";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		echo "<script type='text/javascript'>window.location='../../home.php'</script>";
		exit();
		}
		else{
		$errormsg= "Invalid Input";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
    	echo "<script type='text/javascript'>window.location='../../login.php'</script>";
    	exit();
  	  	}
 	}
}
elseif(substr( strtoupper($userID), 0, 2 ) === "ST" ){
	$query = "SELECT * FROM  student WHERE Stud_ID= '$userID'";
$result=mysqli_query($conn, $query) or die("Error Occured");
	if(isset($result)){
		if(mysqli_num_rows($result)==1)
		{
			
		session_regenerate_id();
		$member= mysqli_fetch_assoc($result);
		$_SESSION['USERID'] = $member['Stud_ID'];
		$_SESSION['ROLE'] = "Student";
		$_SESSION['STATUS'] = true;
		session_write_close();
		$msg= "Login Successful";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		echo "<script type='text/javascript'>window.location='../../home.php'</script>";
		exit();
		}
		else{
		$errormsg= "Invalid Input";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
		echo "<script type='text/javascript'>window.location='../../login.php'</script>";
    	exit();
  	  	}
 	}
 }
 elseif(substr( strtoupper($userID), 0, 2 ) === "CT" ){
	$query = "SELECT * FROM  coordinator WHERE Coordinator_ID= '$userID'";
$result=mysqli_query($conn, $query) or die("Error Occured");
	if(isset($result)){
		if(mysqli_num_rows($result)==1)
		{
			
		session_regenerate_id();
		$member= mysqli_fetch_assoc($result);
		$_SESSION['USERID'] = $member['Coordinator_ID'];
		$_SESSION['ROLE'] = "Coordinator";
		$_SESSION['STATUS'] = true;
		session_write_close();
		$msg= "Login Successful";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		echo "<script type='text/javascript'>window.location='../../home.php'</script>";
		exit();
		}
		else{
		$errormsg= "Invalid Input";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
		echo "<script type='text/javascript'>window.location='../../login.php'</script>";
    	exit();
  	  	}
 	}
else{
	$errormsg= "Invalid Input";
	echo "<script type='text/javascript'>alert('$errormsg');</script>";
	echo "<script type='text/javascript'>window.location='../../login.php'</script>";
    exit();
}
}
}
function logout(){
session_start();
session_destroy();
echo "<script type='text/javascript'>alert('You Have been logged out.');</script>";
echo "<script type='text/javascript'>window.location='../../login.php'</script>";
}

//Function for navigation between pages on main homepage--------------------------------
function expertisepage(){
	echo "<script type='text/javascript'>window.location='../../Manage_Expertise/ExpertiseMainInterface.php'</script>";
}
function profilepage(){
		if($_SESSION['ROLE']=="Lecturer"){
		echo "<script type='text/javascript'>window.location='../../ManageProfile/lecteditviewprofile.php'</script>";
	}
	else{
		echo "<script type='text/javascript'>window.location='../../ManageProfile/studeditviewprofile.php'</script>";
	}
}

function svhuntingpage(){
		echo "<script type='text/javascript'>window.location='../../SV_Hunting/InputKeywordsInterface.php'</script>";
}

function titlepage(){
		session_start();
	if($_SESSION['ROLE']=="Lecturer"){
		echo "<script type='text/javascript'>window.location='../../Manage_Title/VIEW/ManageTitleLectHompage.php'</script>";
	}
	else{
		echo "<script type='text/javascript'>window.location='../../Manage_Title/VIEW/ManageTitleStudHomepage.php'</script>";
	}
}

function inventorypage(){
		echo "<script type='text/javascript'>window.location='../View/Inventory_Home.php'</script>";
}

function presentationpage(){
	session_start();
	if($_SESSION['ROLE']=="Lecturer" or $_SESSION['ROLE']=="Student"){
		echo "<script type='text/javascript'>window.location='../../managepresentation/View_StdLect.php'</script>";
	}
	else{
		echo "<script type='text/javascript'>window.location='../../managepresentation/View_Display.php'</script>";
	}

}

//Function for navigation between pages on inventory homepage--------------------------------

function viewstatuspage(){
	echo "<script type='text/javascript'>window.location='../View/View_Status.php'</script>";
}

function checkupdatestock(){
	echo "<script type='text/javascript'>window.location='../View/Check_Update_Stock.php'</script>";
}

function managerequestpage(){
	echo "<script type='text/javascript'>window.location='../View/Manage_Request.php'</script>";
}
function backhomebtn(){
	echo "<script type='text/javascript'>window.location='../../home.php'</script>";
}
function backinventoryhomebtn(){
	echo "<script type='text/javascript'>window.location='../View/Inventory_Home.php'</script>";
}
function displayitem(){
include("../Model/dbcon.php");
extract($_POST);

if(empty($searchKey)){
$query = "SELECT * FROM item" ;
}else{
$query = "SELECT * FROM item WHERE Item_Name LIKE '%$searchKey%'" ;
}
$result = mysqli_query($conn,$query) or die("Could not execute query in inventorycontroller.php");
$itemid=array();
$itemname=array();
$itemquantity=array();
$i=0;
if(mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result))
{
	$itemid[$i]=$row["Item_ID"];
	$itemname[$i]=$row["Item_Name"];
	$itemquantity[$i] = $row["Item_Quantity"];
	$i++;
}

?>
<form action="../View/Manage_Inventory_Usage/Request_Item.php" method="post" id="requestitemform" >
<input type='hidden' name='itemid' value='<?php echo serialize($itemid); ?>'>
<input type='hidden' name='itemname' value='<?php echo serialize($itemname); ?>'>
<input type='hidden' name='itemquantity' value='<?php echo serialize($itemquantity); ?>'>
</form>
<script>
  document.getElementById("requestitemform").submit();
</script><?php 
}else{?>
<form action="../View/Request_Item.php" method="post" id="requestitemform" >
<input type='hidden' name='itemid' value='<?php echo serialize($itemid); ?>'>
<input type='hidden' name='itemname' value='<?php echo serialize($itemname); ?>'>
<input type='hidden' name='itemquantity' value='<?php echo serialize($itemquantity); ?>'>
</form>
<script>
  document.getElementById("requestitemform").submit();
</script>
<?php
}
}

function requestItem(){
	include("../Model/dbcon.php");
	session_start();
	extract($_POST);
	$studid=$_SESSION['USERID'];
	$itemid=$reqitemid;
	$quantity=$reqquantity;
	$query = "INSERT INTO request(Stud_ID,Item_ID,Request_Amount,Request_Status)VALUES('$studid','$itemid','$reqquantity','pending')";
	mysqli_query($conn,$query) or die("Could not execute query on line 252,InventoryController.php");
	$msg= "Request Successful";
	echo "<script type='text/javascript'>alert('$msg');</script>";
	displayitem();
}
function displayrequest(){

include("../Model/dbcon.php");
session_start();
$studid=$_SESSION['USERID'];

$query = "SELECT * FROM request WHERE Stud_ID='$studid'";
$result = mysqli_query($conn,$query) or die("Could not execute query in inventorycontroller.php");
$requestid=array();
$itemid=array();
$requestamount=array();
$requeststatus=array();
$i=0;
if(mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result))
{
	$requestid[$i]=$row["Request_ID"];
	$itemid[$i]=$row["Item_ID"];
	$requestamount[$i] = $row["Request_Amount"];
	$requeststatus[$i] = $row["Request_Status"];
	$i++;
}

?>
<form action="../View/View_Status.php" method="post" id="displaystatusform" >
<input type='hidden' name='requestid' value='<?php echo serialize($requestid); ?>'>
<input type='hidden' name='itemid' value='<?php echo serialize($itemid); ?>'>
<input type='hidden' name='requestamount' value='<?php echo serialize($requestamount); ?>'>
<input type='hidden' name='requeststatus' value='<?php echo serialize($requeststatus); ?>'>
</form>
<script>
  document.getElementById("displaystatusform").submit();
</script>
<?php
}else{?>
<form action="../View/View_Status.php" method="post" id="displaystatusform" >
<input type='hidden' name='requestid' value='<?php echo serialize($requestid); ?>'>
<input type='hidden' name='itemid' value='<?php echo serialize($itemid); ?>'>
<input type='hidden' name='requestamount' value='<?php echo serialize($requestamount); ?>'>
<input type='hidden' name='requeststatus' value='<?php echo serialize($requeststatus); ?>'>
</form>
<script>
  document.getElementById("displaystatusform").submit();
</script>
<?php 
}
}
function displaystock(){

include("../Model/dbcon.php");
extract($_POST);

if(empty($searchKey)){
$query = "SELECT * FROM item" ;
}else{
$query = "SELECT * FROM item WHERE Item_Name LIKE '%$searchKey%'" ;
}
$result = mysqli_query($conn,$query) or die("Could not execute query in inventorycontroller.php");
$itemid=array();
$itemname=array();
$itemquantity=array();
$i=0;
if(mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result))
{
	$itemid[$i]=$row["Item_ID"];
	$itemname[$i]=$row["Item_Name"];
	$itemquantity[$i] = $row["Item_Quantity"];
	$i++;
}

?>
<form action="../View/Check_Update_Stock.php" method="post" id="stockform" >
<input type='hidden' name='itemid' value='<?php echo serialize($itemid); ?>'>
<input type='hidden' name='itemname' value='<?php echo serialize($itemname); ?>'>
<input type='hidden' name='itemquantity' value='<?php echo serialize($itemquantity); ?>'>
</form>
<script>
  document.getElementById("stockform").submit();
</script><?php 
}else{?>
<form action="../View/Check_Update_Stock.php" method="post" id="stockform" >
<input type='hidden' name='itemid' value='<?php echo serialize($itemid); ?>'>
<input type='hidden' name='itemname' value='<?php echo serialize($itemname); ?>'>
<input type='hidden' name='itemquantity' value='<?php echo serialize($itemquantity); ?>'>
</form>
<script>
  document.getElementById("stockform").submit();
</script>
<?php
}
}
function updateStock(){
	include("../Model/dbcon.php");
	extract($_POST);
	$itemid=$upitemid;
	$quan=$upquantity;
	$query = "UPDATE item SET Item_Quantity = '$upquantity' WHERE Item_ID = '$itemid'" ;
	mysqli_query($conn,$query) or die("Could not execute query on line 339,InventoryController.php");
	$msg= "Update Successful";
	echo "<script type='text/javascript'>alert('$msg');</script>";
	displaystock();
}
function manageRequest(){
include("../Model/dbcon.php");
session_start();
$query = "SELECT request.Request_ID,request.Stud_ID,item.Item_Name,request.Request_Amount,request.Request_Status FROM request INNER JOIN item ON request.Item_ID=item.Item_ID ";
$result = mysqli_query($conn,$query) or die("Could not execute query in inventorycontroller.php");
$requestid=array();
$studid=array();
$itemname=array();
$requestamount=array();
$reqstatus=array();
$i=0;
if(mysqli_num_rows($result)>0){
while ($row = mysqli_fetch_assoc($result))
{
	$requestid[$i]=$row["Request_ID"];
	$studid[$i]=$row["Stud_ID"];
	$itemname[$i] = $row["Item_Name"];
	$requestamount[$i] = $row["Request_Amount"];
	$reqstatus[$i] = $row["Request_Status"];
	$i++;
}

?>
<form action="../View/Manage_Request.php" method="post" id="managereqform" >
<input type='hidden' name='requestid' value='<?php echo serialize($requestid); ?>'>
<input type='hidden' name='studid' value='<?php echo serialize($studid); ?>'>
<input type='hidden' name='itemname' value='<?php echo serialize($itemname); ?>'>
<input type='hidden' name='requestamount' value='<?php echo serialize($requestamount); ?>'>
<input type='hidden' name='reqstatus' value='<?php echo serialize($reqstatus); ?>'>
</form>
<script>
  document.getElementById("managereqform").submit();
</script>
<?php
}else{?>
<form action="../View/Manage_Request.php" method="post" id="managereqform" >
<input type='hidden' name='requestid' value='<?php echo serialize($requestid); ?>'>
<input type='hidden' name='studid' value='<?php echo serialize($studid); ?>'>
<input type='hidden' name='itemname' value='<?php echo serialize($itemname); ?>'>
<input type='hidden' name='requestamount' value='<?php echo serialize($requestamount); ?>'>
<input type='hidden' name='reqstatus' value='<?php echo serialize($reqstatus); ?>'>
</form>
<script>
  document.getElementById("managereqform").submit();
</script>
<?php 
}
}
function approverejectrequest(){
	include("../Model/dbcon.php");
	extract($_POST);
	$requestid=$reqid;
	$actionrequest=$approve;
	$query= "SELECT Item_ID,Request_Amount FROM request WHERE Request_ID='$requestid'";
	$result = mysqli_query($conn,$query) or die("Could not execute query in inventorycontroller.php");
	$row = mysqli_fetch_assoc($result);
	$itemid = $row["Item_ID"];
	$requestamount=$row["Request_Amount"];
	$query1 = "SELECT Item_Quantity FROM item WHERE Item_ID='$itemid'";
	$result1 = mysqli_query($conn,$query1) or die("Could not execute query in inventorycontroller.php");
	$row1 = mysqli_fetch_assoc($result1);
	$itemamount=$row1["Item_Quantity"];
	$remainquantity=(int)$itemamount-(int)$requestamount;
	if($remainquantity>0){
		$queryupdatestock="UPDATE item SET Item_Quantity='$remainquantity' WHERE Item_ID='$itemid'";
		$resultupdatestock = mysqli_query($conn,$queryupdatestock) or die("Could not execute queryupdatestock in inventorycontroller.php");
		$queryupdatestatus="UPDATE request SET Request_Status='$actionrequest' WHERE Request_ID='$requestid'";
		$resultupdatestatus = mysqli_query($conn,$queryupdatestatus) or die("Could not execute queryupdatestatus in inventorycontroller.php");
		$msg= "Update Successful";
	echo "<script type='text/javascript'>alert('$msg');</script>";
		manageRequest();
	}else{
	$msg= "Update Failed,Insufficient Stock";
	echo "<script type='text/javascript'>alert('$msg');</script>";
		manageRequest();
	}
}

?>