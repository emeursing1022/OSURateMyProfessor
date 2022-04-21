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
	$name = $_POST['name'];
	$satisfaction = $_POST['satisfaction'];
	$difficulty = $_POST['difficulty'];
	$total = 1;
	
	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	$query = 'SELECT * FROM professor';
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_assoc($result)){
		if ($row['ProfName'] == $name){
			?>
			<script type = "text/javascript">
			alert("Professor already exists");
			window.location = "../addP.html";
			</script>
			<?php
		}
	}

	$query = "INSERT INTO professor VALUES ('$name', '$satisfaction', '$difficulty', '$total')";
	$rs = mysqli_query($conn, $query);
	$conn->close();
	?>
	<script type = "text/javascript">
	alert("Professor added successfully");
	window.location = "../main.html";
	</script>
	<?php
}
?>