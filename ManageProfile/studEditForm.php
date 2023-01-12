<?php
   include_once 'head.php';
   session_start();
?>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
    <div class="col-md-3 border-right"></div>
    <div class="col-md-6 border-right">
            <div class="p-3 py-5">
            <?php if(isset($_SESSION['status']))
                {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['status']; ?>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
            ?>
            </div> 

			<h1 class="align-items-center text-center">Edit Profile</h1>
            <form action="controller/studUpdate.php" method="post" enctype="multipart/form-data">
            <?php
             $currentUser = $_SESSION['USERID'];
             $sql = "SELECT * FROM student WHERE Stud_ID = '$currentUser'";

             $gotResult = mysqli_query($conn,$sql);

             if($gotResult){
				if(mysqli_num_rows($gotResult)>0){
					while($row = mysqli_fetch_array($gotResult)){
						?>
						<div class="d-flex flex-column align-items-center text-center">
							<img src="assets/images/placeholder.png" alt="placeholder" class="rounded-circle mt-5" width="150px">
							<label for="profileImage" value=""><br>Profile Photo</label>
							<input type="file" name="Stud_Photo" id="Stud_Photo" >
						</div>

						<div class="row mt-3">
							<div class="col-md-12"><label class="labels">Name:</label><input type="text" name="Stud_Name" class="form-control" placeholder="Enter your full name" value="<?php echo $row['Stud_Name']; ?>"></div>
							<div class="col-md-12"><label class="labels"><br>Student ID:</label><input type="text" name="Stud_ID" class="form-control" placeholder="Enter your student id" value="<?php echo $row['Stud_ID']; ?>"></div>
							<div class="col-md-12"><label class="labels"><br>Mobile Number:</label><input type="text" name="Stud_PhoneNo" class="form-control" placeholder="Enter your mobile number" value="<?php echo $row['Stud_PhoneNo']; ?>"></div>
							<div class="col-md-12"><label class="labels"><br>Email:</label><input type="email" name="Stud_Email" class="form-control" placeholder="Enter your email" value="<?php echo $row['Stud_Email']; ?>"></div>
							<div class="col-md-12"><label class="labels"><br>Address:</label><input type="text" name="Stud_Add" class="form-control" placeholder="Enter your address" value="<?php echo $row['Stud_Add']; ?>"></div>
							<div class="col-md-12"><label class="labels" for="faculty"><br>Faculty:</label>
							<select class="form-control" id="faculty" name="Stud_Faculty">
								<option value="" selected disabled><?php echo $row['Stud_Faculty']; ?> </option>
								<option value="Faculty of Computing">Faculty of Computing</option>
								<option value="Faculty of Chemical and Process Engineering Technology">Faculty of Chemical and Process Engineering Technology</option>
								<option value="Faculty of Civil Engineering Technology">Faculty of Civil Engineering Technology</option>
								<option value="Faculty of Electrical and Electronics Engineering Technology">Faculty of Electrical and Electronics Engineering Technology</option>
								<option value="Faculty of Manufacturing and Mechatronic Engineering Technology">Faculty of Manufacturing and Mechatronic Engineering Technology</option>
								<option value="Faculty of Mechanical and Automotive Engineering Technology">Faculty of Mechanical and Automotive Engineering Technology</option>
								<option value="Faculty of Industrial Sciences and Technology">Faculty of Industrial Sciences and Technology</option>
								<option value="Faculty of Industrial Management">Faculty of Industrial Management</option>
							</select>
							</div>
							<div class="col-md-12"><label class="labels"><br>Course:</label><input type="text" name="Stud_Course" class="form-control" placeholder="Enter your course" value="<?php echo $row['Stud_Course']; ?>"></div>
							<div class="col-md-12"><label class="labels"><br>Skills:</label><input type="text" name="Stud_Skills" class="form-control" placeholder="Enter your skills" value="<?php echo $row['Stud_Skills']; ?>"></div>
							<div class="col-md-12"><label class="labels"><br>Interest:</label><input type="text" name="Stud_Interest" class="form-control" placeholder="Enter your interest" value="<?php echo $row['Stud_Interest']; ?>"></div>
							
							<div class="mt-5 text-center col-md-6">
							<a href="studeditviewprofile.php"><button class="btn btn-secondary profile-button" type="button">Back</button>
								
							</div>
							<div class="mt-5 text-center col-md-6">
								<button class="btn btn-primary profile-button" type="submit" name="update_stud">Save Changes</button>
							</div>
						<?php
					}
				}
            }
            ?>
            </form>
        </div>
    </div>
</div>
    