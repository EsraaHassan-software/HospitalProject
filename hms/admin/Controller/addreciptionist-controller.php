<?php
session_start();

//include('include/config.php');
include_once "../model/addReceptionist-model.php";

if(isset($_POST['submit']))
    
{	
     $object = new addReceptionist();
    $ret = $object->add_receptionist($_POST['receptionistname'], $_POST['receptionistaddress'],$_POST['receptionistcontact'],$_POST['Receptionistemail'],md5($_POST['npass']));
  
    if($ret==1)
    {
        echo "<script>alert('Receptionist info added Successfully');</script>";
        echo "<script>window.location.href ='../viewer/manage-receptionist.php'</script>";

    }else{
        echo "Failed";
    }
}

if(isset($_GET['del'])){
    
    $receptionist = new addReceptionist();
    $ret= $receptionist->delete_receptionist();
     if($ret==1)
  {
          $_SESSION['msg']="data deleted !!";
         echo "<script>alert('Receptionit info deleted Successfully');</script>";
       echo "<script>window.location.href ='../viewer/manage-receptionist.php'</script>";
}
    else{
        echo "failed"; 
    }
    
}

if (isset($_POST['edit-recep-btn'])){
    
     $receptionist = new addReceptionist();
    
    $ret= $receptionist->edit_receptionist($_POST['id'], $_POST['name'], $_POST['address'],$_POST['gender'],$_POST['contact_no'],$_POST['email'],$_POST['password'] );
     if($ret==1)
  {
         
         echo "<script>alert('Receptionist info edited Successfully');</script>";
       echo "<script>window.location.href ='../viewer/manage-receptionist.php'</script>";
}
    else{
        echo "failed"; 
    }
}
?>