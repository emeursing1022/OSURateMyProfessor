<?php
if(isset($_POST['signup']))
    {		
		// log in variables for database
		$host = "localhost";
		$username = "masterUser";
		$password = "password";
		$dbname = "osu_ratemyprofessor";
		
		// html values
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
		
		$query = 'SELECT * FROM student';
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($result)){
			if ($row['email'] == $email){
				?>
				<script type = "text/javascript">
				alert("Email already exists");
				window.location = "../newUser.html";
				</script>
				<?php
			}
		}
		
		
		$sql = "INSERT INTO student (stuEmail, stuName, stuYear, major, userName, stuPassword) VALUES ('$email', '$name', '$year', '$major', '$user', '$pass')";
		$rs = mysqli_query($conn, $sql);
		$conn->close();
		?>
		<script type = "text/javascript">
		alert("User successfully added");
		window.location = "../index.html";
		</script>
		<?php
	}
?>