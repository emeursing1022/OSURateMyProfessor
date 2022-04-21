<?php

// Searches the database (don't enter multiple fields of data)
if(isset($_POST['submit'])) {
	
	session_start();
	
	// log in variables for database
	$host = "localhost";
	$username = "masterUser";
	$password = "password";
	$dbname = "osu_ratemyprofessor";
	
	// getting variable names from html
	$professor = $_POST['name'];
	$comment = $_POST['comment'];
	$maxID = 0;

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	// add the different outputs
	if($professor != null){
		$query = 'SELECT commentId FROM comments';
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_assoc($result)){
			$maxID++;
		}
		$maxID = $maxID+1;
		$date = date("Y-m-d");
		$stuEmail = $_SESSION['loginUser'];
		
		$query = "INSERT INTO comments VALUES ('$maxID', '$stuEmail', '$professor', '$date', '$comment')"; 
		$result = mysqli_query($conn, $query);
		$conn->close();
		?>
		<script type = "text/javascript">
		window.location = "../main.html";
		alert("Comment added succesfully.");
		</script>
		<?php
	}
	else{
		?>
		<script type = "text/javascript">
		window.location = "../main.html";
		alert("No professor entered.");
		</script>
		<?php
	}
	$conn->close();
}
?>