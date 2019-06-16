<?php 
require "conn.php";
$name = $_POST["name"];
$email = $_POST["email"];
$age = (int)$_POST["year"];
$age = (int)date('Y') - $age;
$password = $_POST["password"];
$type=$_POST["type"];
$referral=$_POST['referral'];
$mysql_qry = "INSERT INTO `user` (`userid`, `name`, `email`, `age`, `password`, `type`,`credit`) VALUES (NULL, '$name', '$email', '$age', '$password', '$type',0);";
if ($conn->query($mysql_qry) === TRUE) {
	
        echo "We welcome you";
        $mysql_qry2="UPDATE user SET credit=credit+50 where userid='$referral';";
        if ($conn->query($mysql_qry2) === TRUE){

        $uni=mysqli_query($conn,"select userid from user where email like '$email';");
        $id=$uni->fetch_assoc();
        echo $id["userid"];
        $id2=$id["userid"];
        $mysql_qry3="UPDATE user SET credit=credit+10 where userid='$id2';";
        $uni=mysqli_query($conn,$mysql_qry3);
        // echo "success";
            if($type == 'free'){
                echo '
                <script type="text/javascript">
                window.location="loginhtml.php";
                </script>';            
            }else{
                echo '
                <script type="text/javascript">
                window.location="credit.php";
                </script>';   
            }
        }else{
            echo "Error Invalid referral";
        }
        
} else {
    echo '
    <script type="text/javascript">
    window.alert("User already registered");
    window.location="signuphtml.php";
    </script>';
}


$conn->close();
 
?>