<?php

// Searches the database (don't enter multiple fields of data)
if($_POST['search']){
	session_start();
	// log in variables for database
	$host = "localhost";
	$username = "masterUser";
	$password = "password";
	$dbname = "osu_ratemyprofessor";
	$x = 0;
	
	// getting variable names from html
	$course = $_POST['course'];

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	if($course != null){
		$query = 'SELECT * FROM course';
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($result)){
			if ($row['CourseName'] == $course){
				echo "Course name: " . $row['CourseName'] . "<br>";
				echo "Course number: " . $row['courseNum'] . "<br>";
				echo "Credit hours: " . $row['CreditHours'] . "<br>";
				$_SESSION['deleteC'] = strval($row['courseNum']);
				// Add which professors teach this course
				echo "<a href='../deleteC.html'>";
				echo "<input type='submit' name='delete' value='Delete course'>";
				echo "</input></a>";
				echo "<a href='../main.html'>";
				echo "<input type='submit' value='Return'>";
				echo "</input></a>";
				$x = 1;
			}
		}
		if($x == 0){
			?>
			<script type = "text/javascript">
			window.location = "../main.html";
			alert("No course found.");
			</script>
			<?php
		}	
	}
	else{
		?>
		<script type = "text/javascript">
		window.location = "../main.html";
		alert("No course entered.");
		</script>
		<?php
	}
	$conn->close();
}
?>