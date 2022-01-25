<?php
include './sessionstart.php';
require('config.php');
$id = $_GET['id'];

$query = "SELECT * from slt WHERE id='" . $id . "'";

$result = mysqli_query($mysqli, $query) or die(mysqli_error());
$row_slt = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">


<?php include 'head.php' ?>
<script type="text/javascript" src="js/jquery.js"></script>

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
                <br />


                <div class="modal fade" id="Mod01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div style="padding: 10px;"></div>

                            <?php
                            $status = "";
                            if (isset($_POST['new']) && $_POST['new'] == 1) {
                                $id = $_REQUEST['id'];
                                $update = "UPDATE slt set serial_no='" . $_POST['serial_no'] . "', type='" . $_POST['type'] . "', entered_by='" . $_POST['entered_by'] . "', entered_date='" . $_POST['entered_date'] . "', item_status='" . $_POST['item_status'] . "' WHERE id='" . $_POST['id'] . "'";
                                mysqli_query($mysqli, $update) or die(mysqli_error());

                                $status = "Record Updated Successfully. </br></br><a href='repair_center.php'>View Updated Record</a>";
                                echo '<div style="color:#FF0000; padding: 10px;">' . $status . '</div>';
                            } else {
                            ?>
                                <div style="padding: 20px;">

                                    <form class="form" name="form" method="post" action="">
                                        <div class="form-body">
                                            <input type="hidden" name="new" value="1" />
                                            <input name="id" type="hidden" value="<?php echo $row_slt['id']; ?>" />

                                            <div class="row">



                                                <div class="col-md-6 col-12">
                                                    <h6></h6>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <h6><input type="hidden" class="form-control" name="serial_no" required value="<?php echo $row_slt['serial_no']; ?>" /></h6>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <h6></h6>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <h6><input type="hidden" class="form-control" name="type" required value="<?php echo $row_slt['type']; ?>" /></h6>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <h6></h6>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <h6><input type="hidden" class="form-control" name="entered_by" required value="<?php echo $row_slt['entered_by']; ?>" /></h6>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <h6></h6>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <h6><input type="hidden" class="form-control" name="entered_date" required value="<?php echo $row_slt['entered_date']; ?>" /></h6>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <h6>Item Status : </h6>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <select class="form-control" name="item_status" id="item_status">
                                                        <?php
                                                        if ($row_slt['item_status'] == "not checked") {
                                                        ?>
                                                            <option value="not checked" selected="true">not checked</option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <option value="Good">Good</option>
                                                        <option value="Beyond the repair">Beyond the repair</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 col-12">
                                                    <p><input name="submit" type="submit" class="btn btn-primary mr-1" value="Update" /></p>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                                </div>


                                <div>
                                    <h2 style="text-align: center;">SLT</h2>

                                </div>
                        </div>
                    </div>
                </div>



            </div>



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
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->

    <script type="text/javascript">
        $(document).ready(function() {
            $("#Mod01").modal('show');
        });
    </script>

</body>


</html>