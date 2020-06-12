<?php
session_start();
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