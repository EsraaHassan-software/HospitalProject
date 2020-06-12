<?php
//session_start();
//include("include/config.php");
include_once "../model/loginModel.php";
if(isset($_POST['submit']))
{
    $l1 = new loginModel();
    $num = $l1->login($_POST['username'], $_POST['password']);
//    $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
//    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $_SESSION['login']=$_POST['username'];
        header("Location: ../viewer/dashboard.php");
        exit();
    }
    else
    {
        $_SESSION['errmsg']="Invalid username or password";

        header("Location: ../viewer/index.php");
        exit();
    }
}

if(isset($_POST['reset'])){

    $l1 = new loginModel();
    $exists = $l1->forgot_password($_POST['email']);

    if($exists){
        echo "true";
       //$_SESSION['email']=$_POST['email'];
       // header("Location:../viewer/reset-password.php");
    }
    else
    {
        echo "failed";
        //echo "<script>alert('Invalid details. Please try with valid details');</script>";
       // echo "<script>window.location.href ='../viewer/forgot-password.php'</script>";
    }

}

if(isset($_GET['token'])) {
    $l1 = new loginModel();
    $result = $l1->check_token($_GET['token']);
    $tokenExists=false;
    $date = date("Y-m-d H:i:s");
    while ($row = mysqli_fetch_array($result)) {
        if($date<=$row['expired_at']) {

            if ($row['available']) {
                $_SESSION['email_reset']=$row['email'];
            }
            header("Location:../viewer/reset-password.php");
        } else {
            $tokenExists = false;
        }
    }
    if(!$tokenExists) {
        echo "Token is not valid";
    }

}

if(isset($_POST['change'])){
    $l1 = new loginModel();
    $num = $l1->reset_password($_POST['password']);
    if ($num) {
        unset($_SESSION['email_reset']);
        echo "<script>alert('Password successfully updated.');</script>";
        echo "<script>window.location.href ='../viewer/index.php'</script>";
    }

}

?>