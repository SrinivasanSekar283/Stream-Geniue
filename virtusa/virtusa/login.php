<?php
require "conn.php";
$user_name = $_POST["user_name"];
$user_pass = $_POST["password"];
$mysql_qry = "select * from user where email like '$user_name' and password like '$user_pass';";
$result = mysqli_query($conn ,$mysql_qry);
if(mysqli_num_rows($result) > 0) {
$uni=mysqli_query($conn,"select userid,type from user where email like '$user_name';");
$id=$uni->fetch_assoc();
setcookie("userid", $id["userid"]);
setcookie("access", $id["type"]);


if($user_name=="admin@admin.com"){
    header("Location: /virtusa/upload.php");
    die();    
}

header("Location: /virtusa/display.php?type=video");
die();
}
else {
    echo '
    <script type="text/javascript">
    window.alert("Invalid Username or password");
    window.location="loginhtml.php";
    </script>';
}
?>