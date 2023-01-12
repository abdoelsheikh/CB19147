<?php
session_start();
  include ('presentation_header.php');
?>
<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'psm_information');
    $query = "SELECT * FROM timeslot";
    $query_run = mysqli_query($connection, $query);
?>
<div class="container-fluid">
    <div class="jumbotron">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Time Slot</h4> 
            </div>
            <div class="card-body">
                <form action="presentation_add.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="Lect_Name" class="col-sm-2 col-form-label">Lecturer's Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="Lect_Name" name="Lect_Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Lect_ID" class="col-sm-2 col-form-label">Lecturer's ID</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="Lect_ID" name="Lect_ID">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="Lect_Faculty" class="col-sm-2 col-form-label">Lecturer's Faculty</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="Lect_Faculty" name="Lect_Faculty">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Lect_Expertise" class="col-sm-2 col-form-label">Lecturer's Expertise</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="Lect_Expertise" name="Lect_Expertise">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="Date" class="col-sm-2 col-form-label">Presentation Date</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="Date" name="Date">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="TimeStart" class="col-sm-2 col-form-label">Time Start</label>
                        <div class="col-sm-10">
                        <input type="time" class="form-control" id="TimeStart" name="TimeStart">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="TimeEnd" class="col-sm-2 col-form-label">Time End</label>
                        <div class="col-sm-10">
                        <input type="time" class="form-control" id="TimeEnd" name="TimeEnd">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Stud_ID" class="col-sm-2 col-form-label">Student's ID</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="Stud_ID" name="Stud_ID">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Stud_Name" class="col-sm-2 col-form-label">Student's Name</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="Stud_Name" name="Stud_Name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Stud_Faculty" class="col-sm-2 col-form-label">Student's Faculty</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="Stud_Faculty" name="Stud_Faculty">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Stud_Course" class="col-sm-2 col-form-label">Student's Course</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="Stud_Course" name="Stud_Course">
                        </div>
                    </div>
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
  include ('presentation_footer.php');
?>
    