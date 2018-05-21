<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Intern_login_form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script type="text/javascript">
  		function status()
  		{
  			var foo="<?php echo $_SESSION["status"]; ?>";
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
	      <li class="active"><a href="logout.php">Logout</a></li>
	      <li><a href="#">other 1</a></li>
	      <li><a href="#">other 2</a></li>
	      <li><a href="#">other 3</a></li>
	    </ul>
	  </div>
	</nav>

<button onclick="status()">Status</button>
	</br></br>
	
	<?Php
	if (empty($_SESSION['SESS_USERNAME'])){
		 // echo "<script type='text/javascript'>
   //              alert('You are not logged in.');
   //          </script>";
       header("location: login.php"); 
    	exit();
	} else {

	echo "WELCOME ".$_SESSION["SESS_USERNAME"]; echo "</br>";
	echo "</br>";
	echo "YOUR DETAILS ARE-"; echo "</br>";
	echo "PHONE NUMBER ".$_SESSION["SESS_PHONE"];  echo "</br>";
	echo "CITY ".$_SESSION["SESS_CITY"];  echo "</br>";
	echo "GENDER ".$_SESSION["SESS_GENDER"];  echo "</br>";
}
	?>

</body>
</html>

