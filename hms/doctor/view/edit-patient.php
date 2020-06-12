<?php
session_start();
include('include/checklogin.php');
check_login();
include_once '../model/Reports-model.php';
$Rep = new Reports();
$result = $Rep->get_report($_GET['id']);
$report_exists = false;

while($row=mysqli_fetch_array($result))
{
    $report_exists = true;
    $patName = $row['name'];
    $patContactno = $row['contactNO'];
    $patEmail = $row['email'];
    $patGender = $row['gender'];
    $patAddress = $row['address'];
    $patAge = $row['age'];
    $medicalHis =$row['medicalHistory'];
    $bloodPressure = $row['bloodPressure'];
    $weight = $row['weight'];
    $bloodsugar = $row['bloodSugar'];
    $temprature = $row['bodyTemp'];
    $prescription = $row['prescription'];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Update Report</title>
		
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
						
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Patient | Update Report</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient</span>
</li>
<li class="active">
<span>Update Report</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Update Report</h5>
</div>
<div class="panel-body">
<?php
                                                    if($report_exists) {
                                                        ?>
													<form role="form" name="editrep" method="post" onSubmit="return valid();" action="../controller/Reports-controller.php">
                                                        <input type="hidden" name='id' value="<?php echo $_GET['id']; ?>">

<div class="form-group">
<label for="patname">
Patient Name
</label>
<input type="email" id="patemail" name="patemail" class="form-control"  value="<?php echo $patName; ?>" readonly='true'>
</div>
<div class="form-group">
<label for="fess">
 Patient Contact no
</label>
<input type="text" name="patcontact" class="form-control"  value="<?php echo $patContactno; ?>" required="true" maxlength="10" pattern="[0-9]+">
</div>
<div class="form-group">
<label for="fess">
Patient Email
</label>
<input type="email" id="patemail" name="patemail" class="form-control"  value="<?php echo $patEmail; ?>" readonly='true'>
<span id="email-availability-status"></span>
</div>
    <div class="clip-radio radio-primary">

        <input type="radio" id="rg-female" name="gender" <?php echo $patGender==1?'checked':''; ?> value="1" >
        <label for="rg-female">
            Female
        </label>
        <input type="radio" id="rg-male" name="gender" <?php echo $patGender==0?'checked':''; ?> value="0">
        <label for="rg-male">
            Male
        </label>
    </div>
</div>
<div class="form-group">
<label for="address">
Patient Address
</label>
<textarea name="pataddress" class="form-control" required="true"><?php echo $patAddress; ?></textarea>
</div>
<div class="form-group">
<label for="fess">
 Patient Age
</label>
<input type="text" name="patage" class="form-control"  value="<?php echo $patAge; ?>" required="true">
</div>
<div class="form-group">
<label for="fess">
 Medical History
</label>
<textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"><?php echo $medicalHis; ?></textarea>
</div>	

    <div class="form-group">
        <label for="bloodpressure">
            Blood Pressure
        </label>
        <input type="text" name="patbloodpressure" class="form-control" value="<?php echo $bloodPressure; ?>" placeholder="Enter patients's blood pressure" required="true">
    </div>

    <div class="form-group">
        <label for="weight">
            Weight
        </label>
        <input type="text" name="patweight" class="form-control" value="<?php echo $weight; ?>" placeholder="Enter Patient's weight'" required="true">
    </div>

    <div class="form-group">
        <label for="bloodsugar">
            Blood Sugar
        </label>
        <input type="text" name="patbloodsugar" class="form-control" value="<?php echo $bloodsugar; ?>" placeholder="Enter Patient's blood sugar'" required="true">
    </div>

    <div class="form-group">
        <label for="bodytemprature">
            Body Temprature
        </label>
        <input type="text" name="patbodytemprature" class="form-control" value="<?php echo $temprature; ?>"  placeholder="Enter Patient's body temprature'" required="true">
    </div>

    <div class="form-group">
        <label for="precription">
            Prescription
        </label>
        <textarea type="text" name="patprecription" class="form-control"  placeholder="Enter Patient's prescription'" required="true"><?php echo $prescription; ?></textarea>
    </div>

<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Update
</button>
</form>
<?php
                                                    } else {
                                                        echo "<h1>patient dosent exist!</h1>";
                                                    }
                                                    ?>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>
			<!-- start: FOOTER -->
<?php include('include/footer.php');?>
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
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
