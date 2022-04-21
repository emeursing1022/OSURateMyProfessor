<?php

// Searches the database (don't enter multiple fields of data)
if($_POST['search']) {
	session_start();
	// log in variables for database
	$host = "localhost";
	$username = "masterUser";
	$password = "password";
	$dbname = "osu_ratemyprofessor";
	
	// getting variable names from html
	$department = $_POST['department'];
	$count = 0;
	$x = 0;

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	// add the different outputs
	if($department != null){
		$query = 'SELECT * FROM department';
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($result)){
			if ($row['college'] == $department){
				echo "Department name: " . $row['college'] . "<br>";
				echo "Department address: " . $row['location'] . "<br>";
				echo "Department phone number: " . $row['phoneNum'] . "<br>";
				echo "Department email: " . $row['depEmail'] . "<br>";
				$_SESSION['deleteD'] = strval($row['college']);
				$college = $row['college'];
				$query = "SELECT courseNum FROM course WHERE college = '$college'";
				$result = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($result)){
					$count++;
				}
				echo "Number of courses taught by department: " . $count . "<br>";
				echo "<a href='../deleteD.html'>";
				echo "<input type='submit' name='delete' value='Delete department'>";
				echo "</input></a>";
				// Add which professors teach this course
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
			alert("No department found.");
			</script>
			<?php
		}	
	}
	else{
		?>
		<script type = "text/javascript">
		window.location = "../main.html";
		alert("No department entered.");
		</script>
		<?php
	}
	$conn->close();
}
?>