<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT *  FROM `Lecturers` WHERE CONCAT(`Lect_ID`, `Lect_Name`,`Lect_PhoneNo`,`Lect_OfficeNo`,`Lect_Email`, `Lect_OfficeAdd`, `Lect_Faculty`, `Lect_Position`, `Lect_Expertise`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `Lecturers`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "psm_information");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<html>

<head>
<link rel="stylesheet" type="text/css" href="CSS.css">
<style>
            *{
                padding: 0;
                margin: 0;
            }
            table,tr,th,td
            {
                border: 1px solid black;
            }
            .footer
            {
                bottom: 0;
                position: absolute;
                width: 100%;
            }
            .back-center
            {
                text-align: center;
                margin-top: 20px;
            }
            .search-inline {
                display: flex;
            }
            .search-inline input {
                margin: 20px;
            }
        </style>
</head>
<div class="header">
  <h2> PSM MANAGEMENT SYSTEM</h2>
</div>

<form action="ExpertiseMainInterface.php" method="post">
            <div class="search-inline">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Search"><br><br>
            </div>
            <table>
            <tr>
                <th>Lecturer ID</th>
                <th>Lecturer Name</th>
                <th>Lecturer Phone No.</th>
                <th>Lecturer Office No.</th>
                <th>Lecturer Email</th>
                <th>Lecturer Office Address</th>
                <th>Lecturer Faculty</th>
                <th>Lecturer Position</th>
                <th>Lecturer Expertise</th>
            </tr>
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row["Lect_ID"];?></td>
                    <td><?php echo $row["Lect_Name"];?></td>
                    <td><?php echo $row["Lect_PhoneNo"];?></td>
                    <td><?php echo $row["Lect_OfficeNo"];?></td>
                    <td><?php echo $row["Lect_Email"];?></td>
                    <td><?php echo $row["Lect_OfficeAdd"];?></td>
                    <td><?php echo $row["Lect_Faculty"];?></td>
                    <td><?php echo $row["Lect_Position"];?></td>
                    <td><?php echo $row["Lect_Expertise"];?></td>
                    
                </tr>
                <?php endwhile;?> 
            </table>
        </form>



<div class="back-center"><a href=../home.php><button>BACK</button></a></div>
</form>
	<div class="footer">
  <p><sub>Copyright 2021, All Right Reserved</sub></p>
</div>
</html>