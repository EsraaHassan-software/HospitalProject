<?php
session_start();
//include('include/checklogin.php');
//check_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Receptionist | Book Appointment</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
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
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color"/>


</head>
<body>
<div id="app">
    <?php include('include/sidebar.php'); ?>
    <div class="app-content">

        <?php include('include/header.php'); ?>

        <!-- end: TOP NAVBAR -->
        <div class="main-content">
            <div class="wrap-content container" id="container">
                <!-- start: PAGE TITLE -->
                <section id="page-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="mainTitle">Receptionist | Book Appointment</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <span>Receptionist</span>
                            </li>
                            <li class="active">
                                <span>Book Appointment</span>
                            </li>
                        </ol>
                </section>
                <!-- end: PAGE TITLE -->
                <!-- start: BASIC EXAMPLE -->
                <div class="container-fluid container-fullw bg-white">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row margin-top-30">
                                <div class="col-lg-8 col-md-12">
                                    <div class="panel panel-white">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">Book Appointment</h5>
                                        </div>
                                        <div class="panel-body">

                                            <form role="form" name="book" method="post" onSubmit="return valid();"
                                                  action="../controller/appointments-controller.php">

                                                <?php
                                                    include_once '../model/appointments-model.php';
                                                    $ap1 = new Appointments();
                                                    $result = $ap1->getAllDoctors();
                                                ?>
                                                <div class="form-group">
                                                    <label for="DoctorName">
                                                        Doctor Name
                                                    </label>
                                                    <select name="docname" class="form-control" required >
                                                        <?php
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?php echo $row['docEmail'];?>"><?php echo $row['doctorName']; ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="PatientName">
                                                        Patient Name
                                                    </label>
                                                    <input type="text" name="patname" class="form-control"
                                                           placeholder="Enter Patient Name" required="true">
                                                </div>


                                                <div class="form-group">
                                                    <label for="fess">
                                                        Patient's Email
                                                    </label>
                                                    <input type="email" id="PatientEmail" name="patEmail"
                                                           class="form-control" placeholder="Enter Patient's Email id"
                                                           required="true" onBlur="checkemailAvailability()">
                                                    <span id="email-availability-status"></span>
                                                </div>


                                                <div class="form-group">
                                                    <label for="fess">
                                                        Patient's Contact no
                                                    </label>
                                                    <input type="text" name="patContNo" id="validateNo" class="form-control"
                                                           placeholder="Enter Patient's Contact no" required="true">
                                                </div>


                                                <div class="form-group">
                                                    <label for="PatientAge">
                                                        Patient Age
                                                    </label>
                                                    <input type="text" name="patAge"id="validateAge" class="form-control"
                                                           placeholder="Enter Patient Age" required="true">
                                                </div>

                                                <div class="form-group">
                                                    <label for="fees">
                                                        Consultancy Fees
                                                    </label>
                                                    <input type="text" name="fees" id="validateFees" class="form-control"
                                                           placeholder="Enter Consultancy Fees" required="true">
                                                </div>


                                                <div class="form-group">
                                                    <label for="AppointmentDate">
                                                        Date
                                                    </label>
                                                    <input class="form-control datepicker" name="appdate"
                                                           required="required" data-date-format="yyyy-mm-dd">
<!--                                                    --><?php
//                                                    date_default_timezone_set('Egypt/Cairo');
//                                                    $timezone = date_default_timezone_get();
//                                                    //$date=new DateTime($event['appdate']);
//                                                    $now=new DateTime();
//                                                    if($timezone<$now){
//                                                        echo 'date is in the past';
//                                                    }
//                                                    ?>

                                                </div>

                                                <div class="form-group">
                                                    <label for="Appointmenttime">

                                                        Time

                                                    </label>
                                                    <input class="form-control" name="apptime" id="timepicker1"
                                                           required="required">
                                                </div>

                                                <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- end: BASIC EXAMPLE -->


                <!-- end: SELECT BOXES -->

            </div>
        </div>
    </div>
    <!-- start: FOOTER -->
    <?php include('include/footer.php'); ?>
    <!-- end: FOOTER -->

    <!-- start: SETTINGS -->


    <!-- end: SETTINGS -->
</div>
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

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        startDate: '-3d'
    });
</script>
<script type="text/javascript">
    $('#timepicker1').timepicker();
</script>
<script>
    $(document).ready(function () {

        $('#validateAge').on("keydown", function (er) {
            var key = er.keyCode;
            if (!((key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                er.preventDefault();
            }
        });

        $('#validateNo').on("keydown", function (er) {
            var key = er.keyCode;
            if (!((key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                er.preventDefault();
            }
        });

        $('#validateFees').on("keydown", function (er) {
            var key = er.keyCode;
            if (!((key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                er.preventDefault();
            }
        });


    });

</script>
<!-- end: JavaScript Event Handlers for this page -->
<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</body>
</html>
