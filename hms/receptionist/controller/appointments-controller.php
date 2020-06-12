<?php
session_start();

//include('include/config.php');
include_once "../model/appointments-model.php";


if(isset($_POST['submit']))
{
    if ($_POST['appdate']<date("Y-m-d H:i:s")) {
        echo "<script>alert('Oops! Date has been passed.');</script>";
        echo "<script>window.location.href ='../viewer/book-appointment.php'</script>";
    } else {
        $app = new Appointments();
        $ret = $app->add_appointment($_POST['docname'], $_POST['patname'],$_POST['patEmail'],$_POST['patContNo'],$_POST['patAge'],$_POST['fees'],$_POST['appdate'],$_POST['apptime']);


        if($ret==1)
        {
            echo "<script>alert('appointment booked Successfully');</script>";
            echo "<script>window.location.href ='../viewer/appointment-history.php'</script>";

        } else {
            echo "failed";
        }
    }

}

if(isset($_GET['del'])){
    
   $app = new Appointments();
    $ret=$app->delete_appointment();
     if($ret==1)
  {
          $_SESSION['msg']="data deleted !!";
         echo "<script>alert('appointment deleted Successfully');</script>";
       echo "<script>window.location.href ='../viewer/appointment-history.php'</script>";
}
    else{
        echo "failed"; 
    }
}

if (isset($_POST['edit_btn'])){
    
    
     $app = new Appointments();
    $ret=$app->edit_appointment($_POST['id'],$_POST['docname'], $_POST['patname'],$_POST['patEmail'],$_POST['patContNo'],$_POST['patAge'],$_POST['fees'],$_POST['appdate'],$_POST['apptime']);

     if($ret==1)
  {
         
         echo "<script>alert('appointment info edited Successfully');</script>";
       echo "<script>window.location.href ='../viewer/appointment-history.php'</script>";
}
    else{
        echo "failed"; 
    }
    
}
?>