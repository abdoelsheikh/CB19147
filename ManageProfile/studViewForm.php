<?php

  include_once 'head.php';
  include_once 'controller/studForm.php';

?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right"></div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5"></div>
            <h1 class="align-items-center text-center">Profile</h1>
            <table class="table table-striped jambo_table bulk_action">
            <tbody>
            <?php
            
             $currentUser = $_SESSION['USERID'];
             $sql = "SELECT * FROM student WHERE Stud_ID = '$currentUser'";

            $gotResult = mysqli_query($conn,$sql);

             if($gotResult){
                if(mysqli_num_rows($gotResult)>0){
                  while($data = mysqli_fetch_array($gotResult)){
                    ?>
                    <tr>
                      <th> <br><br>Profile Photo: </th>
                      <td> <img src="<?php echo 'controller/stud-img-upload/' . $data['Stud_Photo'] ?>" width="90" height="90" class="rounded-circle" alt=""> </td>
                    </tr>
                    <tr><th>Name: </th><td> <?php echo $data['Stud_Name']; ?> </td></tr>
                    <tr><th>Student ID: </th><td> <?php echo $data['Stud_ID']; ?> </td></tr>
                    <tr><th>Mobile Number: </th><td> <?php echo $data['Stud_PhoneNo']; ?> </td></tr>
                    <tr><th>Email: </th><td> <?php echo $data['Stud_Email']; ?> </td></tr>
                    <tr><th>Address: </th><td> <?php echo $data['Stud_Add']; ?> </td></tr>
                    <tr><th>Faculty: </th><td> <?php echo $data['Stud_Faculty']; ?> </td></tr>
                    <tr><th>Course: </th><td> <?php echo $data['Stud_Course']; ?> </td></tr>
                    <tr><th>Skills: </th><td> <?php echo $data['Stud_Skills']; ?> </td></tr>
                    <tr><th>Interest: </th><td> <?php echo $data['Stud_Interest']; ?> </td></tr>
                   <?php
                }
              }
            }
            ?>
            </tbody>
            </table>
            <div class="mt-5 text-left">
              <a href="studeditviewprofile.php">
              <button class="btn btn-secondary profile-button" type="button">Back<br></button></div>
        </div>
        
    </div>
</div>