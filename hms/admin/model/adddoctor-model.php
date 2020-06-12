

<?php
//include("include/config.php");
include_once("database.php");
class addDoctor
{
    public function add_doctor($docname, $docaddress,$docfees,$doccontactno,$docemail,$password)
    {
        $d1 = new Database();
        $d1= Database::GetInstance();
        $query="insert into doctors(doctorName,address,docFees,contactno,docEmail,password) values('$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')";
        $ret=mysqli_query($d1->GetConnection(),$query);
            
       return $ret;
    }
    
    public function delete_doctor(){
        
        $d1 = new Database();
        $d1= Database::GetInstance();
        $query="delete from doctors where id = '".$_GET['id']."'";
         $ret=mysqli_query($d1->GetConnection(),$query);
            
       return $ret;
        
    }
    
    public function get_doctor($id) {
        $d1 = new Database();
        $sql = "SELECT * FROM `doctors` WHERE `id`='$id'";
        $result = mysqli_query($d1->GetConnection(),$sql);
        return $result;
    }
    
    public function edit_doctor($id, $docname, $docaddress,$docfees,$doccontactno,$docemail,$password, $gender){
        
         $d1 = new Database();
        $d1= Database::GetInstance();
        $query="UPDATE `doctors` SET `doctorName`='$docname',`address`='$docaddress',`docFees`='$docfees',`contactno`='$doccontactno',`docGender`='$gender',`docEmail`='$docemail',`password`='$password' WHERE `id`= '$id'";
          $ret=mysqli_query($d1->GetConnection(),$query);
            
       return $ret;  
    }
   
   
   
}
?>


