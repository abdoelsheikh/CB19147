<?php
    session_start();
  include_once 'presentation_header.php';
?>
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Presentation Time Slot </h4> 
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

                </table>
            </div>
        </div>
    </div>

<?php
    include_once 'presentation_footer.php';
?>
    