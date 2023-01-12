<?php
    session_start();
  include_once 'presentation_header.php';
?>
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Presentation Time Slot</h4> 
                </div>
            <div class="card-body">
                <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, 'psm_information');

                    $query = "SELECT * FROM timeslot";
                    $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time Start</th>
                        <th scope="col">Time End</th>
                        <th scope="col">Lecturer's Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <?php
                        if($query_run)
                        {
                            foreach($query_run as $row)
                        {
                    ?>

                    <tbody>
                        <tr>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['TimeStart']; ?></td> 
                        <td><?php echo $row['TimeEnd']; ?></td>
                        <td><?php echo $row['Lect_Name']; ?></td>
                        <?php
                        echo "<td>"?> 
                            <!--EDIT-->
                            <a href="View_Update.php?id=<?php echo $row['id'];?>">
                            <button type="button" name="update" class="btn btn-primary editbtn"><i class="fas fa-edit"></i></button></a>

                            <!--DELETE-->
                            <a href="presentation_delete.php?id=<?php echo $row['id'];?>">
                            <button type="button" name="delete" class="btn btn-danger deletebtn"><i class="fas fa-trash"></i></button></a>
                            <?php "</td>" ?>

                        </tr>
                    </tbody>

                    <?php
                        }
                        }
                        else
                        {
                            echo "No Record Found";
                        }
                    ?>

                <tbody>
                        <tr>
                        <td><a class="btn btn-primary" href="View_Add.php" role="button">Add Time Slot</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

<?php
    include_once 'presentation_footer.php';
?>
    