<?php
session_start();

//include('include/config.php');
include_once "../model/Reports-model.php";


if(isset($_POST['submit']))
{
    $Rep = new Reports();
    $ret = $Rep->add_Report($_POST['patname'], $_POST['patcontact'],$_POST['patemail'],$_POST['gender'],$_POST['pataddress'],$_POST['patage'],$_POST['medhis'],$_POST['patbloodpressure'],$_POST['patweight'],$_POST['patbloodsugar'],$_POST['patbodytemprature'],$_POST['patprecription']);


    if($ret==1)
    {
        echo "<script>alert('report info added Successfully');</script>";
        echo "<script>window.location.href ='../viewer/view-patient.php'</script>";

    } else {
        echo "failed";
    }
}

if(isset($_GET['del'])){
    
   $Rep = new Reports();
    $ret=$Rep->delete_report();
     if($ret==1)
  {
          $_SESSION['msg']="data deleted !!";
         echo "<script>alert('patient info deleted Successfully');</script>";
       echo "<script>window.location.href ='../viewer/view-patient.php'</script>";
}
    else{
        echo "failed"; 
    }
}

if (isset($_POST['edit_btn'])){
    
    
    $Rep = new Reports();
    $ret=$Rep->edit_report($_POST['id'], $_POST['patname'], $_POST['patcontact'],$_POST['patemail'],$_POST['pataddress'],$_POST['patage'],$_POST['medhis'],$_POST['patbloodpressure'],$_POST['patweight'],$_POST['patbloodsugar'],$_POST['patbodytemprature'],$_POST['patprecription']);

     if($ret==1)
  {
         
         echo "<script>alert('patient info edited Successfully');</script>";
       echo "<script>window.location.href ='../viewer/view-patient.php'</script>";
}
    else{
        echo "failed"; 
    }
    
}
?>