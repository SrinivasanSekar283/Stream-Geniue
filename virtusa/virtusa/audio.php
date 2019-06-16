<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Stream Genie | Showcase </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
   <script src="main.js"></script>
</head>
<body style="text-align: center;background-image: url(bg.jpg); color:white; font-family: 'Aclonica'; font-size: 20px">
    <div style="text-align: center; padding-top:20px; font-family: 'Arizonia'; font-size: 90px">
		<p>Stream Genie</p>
	</div><br>

    <div id="navbar"> 
        <p id="username"></p>
        <p id="logout" onclick="logout()">Logout</p>
    </div>

    <?php
        require "conn.php";
        $id=$_GET['contentid'];
        
        $mysql_qry ="select * from contents where contentid like '$id'";
        $uni=mysqli_query($conn,$mysql_qry);
        $response=array();
        $rows=mysqli_fetch_array($uni);
        echo '<br><b style="font-size:30px;padding:20px">'.$rows[6].'</b><br><br><audio controls src="'.$rows[3].'">audio</audio><br><br><p style="font-size:20px;padding:20px" >'.$rows[7].'</p>';
        
    ?>
    


    </div>
</body>
<script>

        
        var str = document.cookie.split(';');
        var url_string = window.location.href;
        var url = new URL(url_string);
        var c = url.searchParams.get("type");
        if(getCookie('userid')==undefined){
            console.log('should login');
            // window.location = "localhost/virtusa/somehing.html";    
        }
       
        document.getElementById('username').innerHTML = "user id :"+getCookie('userid');
        console.log(str[0]);

        function logout(){
            delete_cookie('userid');

        }
        var delete_cookie = function(name) {
            document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
            window.location = "loginhtml.php";    

        };
        function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) return parts.pop().split(";").shift();
        }


    </script>
</html>