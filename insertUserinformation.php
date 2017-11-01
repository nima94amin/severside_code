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
$name=$_POST['name'];
$family=$_POST['family'];
$fathername=$_POST['fathername'];
$code=$_POST['code'];
$email=$_POST['email'];
$ostan=$_POST['ostan'];
$city=$_POST['city'];
$mobile=$_POST['mobile'];
$address=$_POST['address'];
$image_address=$_POST['imageAdress'];

//$int=intval($string);// $int is the converted string to integer  $int=intval('5');


$query = "INSERT INTO users VALUES('$username','$name','$family','$fathername','$code','$email','$ostan','$city','$address','$mobile','$image_address')";
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