<?php
include_once("database.php");
class patientinfo{

    public function add_patient($patname, $patConNo,$patEmail,$patGender,$patAdd,$patAge,$patMedhis)
    {
        $d1 = new Database();
        $d1= Database::GetInstance();
        $query="insert into tblpatient
        ( PatientName, PatientContno, PatientEmail, PatientGender, PatientAdd, PatientAge, PatientMedhis)VALUES 
        ('$patname','$patConNo','$patEmail','$patGender','$patAdd',$patAge,'$patMedhis')";
        $conn= $d1->GetConnection();
        $ret= mysqli_query($conn,$query);
        if($ret)
            return $ret;
        return mysqli_error($conn);
    }


    public function delete_patient(){

        $d1 = new Database();
        $d1= Database::GetInstance();
        $query="delete from tblpatient where id = '".$_GET['id']."'";
        $ret=mysqli_query($d1->GetConnection(),$query);

        return $ret;

    }

    public function get_patient($id) {
        $d1 = new Database();
        $d1= Database::GetInstance();
        $sql = "SELECT * FROM `tblpatient` WHERE `ID`='$id'";
        $result = mysqli_query($d1->GetConnection(),$sql);
        return $result;
    }




    public function edit_patient($id,$patname, $patConNo,$patEmail,$patGender,$patAdd,$patAge,$patMedhis){

        //$d1 = new Database();
        $d1= Database::GetInstance();
        $conn= $d1->GetConnection();


        $query="UPDATE `tblpatient` 
        SET `PatientName`='$patname',
        `PatientContno`='$patConNo',
        `PatientEmail`='$patEmail',
        `PatientGender`='$patGender',
        `PatientAdd`='".mysqli_escape_string($conn,$patAdd)."',
        `PatientAge`=$patAge,
        `PatientMedhis`='$patMedhis' 
        WHERE `ID`='$id'";
        $ret= mysqli_query($conn,$query);
        if($ret)
            return $ret;
        return mysqli_error($conn);
    }


public function search_patient($contactNo){
    $d1= Database::GetInstance();
    $conn= $d1->GetConnection();
    $sql="SELECT * FROM `tblpatient` WHERE `PatientContno` LIKE '%$contactNo%'";
    //echo $sql;
    $result = mysqli_query($conn,$sql);
    $data=NULL;
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}


}
?>
