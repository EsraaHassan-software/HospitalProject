<?php
include_once("database.php");
class appointments
{
    public function getAppointmentsByDoctorEmail($email)
    {
        $d1= Database::GetInstance();
        $sql = "SELECT * FROM `appointment` WHERE `doctorName`='$email'";
        $result = mysqli_query($d1->GetConnection(),$sql);
        return $result;
    }
}