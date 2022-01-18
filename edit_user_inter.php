<?php include './sessionstart.php'; ?>

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
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <h3>Edit user</h3>
                        </ol>
                    </nav>
                </div>

                <table class="table table-hover non-hover dataTable no-footer">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Emp No</th>
                            <th>Type</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "1234";
                        $dbname = "slt";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $count = 1;
                        $sql = "SELECT * FROM employee;";
                        $result = mysqli_query($conn, $sql);
                        //$result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                        ?>


                                <tr>

                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["emp_no"]; ?></td>
                                    <td><?php echo $row["type"]; ?></td>
                                    <td><?php echo $row["first_name"]; ?></td>
                                    <td><?php echo $row["last_name"]; ?></td>
                                    <td><?php echo $row["contact_no"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["password"]; ?></td>
                                    <td><?php echo $row["status"]; ?></td>
                                    <td class="text-center"><a href="edit_user_data.php?id=<?php echo $row["id"]; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg></a></td>



                                </tr>
                        <?php
                                $count++;
                            }
                        } else {
                            echo "<h4>No Record to View</h3>";
                        }
                        $conn->close();
                        ?>




                    </tbody>
                </table>


                <?php include 'footer.php'; ?>
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
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>



</html>