<?php
session_start();

//include('include/config.php');
include_once "../model/adddoctor-model.php";


if(isset($_POST['submit']))
{
     $doctor = new addDoctor();
    $ret = $doctor->add_doctor($_POST['docname'], $_POST['clinicaddress'],$_POST['docfees'],$_POST['doccontact'],$_POST['docemail'],$_POST['npass']);


    if($ret==1)
  {
       echo "<script>alert('Doctor info added Successfully');</script>";
       echo "<script>window.location.href ='../viewer/manage-doctors.php'</script>";

    } else {
    echo "failed";
    }
}

if(isset($_GET['del'])){
    
    $doctor = new addDoctor();
    $ret=$doctor->delete_doctor();
     if($ret==1)
  {
          $_SESSION['msg']="data deleted !!";
         echo "<script>alert('Doctor info deleted Successfully');</script>";
       echo "<script>window.location.href ='../viewer/manage-doctors.php'</script>";
}
    else{
        echo "failed"; 
    }
}

if (isset($_POST['edit_btn'])){
    
     $doctor = new addDoctor();
    
    $ret=$doctor->edit_doctor($_POST['id'], $_POST['name'], $_POST['address'],$_POST['fees'],$_POST['contact_no'],$_POST['email'],$_POST['password'], $_POST['gender']);
     if($ret==1)
  {
         
         echo "<script>alert('Doctor info edited Successfully');</script>";
       echo "<script>window.location.href ='../viewer/manage-doctors.php'</script>";
}
    else{
        echo "failed"; 
    }
    
}
?>