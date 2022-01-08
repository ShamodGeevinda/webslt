<!DOCTYPE html>
<html lang="en">

<!-- begin head -->
<?php include 'head.php'; ?>
<!-- end head -->

<body class= "dashboard-sales">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <?php include 'header.php';?>
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
                <?php
                   

                    if (isset($_GET["message"])) {
                        echo "<br/>";
                        echo "<div class='alert alert-success alert-dismissible mb-2' role='alert'>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                            </button>
                                            <div class='d-flex align-items-center'>
                                            <i class='bx bx-like'></i>
                                            <span>
                                            User Details successfully added to the database.
                                            </span>
                                            </div>
                                        </div>";
                    }
                    ?>

                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Registration</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <h3>User Registration</h3>
                            </ol>
                        </nav>
                </div>

                <!--  BEGIN FORM AREA  -->

                <form action="data_insert_user.php" method="POST">
                        <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <label for="validationDefault01">Emp No</label>
                                <input type="text" class="form-control" id="validationDefault01" placeholder="Emp No" name="emp_no" required>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="validationDefault02">Type</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="Type" name="type" required>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="validationDefault02">First Name</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="First Name" name="first_name" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <label for="validationDefault01">Last Name</label>
                                <input type="text" class="form-control" id="validationDefault01" placeholder="Last Name" name="last_name" required>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label for="validationDefault02">Contact No</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="Contact No" name="contact_no" required>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="validationDefault02">Email</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="Email" name="email" required >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-4">
                                <label for="validationDefault02">User Name</label>
                                <input type="text" class="form-control" id="validationDefault02" placeholder="User Name" name="username" required>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="validationDefault02">Password</label>
                                <input type="password" class="form-control" id="validationDefault02" placeholder="Password" name="password" required >
                            </div>

                            
                        </div>
                        
                        <div class="form-group mb-4">
                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" id="invalidCheck2" required>
                                <label class="custom-control-label" for="invalidCheck2">Agree to submit form data</label>
                                <div class="invalid-feedback">
                                    Agree to submit form data
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-3" type="submit">Add User</button>
                    </form>

                    <!--  END FORM AREA  -->

                    <br/>
                    <h3>Registered User</h3>
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>Emp No</th>
                                    <th>Type</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No</th>
                                    <th>Email</th>
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'config.php';
                                $sql = "SELECT * FROM employee ORDER BY id desc"; // order bi id in descending order
                                $result = $mysqli->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<tr>
                                                        <td>' . $row["id"] . ' </td>
                                                        <td>' . $row["emp_no"] . ' </td>
                                                        <td>' . $row["type"] . ' </td>
                                                        <td>' . $row["first_name"] . ' </td>
                                                        <td>' . $row["last_name"] . ' </td>
                                                        <td>' . $row["contact_no"] . ' </td>
                                                        <td>' . $row["email"] . ' </td>
                                                        
                                                        
                                                     </tr>';
                                    }
                                } else {
                                    echo "0 results";
                                }
                                
                                ?>     




                            </tbody>
                        </table>
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
            $(document).ready(function () {
                App.init();
            });
        </script>
        <script src="assets/js/custom.js"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
        <script src="plugins/apex/apexcharts.min.js"></script>
        <script src="assets/js/dashboard/dash_1.js"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

        <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
        <script src="plugins/table/datatable/datatables.js"></script>
        <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
        <script src="plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
        <script src="plugins/table/datatable/button-ext/jszip.min.js"></script>    
        <script src="plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
        <script src="plugins/table/datatable/button-ext/buttons.print.min.js"></script>
        <script>
            $('#html5-extension').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
                        "<'table-responsive'tr>" +
                        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
                buttons: {
                    buttons: [
                        {extend: 'copy', className: 'btn btn-sm'},
                        {extend: 'csv', className: 'btn btn-sm'},
                        {extend: 'excel', className: 'btn btn-sm'},
                        {extend: 'print', className: 'btn btn-sm'}
                    ]
                },
                "oLanguage": {
                    "oPaginate": {"sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'},
                    "sInfo": "Showing page PAGE of PAGES",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  MENU",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 10
            });
        </script>

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo9/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Jul 2021 05:12:40 GMT -->
</html>