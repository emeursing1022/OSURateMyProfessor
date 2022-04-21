<?php

// Searches the database (don't enter multiple fields of data)
if(isset($_POST['edit'])){
	session_start();
	
	// log in variables for database
	$host = "localhost";
	$username = "masterUser";
	$password = "password";
	$dbname = "osu_ratemyprofessor";
	
	// getting variable names from html
	$check = $_SESSION['loginUser'];

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
				?>
				<script type = "text/javascript">
				window.location = "../edit.html";
				</script>
				<?php
				$_SESSION['valid'] = $check;
			}
		}
	}
	else{
		?>
		<script type = "text/javascript">
		window.location = "../main.html";
		alert("Email could not be accepted, attempt to change not validated.");
		</script>
		<?php
	}
	$conn->close();
}
?>