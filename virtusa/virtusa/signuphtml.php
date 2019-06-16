<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Sign up - Stream Genie</title>
<link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
input, select {
	color: grey;
	width: 250px;
	padding: 10px;
	font-style: oblique;
	border-radius: 20px;
}
input:focus {
  border: 5px solid black;
}
select:focus {
  border: 5px solid black;
}
</style>
</head>

<body style="background-image: url(bg.jpg);color:white; font-family: 'Aclonica'; font-size: 14px">
	<div style="text-align: center; padding-top:20px; font-family: 'Arizonia'; font-size: 90px">
		<p>Stream Genie</p>
	</div>
	<hr>
		<div style="text-align:center">
			<br>
			<h2>Sign Up</h2>
			<br>
			<form action="signup.php" method = "post" target="_blank">
  			<input type="text" name="name" placeholder="Name"><br><br>
  			<input type="text" name="email" placeholder="email"><br><br>
  			Date of Birth:<br><br>
	  			  	<input type="text" name="date" placeholder="Date" style="width: 120px">
	  			
	  				<select name="month" style="width: 120px">
	  				<option value="" selected="selected">Month</option>
  					<option value="jan">January</option>
  					<option value="feb">February</option>
  					<option value="mar">March</option>
  					<option value="apr">April</option>
  					<option value="may">May</option>
  					<option value="jun">June</option>
  					<option value="jul">July</option>
  					<option value="aug">August</option>
  					<option value="sep">September</option>
  					<option value="oct">October</option>
  					<option value="nov">Novemeber</option>
  					<option value="dec">December</option>
					</select> 
	  			
	  			  	<input type="text" name="year" placeholder="Year" style="width: 120px">
  			<br><br>
  			Gender:<br><br>
  			<input style="width:40px" type="radio" name="gender" value="male" checked> Male
  			<input style="width:40px" type="radio" name="gender" value="female"> Female
  			<input style="width:40px" type="radio" name="gender" value="other"> Other<br><br>
  			<input type="text" name="email" placeholder="E-mail"><br><br>
  			<input type="password" name="password" placeholder="Password"><br><br>
  			<input type="password" name="confirmpassword" placeholder="Confirm Password"><br><br>
  			Account Type:<br><br>
  			<input style="width:40px" type="radio" name="type" value="premium" checked> Premium
  			<input style="width:40px" type="radio" name="type" value="free"> Free<br><br>
  			<input type="text" name="referral" placeholder="Referral Code (if available)"><br><br>
            <input type="submit" name="signup" value="Submit" style="color: black; width: 100px"><br>
			</form>
		</div>
</body>
</html>