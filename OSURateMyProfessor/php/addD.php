<?php

// don't forget department name as a value in the department table
// Searches the database (don't enter multiple fields of data)
if(isset($_POST['submit'])) {
	// log in variables for database
	$host = "localhost";
	$username = "masterUser";
	$password = "password";
	$dbname = "osu_ratemyprofessor";
	
	// getting variable names from html
	$college = $_POST['college'];
	$phone = $_POST['phone'];
	$location = $_POST['location'];
	$email = $_POST['email'];
	
	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = 'SELECT * FROM department';
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result)){
		if ($row['college'] == $college){
			?>
			<script type = "text/javascript">
			alert("Department already exists");
			window.location = "../addD.html";
			</script>
			<?php
		}
	}

	$query = "INSERT INTO department VALUES ('$college', '$phone', '$location', '$email')";
	$rs = mysqli_query($conn, $query);
	$conn->close();
	?>
	<script type = "text/javascript">
	alert("Department added successfully");
	window.location = "../main.html";
	</script>
	<?php
}
?>