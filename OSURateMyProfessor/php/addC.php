<?php

// Searches the database (don't enter multiple fields of data)
if(isset($_POST['submit'])) {
	// log in variables for database
	$host = "localhost";
	$username = "masterUser";
	$password = "password";
	$dbname = "osu_ratemyprofessor";
	
	// getting variable names from html
	$number = $_POST['number'];
	$college = $_POST['college'];
	$hours = $_POST['hours'];
	$name = $_POST['name'];
	
	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = 'SELECT * FROM course';
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result)){
		if ($row['CourseName'] == $name){
			?>
			<script type = "text/javascript">
			alert("Course already exists");
			window.location = "../addC.html";
			</script>
			<?php
		}
		if ($row['courseNum'] == $number){
			?>
			<script type = "text/javascript">
			alert("Course already exists");
			window.location = "../addC.html";
			</script>
			<?php
		}
	}

	$query = "INSERT INTO course VALUES ('$number', '$college', '$hours', '$name')";
	$rs = mysqli_query($conn, $query);
	$conn->close();
	?>
	<script type = "text/javascript">
	alert("Course added successfully");
	window.location = "../main.html";
	</script>
	<?php
}
?>