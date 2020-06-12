<?php
//include("include/config.php");
include_once("database.php");
class loginModel
{
    public function login($email, $password)
    {
        $d1 = new Database();
        $d1= Database::GetInstance();
        $ret=mysqli_query($d1->GetConnection(),"SELECT * FROM receptionists WHERE email='$email' and password='$password'");
        $num=mysqli_fetch_array($ret);
        return $num;
    }
}