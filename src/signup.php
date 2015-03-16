<!DOCTYPE html>
<html>
<head><title>Sign up for ourBandz</title>
<script src="../Final/FinalProj.js"></script>
<link rel = "stylesheet" type = "text/css" href = "../Final/finalstyle.css">
</head>

<body>
<div id = "nav">
	<ul>
		<li><a href = "../Final/FinalProjLogin.html">Home</a></li>
	</ul>
</div>
	<h1>Welcome to ourBandz!</h1>
	<form name = "theForm" method = "post" id = "theForm" action = "../Final/login.php" onsubmit = "return validateForm()">
		Enter your brand new user name.<br>
		<input type = "text" id = "user" name = "username" onkeyup = "checkUsers(this.value);" required>
			<div id = "userCheck"> </div>
		<br><br>
		Enter your password:<br><input type = "password" id = "pass" name = "password" required>
		<div id = "passCheck"></div><br><br>
		<input type = "submit" id = "submit" value = "Submit">
	</form>
<p>
	
</p>

</body>
</html>