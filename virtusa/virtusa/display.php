<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Stream Genie | Showcase </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet'>
    <script src="main.js"></script>
</head>
<style>
    * {
        text-decoration: none;
    }
    input {
	color: grey;
	width: 50px;
	padding: 10px;
	font-style: oblique;
	border-radius: 20px;
	}
	a:link {
  text-decoration: none;
  color: white;
  padding-right: 25px;
}
    </style>
<body style="background-image: url(bg.jpg); color:white; font-family: 'Aclonica'; font-size: 20px">
    <div style="text-align: center; padding-top:20px; font-family: 'Arizonia'; font-size: 90px">
		<p>Stream Genie</p>
	</div><br>
    <div id="navbar"> 
        <p id="username"></p>
        <p id="logout" onclick="logout()">Logout</p>
    </div>
    <center style="padding:15px;">
    <br><br>
    <h2>What do you want to view?</h2>
    <form style="padding: 30px"> 
        <input type="radio" name="type" id="video" > Video 
        <input type="radio" name="type" id="audio"> Audio
        <input type="radio" name="type" id="text"> Text
        <input type="button" value="Go" onclick="caller()"> 
    </form>
    </center>

    <div id="content">
    <?php 
        require "conn.php";
        $type=$_GET['type'];
        $access = $_COOKIE["access"];
        if($access=="free"){
            $mysql_qry ="select * from contents where type like '$type' and access like '$access';";
        }
        else{
            $mysql_qry ="select * from contents where type like '$type' ;";
        }
        $uni=mysqli_query($conn,$mysql_qry);
        $response=array();
        
        echo "<hr>";
        while($rows=mysqli_fetch_array($uni))
        {
        // array_push($response,array("id"=>$rows[0],"idea"=>$rows[1],"category"=>$rows[2], 'source'=>$rows[3], 'age'=>$rows[4], 'access'=>$rows[5], 'name'=>$rows[6], 'description'=>$rows[7]));
        echo '<div style=" padding: 15px;color:red;">'.$rows[0].' <a style="text-decoration:none;" href="'.$rows[1].'.php?contentid='.$rows[0].'"> '.$rows[6].'</a> <br>'.$rows[7].'</div><hr>';
        }	
        // echo json_encode(array("server_response"=>$response));
        mysqli_close($conn); 
    

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
            window.location = "loginhtml.php";    
        }
        if(c=="video"){
            document.getElementById('video').checked = true;
        }
        else if(c=="audio"){
            document.getElementById('audio').checked = true;
        }
        else{
            document.getElementById('text').checked = true;
        }
        document.getElementById('username').innerHTML = "user id :"+getCookie('userid');
        console.log(str[0]);

        function logout(){
            delete_cookie('userid');
            delete_cookie('access');
            delete_cookie('type');

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

        function caller(){
            console.log('incaller');
            if(document.getElementById('video').checked == true){
                window.location.replace("display.php?type=video");
            }
            else if(document.getElementById('audio').checked == true){
                window.location.replace("display.php?type=audio");
            }
            else{
                window.location.replace("display.php?type=text");
            }
        }

    </script>
    <style> * { text-decoration:none;} </style>

</html>