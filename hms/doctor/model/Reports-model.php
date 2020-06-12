<?php
//include("include/config.php");
include_once("database.php");
class Reports
{
    public function add_Report($patName, $patContactno, $patEmail, $patGender, $patAddress, $patAge, $medicalHis, $bloodPressure, $weight, $bloodsugar, $temprature, $prescription)
    {

        $d1 = new Database();
        $d1= Database::GetInstance();
        $query = "INSERT INTO `reports`(`name`, `contactNO`, `email`, `gender`, `address`, `age`, `medicalHistory`, `bloodPressure`, `weight`, `bloodSugar`, `bodyTemp`, `prescription`) VALUES ('$patName','$patContactno','$patEmail','$patGender','$patAddress','$patAge','$medicalHis','$bloodPressure','$weight','$bloodsugar','$temprature','$prescription')";
        $ret = mysqli_query($d1->GetConnection(), $query);

        return $ret;
    }

    public function delete_report()
    {
        $d1= Database::GetInstance();
        $query = "DELETE FROM `reports` WHERE id = '" . $_GET['id'] . "'";
        $ret = mysqli_query($d1->GetConnection(), $query);

        return $ret;

    }

public function get_report($id) {
        $d1= Database::GetInstance();
        $sql = "SELECT * FROM `reports` WHERE `id`='$id'";
        $result = mysqli_query($d1->GetConnection(),$sql);
        return $result;
    }
    
    public function edit_report($id,$patName, $patContactno, $patEmail, $patGender, $patAddress, $patAge, $medicalHis, $bloodPressure, $weight, $bloodsugar, $temprature, $prescription){

        $d1 = new Database();
        $d1= Database::GetInstance();
        $query="UPDATE `reports` SET `name`='$patName',`contactNO`='$patContactno',`email`='$patEmail',`gender`='$patGender',`address`='$patAddress',`age`='$patAge',`medicalHistory`='$medicalHis',`bloodPressure`='$bloodPressure',`weight`='$weight',`bloodSugar`='$bloodsugar',`bodyTemp`='$temprature',`prescription`='$prescription' WHERE `id`= '$id'";
          $ret=mysqli_query($d1->GetConnection(),$query);
            
       return $ret;  
    }

}

   
   
   

?>