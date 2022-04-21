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
	$professor = $_POST['professor'];
	$x = 0;

	// Create connection
	$conn = new mysqli($host, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	// add the different outputs
	if($professor != null){
		$query = 'SELECT * FROM professor';
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($result)){
			if ($row['ProfName'] == $professor){
				echo "Professor name: " . $row['ProfName'] . "<br>";
				if ($row['rating'] == NULL){
					echo "Student satisfaction rating: N/A <br>";
				}
				else{
					echo "Student satisfaction rating: " . $row['rating'] . "<br>";
				}
				if ($row['difficulty'] == NULL){
					echo "Student difficulty rating: N/A <br>";
				}
				else{
					echo "Student difficulty rating: " . $row['difficulty'] . "<br>";
				}
				if($row['total'] == NULL){
					echo "Number of students who scored this professor: N/A <br>";
				}
				else{
					echo "Number of students who scored this professor: " . $row['total'] . "<br>";
				}
				
				echo "Comments about professor: <br>";
				
				$query = "SELECT * FROM comments";
				$resultComment = mysqli_query($conn, $query);
				while ($rowComment = mysqli_fetch_assoc($resultComment)){
					if($rowComment['profName'] == $professor){
						echo $rowComment['message']."<br>";
					}
				}
				$_SESSION['deleteP'] = $row['ProfName'];
				echo "<a href='../deleteP.html'>";
				echo "<input type='submit' name='delete' value='Delete professor'>";
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
			alert("No professor found.");
			</script>
			<?php
		}
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