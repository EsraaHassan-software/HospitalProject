<?php
//include("include/config.php");
include_once("database.php");
class addReceptionist
{
    public function add_receptionist($rname, $raddress,$rcontact,$remail,$rpassword)
    {
        $d1 = new Database();
        $d1= Database::GetInstance();
        $query="insert into receptionists (recname, address, contact_no, email, password) values ('$rname','$raddress','$rcontact', '$remail','$rpassword')";
        $ret=mysqli_query($d1->GetConnection(),$query);
        
        return $ret;
    }
    
     public function delete_receptionist(){

         $d1 = new Database();
         $d1= Database::GetInstance();
        $query="delete from receptionists where id = '".$_GET['id']."'";
         $ret=mysqli_query($d1->GetConnection(),$query);
            
       return $ret;
        
    }
    
    public function get_receptionist($id) {
        $d1 = new database();
        $sql = "SELECT * FROM `receptionists` WHERE `id`='$id'";
        $result = mysqli_query($d1->GetConnection(),$sql);
        return $result;
    }
    
    public function edit_receptionist($id,$rname, $raddress,$gender,$rcontact,$remail,$rpassword){

        $d1 = new Database();
        $d1= Database::GetInstance();
        $query="UPDATE `receptionists` SET `recname`='$rname',`address`='$raddress', 'gender'='$gender',`contact_no`='$rcontact',`email`='$remail',`password`='$rpassword'' WHERE `id`= '$id'";
          $ret=mysqli_query($d1->GetConnection(),$query);
            
       return $ret;  
    }
   
}