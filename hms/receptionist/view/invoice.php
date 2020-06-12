<?php

session_start();
//include('include/config.php');
//include('include/checklogin.php');
//check_login();
include("../model/database.php");

$d1 = new Database();

if (isset($_GET['id'])) {
    $appointment_id = $_GET['id'];
    $sql = mysqli_query($d1->GetConnection(), "select * from appointment where `id` = ' $appointment_id'");
} else {
    $sql = mysqli_query($d1->GetConnection(), "select * from appointment");
}


$cnt = 1;

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Receptionist | Add Patient</title>

        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
        <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
        <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
        <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
        <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/plugins.css">
        <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />




    </head>
    <body>
    <div id="app">
        <?php include('include/sidebar.php');?>
        <div class="app-content">

            <?php include('include/header.php');?>

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Receptionist | Payment</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Receptionist</span>
                                </li>
                                <li class="active">
                                    <span>Manage Payment</span>
                                </li>
                            </ol>
                        </div>

                    </section>

                    <div class="container-fluid container-fullw bg-white">


                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Payment</span>
                                </h5>
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <?php

                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <table border="1" class="table table-bordered">
                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                <!--<form style="display:inline-flex;" method="post" action="edit-doctor.php">
                                                    <button style="display:inline-flex;color: #195dff;background-color: transparent;border: none;" type="submit"><i class="fa fa-pencil"></i></button>
                                                </form>-->
                                                <!--                                                        <button class="print-btn" onclick="window.print()">Print</button>-->

                                                <a href="view-patient.php?id=<?php echo $row['id']; ?>"
                                                   class="print-btn" onclick="window.print()"
                                                   class="btn btn-transparent btn-xs" tooltip-placement="top"
                                                   tooltip="print"><i class="fa fa-print"></i></a>

<!--                                                <a href="edit-patient.php?id=--><?php //echo $row['id']; ?><!--"-->
<!--                                                   class="btn btn-transparent btn-xs" tooltip-placement="top"-->
<!--                                                   tooltip="Edit"><i class="fa fa-pencil"></i></a>-->
<!---->
<!--                                                <a style="color:red;"-->
<!--                                                   href="../controller/Reports-controller.php?id=--><?php //echo $row['id'] ?><!--&del=delete"-->
<!--                                                   onClick="return confirm('Are you sure you want to delete?')"-->
<!--                                                   class="btn btn-transparent btn-xs tooltips"-->
<!--                                                   tooltip-placement="top" tooltip="Remove"><i-->
<!--                                                        class="fa fa-times fa fa-white"></i></a>-->
                                            </div>
                                        </td>
                                        <thead>
                                        <tr align="center">
                                            <td colspan="2" style="font-size:20px;color:blue">
                                                Payment Details
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope><span style="color: dodgerblue;">Doctor Name:</span> <?php echo $row['doctorName']; ?></th>

                                            <th scope><span style="color: dodgerblue;">Patient Name:</span> <?php echo $row['patientName']; ?></th>

                                        </tr>
                                        <th scope><span style="color: dodgerblue;">Patient Mobile Number:</span> <?php echo $row['patientNumber']; ?> </th>

                                        <th><span style="color: dodgerblue;">Consultancy Fees:</span> <?php echo $row['cosultancyFees']; ?></th>

                                        </tr>
                                        <tr>
                                            <th><span style="color: dodgerblue;">Date:</span> <?php echo $row['appointmentDate']; ?></th>

                                            <th><span style="color: dodgerblue;">Time:</span> <?php echo $row['appointmentTime']; ?></th>

                                        </tr>

                                        </thead>
                                    </table>


                                            </td>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        </tbody>
                                    </table>
                                    <?php
                                    $cnt = $cnt + 1;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- start: FOOTER -->
    <?php include('include/footer.php'); ?>
    <!-- end: FOOTER -->

    <!-- start: SETTINGS -->


    <!-- end: SETTINGS -->

    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="vendor/autosize/autosize.min.js"></script>
    <script src="vendor/selectFx/classie.js"></script>
    <script src="vendor/selectFx/selectFx.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script>
        jQuery(document).ready(function () {
            Main.init();
            FormElements.init();
        });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
    </body>
    </html>
<?php

session_start();
//include('include/config.php');
//include('include/checklogin.php');
//check_login();



