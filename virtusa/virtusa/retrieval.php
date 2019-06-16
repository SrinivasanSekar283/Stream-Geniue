<?php
require "conn.php";
$type=$_POST['type'];
$mysql_qry ="select * from contents where type like '$type';";
$uni=mysqli_query($conn,$mysql_qry);
$response=array();
while($rows=mysqli_fetch_array($uni))
{
 array_push($response,array("id"=>$rows[0],"idea"=>$rows[1],"category"=>$rows[2], 'source'=>$rows[3], 'age'=>$rows[4], 'access'=>$rows[5], 'name'=>$rows[6], 'description'=>$rows[7]));
}	
echo json_encode(array("server_response"=>$response));
mysqli_close($conn); 
?>