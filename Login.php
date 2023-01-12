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
	padding-top:8%;
	margin-bottom:5%;
}
.loginform-wrapper{

	font-size:120%;
	margin-bottom:1.5%;
}
.loginform-wrapper input{
	padding:0.3%;
	margin:2% 1% 2% 1%;
}
.loginform-wrapper label{
	padding-right:1%;
}
.loginform-wrapper #pass{
	padding-right:0.3%;
}
.btn_login-container input[type=submit]{
	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:1% 3.7% 1% 3.7%;
	margin:1%;

}
.btn-reg-container button{
	font-size:100%;
	color:white;
	background-color:#4CAF50;
	padding:1% 2% 1% 2%;
	margin:1%;
	

}
.btn-reg-container,.btn_login-container{
	
}
.btn-login-reg-container{

}

</style>
</head>
<body>
<div class="body-wrapper">
	<div class="header-welcome">
		<h1>PSM Management System</h1>
	</div>
	 <form action="Manage_Inventory/Controller/InventoryController.php" method="post" name="loginform">
		<div class="loginform-wrapper">
		<label>User ID:</label>
		<input type="text"  id="userid" name="userid"><br>
		<label id="pass">Password:</label>
		<input type="password"  id="password" name="password">
		</div>
		<div class="btn-login-reg-container">
		<div class="btn_login-container">
		<input type="submit" value="login"> 
		</div>
		<input type="hidden" name="action" id="action" value="1">
		</div>
	</form>
	<div class="btn-reg-container"><a href="ManageProfile/createprofile.php"><button>Create Profile</button></a></div>
</div>
</div>
</body>
</html>