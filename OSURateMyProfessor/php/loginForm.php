<?php
if(isset($_POST['login']))
    {
		session_start();
		
		// values of form
        $user = $_POST['user'];
        $pass = $_POST['pass'];
		
		// log in variables for database
		$host = "localhost";
		$username = "masterUser";
		$password = "password";
		$dbname = "osu_ratemyprofessor";
		
		// Create connection
		$conn = new mysqli($host, $username, $password, $dbname);
		
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . mysqli_connect_error());
		}
		
		$sql = "SELECT userName, stuPassword FROM student WHERE userName = '$user' AND stuPassword = '$pass'";
		$result = mysqli_query($conn, $sql);
		
		if ($result->num_rows != 1){
			?>
			<script type = "text/javascript">
			window.location = "../index.html";
			alert("Wrong account information.");
			</script>
			<?php
		}
		else {
			$sql = "SELECT stuEmail FROM student WHERE userName = '$user' AND stuPassword = '$pass'";
			$result = mysqli_query($conn, $sql);
			
			while ($row = mysqli_fetch_assoc($result)){
				$_SESSION['loginUser'] = strval($row['stuEmail']);
			}
			?>
			<script type = "text/javascript">
			window.location = "../main.html";
			</script>
			<?php
		}
		$rs = mysqli_query($conn, $sql);
		$conn->close();
	}
?>