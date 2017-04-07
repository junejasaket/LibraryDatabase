<?php
$servername = "localhost";
$username = "junejasa_project";
$password = "CO0,@R^85ipf";
$db = "junejasa_LibraryDatabase";

$conn = new mysqli($servername,$username,$password,$db);

if ($conn->connect_error){
die("Connection failed: " . $conn->connect_error);
}
?>
