<?php
session_start();
$_SESSION['status'] ="logout";
?> 
<!DOCTYPE html>
<html>
<head>
	<title>form using php</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<script type="text/javascript">
  		function status()
  		{
  			var foo="<?php echo $_SESSION['status']; ?>";
			alert(foo);
  		}
  	</script>

</head>
<body>
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#">WebSiteName</a>
    		</div>
    	<ul class="nav navbar-nav">
      		<li class="active"><a href="welcome.php">Login</a></li>
      		<li><a href="#">other 1</a></li>
      		<li><a href="#">other 2</a></li>
      		<li><a href="#">other 3</a></li>
    	</ul>
  		</div>
	</nav>

	<button onclick="status()">Status</button>
	</br></br>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="uname"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" name="pass"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
	</form>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "password";
		$dbname = "intern_project";

		$name = $pass ="";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
			$uname=trim($_POST["uname"]);
			$pass=trim($_POST["pass"]);

			// $sql = "SELECT * FROM login WHERE username = '$uname' and password = '$pass'";
			$sql = "SELECT username, phone, city, gender FROM login WHERE username = '$uname' and password = '$pass'";
			$result = mysqli_query($conn,$sql);
	
			//Check whether the query was successful or not
			if($result) 
			{
				if(mysqli_num_rows($result) > 0) 
				{
					//Login Successful
					session_regenerate_id();
					$member = mysqli_fetch_assoc($result);
					 // sdadfssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
					// $_SESSION.Remove("status");
					// unset($_SESSION['status']);
					$_SESSION['status'] = "logged";
					// dsafdaadfasdsssssssssssssssssssfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
					$_SESSION['SESS_USERNAME'] = $member['username'];
					$_SESSION['SESS_PHONE'] = $member['phone'];
					$_SESSION['SESS_CITY'] = $member['city'];
					$_SESSION['SESS_GENDER'] = $member['gender'];
					session_write_close();
					header("location: welcome.php");
					exit();
				}
				else 
				{
					//Login failed
					$errmsg= 'user name and password not found';
					echo $errmsg;
				}
			}
			else
			{
				die("Query failed");
			}
						
		}
		$conn->close();
	?>
</body>
</html>