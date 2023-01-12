<?php
  session_start();
  include ('presentation_header.php');
?>
<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'psm_information');
    $id = $_GET['id'];
    $query = "SELECT * FROM timeslot WHERE id=$id";
    $query_run = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($query_run)){
        $Lect_Name = $row['Lect_Name'];
        $Lect_ID = $row['Lect_ID'];
        $Lect_Faculty = $row['Lect_Faculty'];
        $Lect_Expertise = $row['Lect_Expertise'];
        $Date = $row['Date'];
        $TimeStart = $row['TimeStart'];
        $TimeEnd = $row['TimeEnd'];
        $Stud_ID = $row['Stud_ID'];
        $Stud_Name = $row['Stud_Name'];
        $Stud_Faculty = $row['Stud_Faculty'];
        $Stud_Course = $row['Stud_Course'];
    }
?>
<div class="container-fluid">
    <div class="jumbotron">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Presentation Time Slot</h4> 
            </div>
            <div class="card-body">
                <form action="presentation_update.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="Lect_Name" class="col-sm-2 col-form-label">Lecturer's Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Lect_Name" name="Lect_Name" value="<?php echo $Lect_Name?>"form>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Lect_ID" class="col-sm-2 col-form-label">Lecturer's ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Lect_ID" name="Lect_ID" value="<?php echo $Lect_ID?>" form>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Lect_Faculty" class="col-sm-2 col-form-label">Lecturer's Faculty</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Lect_Faculty" name="Lect_Faculty" value="<?php echo $Lect_Faculty ?>" form>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Lect_Expertise" class="col-sm-2 col-form-label">Lecturer's Expertise</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Lect_Expertise" name="Lect_Expertise" value="<?php echo $Lect_Expertise ?>" form>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Date" class="col-sm-2 col-form-label">Presentation Date</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="Date" name="Date" value="<?php echo $Date ?>" form>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="TimeStart" class="col-sm-2 col-form-label">Time Start</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="TimeStart" name="TimeStart" value="<?php echo $TimeStart ?>" form>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="TimeEnd" class="col-sm-2 col-form-label">Time End</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="TimeEnd" name="TimeEnd" value="<?php echo $TimeEnd ?>" form>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Stud_ID" class="col-sm-2 col-form-label">Student's ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Stud_ID" name="Stud_ID" value="<?php echo $Stud_ID ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Stud_Name" class="col-sm-2 col-form-label">Student's Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Stud_Name" name="Stud_Name" value="<?php echo $Stud_Name ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Stud_Faculty" class="col-sm-2 col-form-label">Student's Faculty</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Stud_Faculty" name="Stud_Faculty" value="<?php echo $Stud_Faculty ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Stud_Course" class="col-sm-2 col-form-label">Student's Course</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Stud_Course" name="Stud_Course" value="<?php echo $Stud_Course ?>" readonly>
                        </div>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $id?>"><button type="submit" name="update" class="btn btn-primary">Update</button> 
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="card-footer text-muted">
    Copyright 2021. All Rights Reserved
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    

    <script>
    $(document).ready(function () {
        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#Lect_Name').val(data[0]);
                $('#Lect_ID').val(data[1]);
                $('#Lect_Faculty').val(data[2]);
                $('#Lect_Expertise').val(data[3]);
                $('#Date').val(data[4]);
                $('#TimeStart').val(data[5]);
                $('#TimeEnd').val(data[6]);
                $('#Stud_ID').val(data[7]);
                $('#Stud_Name').val(data[8]);
                $('#Stud_Faculty').val(data[9]);
                $('#Stud_Course').val(data[10]);
        });
    });

    </script>
    
</body>
</html>