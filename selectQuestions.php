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
 $type=$_POST['type'];
// Attempt select query execution
$sql = "SELECT * FROM qustions WHERE  type='$type'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
            $response["questions"]=array();

        while($row = mysqli_fetch_array($result)){
           $temp=array();
			$temp["id"]=$row["id"];
			$temp["type"]=$row["type"];
			$temp["question"]=$row["question"];
			$temp["g1"]=$row["g1"];
			$temp["g2"]=$row["g2"];
			$temp["g3"]=$row["g3"];
			$temp["g4"]=$row["g4"];
		
				
			array_push($response["questions"] , $temp);
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
