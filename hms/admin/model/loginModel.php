<?php
//include("include/config.php");
include_once("database.php");
class loginModel
{
    public function login($username, $password)
    {

        $d1= Database::GetInstance();
        $ret=mysqli_query($d1->GetConnection(),"SELECT * FROM admin WHERE username='$username' and password='$password'");
        $num=mysqli_fetch_array($ret);
        return $num;
    }


}