<?php

// don't forget department name as a value in the department table
// Searches the database (don't enter multiple fields of data)
if(isset($_POST['reset'])) {
	// log in variables for database
	$host = "localhost";
	$username = "masterUser";
	$password = "password";
	$dbname = "osu_ratemyprofessor";
	
	// getting variable names from html
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = 'SELECT * FROM student';
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result)){
		
		if ($row['stuEmail'] == $email){
			if($row['stuPassword'] == $pass){
				?>
				<script type = "text/javascript">
				alert("New password cannot be the same as old password.");
				window.location = "../forgotPassword.html";
				</script>
				<?php
			}
			else{
				$query = "UPDATE student SET stuPassword = '$pass'";
				$rs = mysqli_query($conn, $query);
				$conn->close();
				?>
				<script type = "text/javascript">
				alert("Password changed successfully.");
				window.location = "../index.html";
				</script>
				<?php
			}
		}
	}
	
	$conn->close();
	?>
	<script type = "text/javascript">
	alert("Please enter a valid email.");
	window.location = "../forgotPassword.html";
	</script>
	<?php
}
?>