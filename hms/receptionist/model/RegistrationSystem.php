<?php
include_once("database.php");
include_once("IObservable.php");

class RegistrationSystem implements IObservable
{
    private $observers = array();

    private function notify($name)
    {
        foreach ($this->observers as $o)
            $o->onPatientAdded( $name);
    }

    public function attach($observer)
    {
        $this->observers [] = $observer;
    }

    public function createUser($patname, $patConNo, $patEmail, $patGender, $patAdd, $patAge, $patMedhis)
    {
        // Add patient here
        $d1= Database::GetInstance();
        $query="insert into tblpatient
        ( PatientName, PatientContno, PatientEmail, PatientGender, PatientAdd, PatientAge, PatientMedhis)VALUES 
        ('$patname','$patConNo','$patEmail','$patGender','$patAdd','$patAge','$patMedhis')";
        $conn= $d1->GetConnection();
        $ret= mysqli_query($conn, $query);

        $this->notify($patname);
        if($ret)
            return $ret;
        return mysqli_error($conn);
    }
}