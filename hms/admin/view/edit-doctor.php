<?php
session_start();
include('include/checklogin.php');
check_login();
include_once '../model/adddoctor-model.php';
$d1 = new addDoctor();
$result = $d1->get_doctor($_GET['id']);
$doctor_exists = false;

while($row=mysqli_fetch_array($result))
{
    $doctor_exists = true;
    $name = $row['doctorName'];
    $address = $row['address'];
    $fees = $row['docFees'];
    $contact_no = $row['contactno'];
    $gender = $row['docGender'];
    $email = $row['docEmail'];
    $password = $row['password'];
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Edit Doctor Details</title>
		
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
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Edit Doctor Details</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Edit Doctor Details</span>
									</li>
								</ol>
							</div>
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
													<h5 class="panel-title">Edit Doctor info</h5>
												</div>
												<div class="panel-body">
									


<hr/>
 
                                                    <?php
                                                    if($doctor_exists) {
                                                        ?>
													<form role="form" name="adddoc" method="post" onSubmit="return valid();" action="../controller/adddoctor-controller.php">
                                                        <input type="hidden" name='id' >

<div class="form-group">
															<label for="doctorname">
																 Doctor Name
															</label>
					<input type="text" value="<?php echo $name; ?>" name="name" class="form-control"  placeholder="Enter Doctor Name" required="true">
														</div>


<div class="form-group">
															<label for="address">
																 Doctor Clinic Address
															</label>
					<textarea name="address" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true"><?php echo $address; ?></textarea>
														</div>
<div class="form-group">
															<label for="fees">
																 Doctor Consultancy Fees
															</label>
					<input type="text" value="<?php echo $fees; ?>" name="fees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
														</div><br>

                                                        <div class="clip-radio radio-primary">

                                                            <input type="radio" id="rg-female" name="gender" <?php echo $gender==1?'checked':''; ?> value="1" >
                                                            <label for="rg-female">
                                                                Female
                                                            </label>
                                                            <input type="radio" id="rg-male" name="gender" <?php echo $gender==0?'checked':''; ?> value="0">
                                                            <label for="rg-male">
                                                                Male
                                                            </label>
                                                        </div>
                                                </div>
<div class="form-group">
									<label for="contact_no">
																 Doctor Contact no
															</label>
					<input type="text" value="<?php echo $contact_no; ?>" name="contact_no" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
														</div>

<div class="form-group">
									<label for="fees">
																 Doctor Email
															</label>
<input type="email" value="<?php echo $email; ?>" id="docemail" name="email" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()" >
<span id="email-availability-status"></span>
</div>



														
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Password
															</label>
					<input type="password"  name="password" class="form-control"  placeholder="New Password" required="required">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword2">
																Confirm Password
															</label>
									<input type="password" name="confirm_password" class="form-control"  placeholder="Confirm Password" required="required">
														</div>
														
														
														
														<button type="submit" name="edit_btn" id="submit" class="btn btn-o btn-primary">
															Submit
														</button>
													</form>
                                                
                                                <?php
                                                    } else {
                                                        echo "<h1>Doctor dosent exist!</h1>";
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
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	
			<>
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
