<?php 
require "conn.php";
$ctype = $_POST["ctype"];
$category = $_POST["category"];
$age = $_POST["age"];
$access=$_POST["access"];
$name=$_POST["name"];

$description=$_POST["description"];

$target_dir = $ctype."/";
$target_path = $target_dir.basename($_FILES['fileToUpload']['name']);     
  
$src=$_FILES["fileToUpload"]["name"];
$mysql_qry = "INSERT INTO `contents` (`contentid`, `type`, `category`, `source`, `age`, `access`, `name`, `description`) VALUES(NULL, '$ctype', '$category', '$src', '$age', '$access','$name','$description');";
if ($conn->query($mysql_qry) === TRUE) {
        
		echo "We welcome you";
	
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "\n Your Unique id  ";
$uni=mysqli_query($conn,"select contentid from contents where name like '$name';");
$id=$uni->fetch_assoc();
echo $id["contentid"];
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_path)) {
    header("Location: /virtusa/display.php?type=video");
    die();   
    
} else {
    echo "Sorry, there was an error uploading your file.";
}
$conn->close();
 
?>