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

$departmentDelete = $_SESSION['deleteD'];
$query = "DELETE FROM department WHERE college = '$departmentDelete'";
$result = mysqli_query($conn, $query);
?>
<script type = "text/javascript">
window.location = "../main.html";
</script>
<?php

?>