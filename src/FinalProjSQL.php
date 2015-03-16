
<?php
// create connection  ---> use login creds to access
require("../Final/connecter.php");
//variable to Create DB Table -->

$sqltable = "CREATE TABLE users ( 		
id INT AUTO_INCREMENT PRIMARY KEY,
Username VARCHAR(16) UNIQUE NOT NULL,
Password VARCHAR(16) NOT NULL
)";

$isValid = 0;

if (isset($_POST['username'])){
	$pattern = '/^[a-zA-Z0-9_]+$/';
	
	if (!preg_match($pattern,$_POST['username'])){
		echo "No white spaces or super weird characters (you know who you are)";
		$isValid++;
	}
	if (strlen($_POST['username']) > 16){
			echo "Too long (16 characters max)";
			$isValid++;
	}
	$results = mysqli_query($mysqli, "SELECT id from users WHERE Username='$_POST[username]'");
	$userExists = mysqli_num_rows($results);
	if ($userExists){
		echo "That username already exists!";
		$isValid++;
	}
	else if ($isValid == 0){
		echo "Username is available!";
	}
}
mysqli_close($mysqli);

?>


