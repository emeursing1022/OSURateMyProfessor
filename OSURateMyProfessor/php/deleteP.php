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

$query = 'SELECT * FROM professor';
$result = mysqli_query($conn, $query);
$professorDelete = $_SESSION['deleteP'];
while ($row = mysqli_fetch_assoc($result)){
	if ($row['ProfName'] == $professorDelete){
		$query = "DELETE FROM professor WHERE ProfName = '$professorDelete'";
		$result = mysqli_query($conn, $query);
	}
}

?>