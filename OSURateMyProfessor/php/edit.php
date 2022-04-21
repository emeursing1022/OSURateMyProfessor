<?php

// Searches the database (don't enter multiple fields of data)
if(isset($_POST['edit'])) {
	
	session_start();
	
	// log in variables for database
	$host = "localhost";
	$username = "masterUser";
	$password = "password";
	$dbname = "osu_ratemyprofessor";
	
	// getting variable names from html
	$check = $_SESSION['valid'];
	$user  = $_POST['user'];
	$pass  = $_POST['pass'];
	$email = $_POST['email'];
	$name  = $_POST['name'];
	$year  = $_POST['year'];
	$major = $_POST['major'];

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	// add the different outputs
	if($check != null){
		$query = 'SELECT * FROM student';
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($result)){
			if($row['stuEmail'] == $check){
				if($user != null){
					$query = "UPDATE student SET userName = '$user'";
					$rs = mysqli_query($conn, $query);
				}
				if($pass != null){
					$query = "UPDATE student SET stuPassword = '$pass'";
					$rs = mysqli_query($conn, $query);
				}
				if($email != null){
					$query = "UPDATE student SET stuEmail = '$email'";
					$rs = mysqli_query($conn, $query);
				}
				if($name != null){
					$query = "UPDATE student SET stuName = '$name'";
					$rs = mysqli_query($conn, $query);
				}
				if($year != null){
					$query = "UPDATE student SET stuYear = '$year'";
					$rs = mysqli_query($conn, $query);
				}
				if($major != null){
					$query = "UPDATE student SET major = '$major'";
					$rs = mysqli_query($conn, $query);
				}
				?>
				<script type = "text/javascript">
				window.location = "../main.html";
				alert("Account changed successfully.");
				</script>
				<?php
			}
		}
	}
	else{
		?>
		<script type = "text/javascript">
		window.location = "../edit.html";
		alert("No information was changed.");
		</script>
		<?php
	}
	$conn->close();
}
?>