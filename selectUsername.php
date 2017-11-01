<?php

$db_host="localhost";
$db_user="aliexam2_admin";
$db_pass="123456789";
$db_name="aliexam2_anlineQustion";
$db_table="first";

$link = mysqli_connect("localhost",$db_user, $db_pass, $db_name);
$link ->set_charset("utf8");


$response=array();

 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 $user=$_POST['username'];

 $mobile=$_POST['mobile'];
 
// Attempt select query execution
$sql = "SELECT username , mobile FROM first_user WHERE  username='$user' or mobile = '$mobile'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
            $response["umCheck"]=array();

        while($row = mysqli_fetch_array($result)){
           $temp=array();
			$username=$row["username"];
			$mobile2=$row["mobile"];
			
			if($username == $user && $mobile2 ==$mobile )
			{
			       $temp["check"] = "um";

			}
			else{
			if($username == $user )
			{
			       $temp["check"] = "u";

			}
			if($mobile2 == $mobile )
			{
			        $temp["check"] = "m";
	

			}
			}
			array_push($response["umCheck"] , $temp);
				
        }
        $response["t"]=1;
	   echo json_encode($response);
        // Free result set
        mysqli_free_result($result);
    } else{
    
       
	   $response["message"]="not found";
	    $response["t"]=0;
	   echo json_encode($response);
    }
} else{
    
}
 
// Close connection
mysqli_close($link);


?>
