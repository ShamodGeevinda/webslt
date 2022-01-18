<?php
include './sessionstart.php';
require('config.php');

$id = $_GET['id'];

$query = "SELECT * from employee WHERE id='" . $id . "'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error());
$row_user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">


<?php include 'head.php' ?>

<body class="dashboard-analytics">

    <!-- BEGIN LOADER -->
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <?php include 'header.php' ?>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <?php include 'navbar.php'; ?>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div id="content" class="main-content">
                    <br />
                    <h3 class="card-title">User Details</h3>
                    <div class="page-header">

                        <?php
                        $status = "";
                        if (isset($_POST['new']) && $_POST['new'] == 1) {
                            $id = $_REQUEST['id'];
                            $update = "UPDATE employee set id='" . $_POST['id'] . "', emp_no='" . $_POST['emp_no'] . "', type='" . $_POST['type'] . "', first_name='" . $_POST['first_name'] . "' ,last_name='" . $_POST['last_name'] . "', contact_no='" . $_POST['contact_no'] . "', email='" . $_POST['email'] . "', username='" . $_POST['username'] . "', password='" . $_POST['password'] . "', status='" . $_POST['status'] . "' WHERE id='" . $_POST['id'] . "'";
                            mysqli_query($mysqli, $update) or die(mysqli_error());
                            $status = "Record Updated Successfully. </br></br><a href='edit_user_inter.php'>View Updated Record</a>";
                            echo '<p style="color:#FF0000;">' . $status . '</p>';
                        } else {
                        ?>
                            <div>

                                <form class="form" name="form" method="post" action="">
                                    <div class="form-body">
                                        <input type="hidden" name="new" value="1" />
                                        <input name="id" type="text" value="<?php echo $row_user['id']; ?>" hidden="">


                                        <div class="row">



                                            <div class="col-md-6 col-12">
                                                <h6>Emp No : </h6>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="emp_no" required value="<?php echo $row_user['emp_no']; ?>" /></h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6>Type : </h6>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="type" required value="<?php echo $row_user['type']; ?>" /></h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6>First Name : </h6>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="first_name" required value="<?php echo $row_user['first_name']; ?>" /></h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6>Last Name : </h6>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="last_name" required value="<?php echo $row_user['last_name']; ?>" /></h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6>Contact No : </h6>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="contact_no" required value="<?php echo $row_user['contact_no']; ?>" /></h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6>Email : </h6>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="email" value="<?php echo $row_user['email']; ?>" /></h6>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <h6>Username : </h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="username" value="<?php echo $row_user['username']; ?>" /></h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6>Password : </h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="password" value="<?php echo $row_user['password']; ?>" /></h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6>Status : </h6>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <h6><input type="text" class="form-control" name="status" value="<?php echo $row_user['status']; ?>" /></h6>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <p><input name="submit" type="submit" class="btn btn-primary mr-1" value="Update" /></p>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                            </div>

                    </div>
                </div>
                <?php include 'footer.php'; ?>
            </div>
            <!--  END CONTENT AREA  -->


        </div>
        <!-- END MAIN CONTAINER -->

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
        <script src="bootstrap/js/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script>
            $(document).ready(function() {
                App.init();
            });
        </script>
        <script src="assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="plugins/apex/apexcharts.min.js"></script>
        <script src="assets/js/dashboard/dash_1.js"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>



</html>