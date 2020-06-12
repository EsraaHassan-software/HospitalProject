<?php
//include("include/config.php");
include_once("database.php");

class Appointments
{
    public function add_appointment($docname, $patname, $patemail, $patcontactno, $patAge, $fees, $appdate, $apptime)
    {
       // $d1 = new Database();
        $d1 = Database::GetInstance();

        $query = "INSERT INTO `appointment`( `doctorName`, `patientName`, `patientEmail`, `patientNumber`, `patientAge`, `consultancyFees`, `appointmentDate`, `appointmentTime`) VALUES ('$docname','$patname','$patemail','$patcontactno','$patAge','$fees','$appdate','$apptime')";
        $ret = mysqli_query($d1->GetConnection(), $query);

        return $ret;
    }

    public function delete_appointment()
    {

        $d1 = new Database();
        $d1 = Database::GetInstance();

        $query = "DELETE FROM `appointment` WHERE id = '" . $_GET['id'] . "'";
        $ret = mysqli_query($d1->GetConnection(), $query);

        return $ret;

    }

    public function get_appointment($id)
    {
        $d1 = new Database();
        $d1 = Database::GetInstance();

        $sql = "SELECT * FROM `appointment` WHERE `id`='$id'";
        $result = mysqli_query($d1->GetConnection(), $sql);
        return $result;
    }

    public function edit_appointment($id, $docname, $patname, $patemail, $patcontactno, $patAge, $fees, $appdate, $apptime)
    {

        $d1 = new Database();
        $d1 = Database::GetInstance();

        $query = "UPDATE `appointment` SET `id`='$id',`doctorName`='$docname',`patientName`='$patname',`patientEmail`='$patemail',`patientNumber`='$patcontactno',`patientAge`='$patAge',`consultancyFees`='$fees',`appointmentDate`='$appdate',`appointmentTime`='$apptime' WHERE `id`= '$id'";
        $ret = mysqli_query($d1->GetConnection(), $query);

        return $ret;
    }

    public function getAllDoctors()
    {
        $d1 = Database::GetInstance();
        $sql = "SELECT * FROM `doctors`";
        $ret = mysqli_query($d1->GetConnection(), $sql);
        return $ret;
    }

}


?>
