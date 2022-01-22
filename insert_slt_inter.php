<?php
include './sessionstart.php';
$first_name = $_SESSION["first_name"];
$today = date("d/m/Y");
?>
<script>
    window.onload = function() {
        document.getElementById("serial_no").focus();
    };
</script>
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
                <div><?php
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

                        $sql = "SELECT * FROM slt ;";
                        $result = $conn->query($sql);

                        if (isset($_GET["message"])) {
                            echo "<br/>";
                            echo "<div class='alert alert-success alert-dismissible mb-2' role='alert'>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                            </button>
                                            <div class='d-flex align-items-center'>
                                            <i class='bx bx-like'></i>
                                            <span>
                                            Item Details successfully added to the database.
                                            </span>
                                            </div>
                                        </div>";
                        }

                        if (isset($_GET["message1"])) {
                            echo "<br/>";
                            echo "<div class='alert alert-danger alert-dismissible mb-2' role='alert'>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                                            </button>
                                            <div class='d-flex align-items-center'>
                                            <i class='bx bx-like'></i>
                                            <span>
                                            Sorry... serial no already taken.
                                            </span>
                                            </div>
                                        </div>";
                        }
                        ?>
                </div>
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <h3>Insert Items</h3>
                        </ol>
                    </nav>
                </div>


                <form method="POST" action="data_insert_slt.php">

                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationDefault01">Serial No</label>
                            <input type="text" id="serial_no" class="form-control" id="validationDefault01" placeholder="Serial no" name="serial_no" required>
                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationDefault01">SLT Item</label>
                            <select class="form-control" name="type" class="form-control round" required="yes">
                                <option value="0">Please Select Item</option>
                                <option value="Telephone">Telephone</option>
                                <option value="ADSL router">ADSL Router</option>
                                <option value="STB">STB</option>
                                <option value="ONT">ONT</option>
                                <option value="Splitter">Splitter</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-4">
                            <label for="validationDefault02"></label>
                            <input type="text" class="form-control" id="validationDefault02" name="entered_by" required value='<?php echo $first_name; ?>' hidden="yes">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-4">
                            <label for="validationDefault01"></label>

                        </div>
                        <div class="col-md-4 mb-4">
                            <label for="validationDefault01"></label>

                        </div>
                    </div>-->
                    <div class="form-group mb-4">
                        <div class="custom-control custom-checkbox checkbox-info">
                            <input type="checkbox" class="custom-control-input" id="invalidCheck2" required>
                            <label class="custom-control-label" for="invalidCheck2">Agree to submit form data</label>
                            <div class="invalid-feedback">
                                Agree to submit form data
                            </div>
                        </div>
                    </div>
                    <div id="info1">
                    </div>
                    <input type="text" class="form-control" id="validationDefault02" name="entered_date" required value='<?php echo $today; ?>' hidden="yes">
                    <input type="text" class="form-control" id="validationDefault02" name="item_status" required value='not checked' hidden="yes">
                    <button class="btn btn-primary mt-3" type="submit">Add item</button>
                </form>
                <br />


                <h3>Items</h3>
                <!-- Table with outer spacing -->
                <div class="table-responsive">
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Serial No</th>
                                <th>Type</th>
                                <th>Entered By</th>
                                <th>Entered Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>
                                                        <td>' . $row["id"] . ' </td>
                                                        <td>' . $row["serial_no"] . ' </td>
                                                        <td>' . $row["type"] . ' </td>
                                                        <td>' . $row["entered_by"] . ' </td>
                                                        <td>' . $row["entered_date"] . ' </td>
                                                        
                                                        
                                                     </tr>';
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
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
                buttons: [{
                        extend: 'copy',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm'
                    }
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 10
        });
    </script>




</body>


</html>