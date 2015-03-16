
<?php // ********THIS PAGE STORES BAND INFO FROM FORM ON PROFILE PAGE************
session_start();
$band;
$username;
$seenLive;
$genre;
require("../Final/connecter.php");
if (isset($_GET['band']) && isset($_GET['genre']) && isset($_GET['submit'])){
	$band = $_GET['band'];
	$username = $_SESSION['id'];
	$genre = $_GET['genre'];
	$seenLive = $_GET['seenLive'];
	insertTable($mysqli, $username, $band, $seenLive, $genre);
}
// run function insertTable (adds data to DB)

function insertTable($mysqli, $username, $band, $seenLive, $genre){
	
	$insertsql = "INSERT INTO band (name, band, genre, seenLive) VALUES (?, ?, ?, ?)";
	$stmt = $mysqli->prepare($insertsql);
	if ($stmt){
		$stmt->bind_param('ssss', $username, $band, $genre, $seenLive);	
		if($stmt->execute()){
			echo "<div id = 'php'>New band added successfully. Click <a href = '../Final/profile.php'>here</a> to go back to your profile page.</div>";
			
		}
		else{
			if (mysqli_errno($mysqli) == 1062){echo "<div id = 'php'>Band already exists man.</div>";}	
		
			else{echo "Error: " . $insertsql . "<br>" . mysqli_error($mysqli);}
		}
	}
	$stmt->close();
	$_SESSION['isValid']++;
	
}		
mysqli_close($mysqli);
