<?php
  include_once 'head.php';
  session_start();
?>

<body>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
            <?php if(isset($_SESSION['status']))
                {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['status']; ?>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                }
            ?>
                <div>
                    <h1 class="align-items-center text-center">Profile</h1>
                </div>
                
                <div class="mt-5 text-center"><a href="studEditForm.php"<button class="btn btn-primary profile-button" type="button">Edit Profile</button></a></div>
                <div class="mt-5 text-center"><a href="studViewForm.php"<button class="btn btn-primary profile-button" type="button">View Profile</button></a></div>
                <div class="mt-5 text-left"><a href="../home.php"><button class="btn btn-secondary profile-button" type="button">Back</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>