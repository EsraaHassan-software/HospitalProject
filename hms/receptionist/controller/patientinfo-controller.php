<?php
session_start();

//include('include/config.php');





include_once "../model/patientinfo-model.php";
include_once "../model/RegistrationSystem.php";
include_once "../model/NewPatientMailer.php";

if(isset($_POST['submit'])) {

  //  $rs = new RegistrationSystem();
   // $rs->attach(new NewPatientMailer());

    $p = new patientinfo();

    $ret = $p->add_patient($_POST['patname'], $_POST['patConNo'], $_POST['patEmail'],
        $_POST['patGender'], $_POST['patAdd'], $_POST['patAge'], $_POST['patMedhis']);

   // $ret = $rs->createUser($_POST['patname'], $_POST['patConNo'], $_POST['patEmail'],
     //   $_POST['patGender'], $_POST['patAdd'], $_POST['patAge'], $_POST['patMedhis']);



    if ($ret) {
        echo "<script>alert('Patient info added Successfully');</script>";
       echo "<script>window.location.href ='../viewer/manage-patient.php'</script>";

    } else {
        echo "failed: ".$ret;
    }
}


    if (isset($_GET['del'])) {

        $patient = new patientinfo();
        $ret = $patient->delete_patient();
        if ($ret == 1) {
            $_SESSION['msg'] = "data deleted !!";
            echo "<script>alert('Patient info deleted Successfully');</script>";
            echo "<script>window.location.href ='../viewer/manage-patient.php'</script>";
        } else {
            echo "failed";
        }
    }


    if (isset($_POST['edit_btn'])) {

        $patient = new patientinfo();

        $ret = $patient->edit_patient($_POST['ID'], $_POST['patName'], $_POST['patContactNo'], $_POST['patemail'], $_POST['patgender'], $_POST['patAddress'], $_POST['patage'], $_POST['patMedHis']);
        if ($ret == 1) {

            echo "<script>alert('Patient info edited Successfully');</script>";
            echo "<script>window.location.href ='../viewer/manage-patient.php'</script>";
        } else {
            echo $ret;
        }


}



if (isset($_POST['searchdata'])) {

    $patient = new patientinfo();
    $ret=$patient->search_patient($_POST['contact']);
    $_SESSION['patientsSearch'] = $ret;
    $_SESSION['isSearching'] = TRUE;
    header("Location: ../viewer/manage-patient.php");
}

?>
