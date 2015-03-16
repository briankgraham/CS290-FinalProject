<!DOCTYPE html>
<html>
<head><title>Login to ourBandz</title>
	<link rel = "stylesheet" type = "text/css" href	 = "../Final/finalstyle.css">

</head>

<body>
	<div id = "nav">
		<ul>
			<li><a href = "../Final/FinalProjLogin.html">Back to Login</a></li>
		</ul>
	</div>
<?php
require("../Final/connecter.php");

if (isset($_POST['username']) && isset($_POST['password'])){
	$password = $_POST['password'];
	$username =$_POST['username'];
	insertTable($mysqli, $username, $password);
	
} // run function insertTable (adds data to DB)

function insertTable($mysqli, $username, $password){

	$insertsql = "INSERT INTO users (Username, Password) VALUES (?, ?)";	//Insert variables from Get to Table
	$stmt = $mysqli->prepare($insertsql);
	if ($stmt){
		$stmt->bind_param('ss', $username, $password);	
		if($stmt->execute()){
			echo "<div id = 'php'>New user added successfully. Click <a href = '../Final/FinalProjLogin.html'>here</a> to log in!</div>";
		}
		else{
			if (mysqli_errno($mysqli) == 1062){echo "<div id = 'php'>Duplicate Value. User already exists man. Click <a href = '../Final/FinalProjLogin.html'>here</a> to go back!</div>";}
			else{echo "Error: " . $insertsql . "<br>" . mysqli_error($mysqli);}
		}
	}
	$stmt->close();
	
}		
mysqli_close($mysqli);
?>

</body>
</html>