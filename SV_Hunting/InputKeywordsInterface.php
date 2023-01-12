
<!DOCTYPE html>
<html>
<head>
</head>
<body>

<link rel="stylesheet" href="InputKeywordsInterface.css">

<div class="header">
<img src='STLogo.jpeg' style="width:100px;height:100px;">
</a>
  <div class="header-right">
    <a class="active" href="#home">Find a Supervisor</a>
    <a href="../Manage_Expertise/ExpertiseMainInterface.php">Lecturer Directory</a>
    <a href="../home.php">Home</a>
  </div>
</div>

<div class="main">
  <div class="searchbox">
  <form name=searchform method="POST" action="SVListInterface.php">
  <label for="fname"><b>Find A Supervisor</b></label><br><br>
  <input type="text" name="search" placeholder="Search"><br><br>
  <input type="submit" name="submit"></input>
</form></div>
</div>

</body>
</html>
