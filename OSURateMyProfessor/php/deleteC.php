<?php
session_start();
// log in variables for database
$host = "localhost";
$username = "masterUser";
$password = "password";
$dbname = "osu_ratemyprofessor";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . mysqli_connect_error());
}

$courseDelete = $_SESSION['deleteC'];
$query = 'SELECT * FROM course';
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)){
	if ($row['courseNum'] == $courseDelete){
		$query = "DELETE FROM course WHERE courseNum = '$courseDelete'";
		$result = mysqli_query($conn, $query);
	}
}

?>