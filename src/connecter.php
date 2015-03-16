<?php $mysqli = mysqli_connect("oniddb.cws.oregonstate.edu", "grahamb2-db", "UFrfDyJHu2qOuuKD", "grahamb2-db");
if (mysqli_connect_errno()){echo "Failed.";}
$select = "SELECT * FROM band WHERE name = '$_SESSION[id]'";?>