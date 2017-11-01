<?php

$db_host="localhost";
$db_user="aliexam2_admin";
$db_pass="123456789";
$db_name="aliexam2_anlineQustion";
$db_table="sms";

$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die("error1");

$con ->set_charset("utf8");

$response=array();

$username=$_POST['username'];
$mobile=$_POST['mobile'];
$reg=$_POST['register'];
$register= intval($reg);
//$int=intval($string);// $int is the converted string to integer  $int=intval('5');

$query = "INSERT INTO first_user VALUES('$username','$mobile','$register')";
$saved=mysqli_query($con,$query);
if($saved){
 $response["t"]=1;
	   echo json_encode($response);
}else
{
 $response["t"]=0;
	   echo json_encode($response);
}
 

?>