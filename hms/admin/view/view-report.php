<?php

session_start();

include('include/checklogin.php');
check_login();
include("../model/database.php");

$d1 = new database();

if (isset($_GET['id'])) {
    $patientId = $_GET['id'];
    $sql = mysqli_query($d1->GetConnection(), "select * from reports where `id` = '$patientId'");
} else {
    $sql = mysqli_query($d1->GetConnection(), "select * from reports");
}


$cnt = 1;

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>ADMIN | Manage Patients</title>

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
            <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Doctor | Manage Patient</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Doctor</span>
                                </li>
                                <li class="active">
                                    <span>Manage Patient</span>
                                </li>
                            </ol>
                        </div>

                    </section>

                    <div class="container-fluid container-fullw bg-white">


                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patient</span>
                                </h5>
                                <p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
                                    <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                                <?php

                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <table border="1" class="table table-bordered">
                                        <thead>
                                        <tr align="center">
                                            <td colspan="2" style="font-size:20px;color:blue">
                                                Patient Details
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope><span style="color: dodgerblue;">Patient Name:</span> <?php echo $row['name']; ?></th>

                                            <th scope><span style="color: dodgerblue;">Patient Email:</span> <?php echo $row['email']; ?></th>

                                        </tr>
                                        <th scope><span style="color: dodgerblue;">Patient Mobile Number:</span> <?php echo $row['contactNO']; ?> </th>

                                        <th><span style="color: dodgerblue;">Patient Address:</span> <?php echo $row['address']; ?></th>

                                        </tr>
                                        <tr>
                                            <th><span style="color: dodgerblue;">Patient Gender:</span> <?php echo $row['gender']==0?'Male':'Female'; ?></th>

                                            <th><span style="color: dodgerblue;">Patient Age:</span> <?php echo $row['age']; ?></th>

                                        </tr>
<!--                                        <tr>-->
<!---->
<!--                                            <th>Patient Medical History(if any)</th>-->
<!---->
<!--                                            <th>Patient Reg Date</th>-->
<!---->
<!--                                        </tr>-->
                                        </thead>
                                    </table>
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <tr align="center">
                                            <th colspan="8">Medical History</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Blood Pressure</th>
                                            <th>Weight</th>
                                            <th>Blood Sugar</th>
                                            <th>Body Temprature</th>
                                            <th>Medical Prescription</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td class="center"><?php echo $cnt; ?>.</td>
                                            <td><?php echo $row['bloodPressure']; ?></td>
                                            <td><?php echo $row['weight']; ?></td>
                                            <td><?php echo $row['bloodSugar']; ?></td>
                                            <td><?php echo $row['bodyTemp']; ?></td>
                                            <td><?php echo $row['prescription']; ?></td>


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

<!--                                                    <a href="edit-patient.php?id=--><?php //echo $row['id']; ?><!--"-->
<!--                                                       class="btn btn-transparent btn-xs" tooltip-placement="top"-->
<!--                                                       tooltip="Edit"><i class="fa fa-pencil"></i></a>-->

<!--                                                    <a style="color:red;"-->
<!--                                                       href="../controller/Reports-controller.php?id=--><?php //echo $row['id'] ?><!--&del=delete"-->
<!--                                                       onClick="return confirm('Are you sure you want to delete?')"-->
<!--                                                       class="btn btn-transparent btn-xs tooltips"-->
<!--                                                       tooltip-placement="top" tooltip="Remove"><i-->
<!--                                                            class="fa fa-times fa fa-white"></i></a>-->
                                                </div>
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
        jQuery(document).ready(function() {
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



