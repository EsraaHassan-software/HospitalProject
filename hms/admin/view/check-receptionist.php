
<?php
include_once("../model/database.php");
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
    $d1= Database::GetInstance();
		$result =mysqli_query($d1->GetConnection(),"SELECT email FROM receptionists WHERE email='$email'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>