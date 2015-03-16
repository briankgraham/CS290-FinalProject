<?php 
require("../Final/connecter.php");
$result = mysqli_query($mysqli, $select);			
echo "<div id = 'BandTable'>Your Bandz</div><table>
<tr><th>Band Name</th><th>Genre</th><th>Seen 'em Live?</th><th>Seen 'em Button</th>";
while($row = mysqli_fetch_array($result)){ 				
	$band = $row['band'];
	$genre = $row['genre'];
	$seenLive = $row['seenLive'];
	$id = $row['id'];
	echo "<tr><td><form action='' method='get'><input type='hidden' name='delKey' value='$id'>" .$band."</td>";
	echo "<td>".$genre."</td>";
	echo "<td>".$seenLive."</td><td><input type='hidden' name='changeStatus' value='$id'><input type='submit' name = 'Status' value='Seen Live?'></td></form>";
}
echo "</table>";	

mysqli_close($mysqli);?>