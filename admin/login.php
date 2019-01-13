<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
 <link href="adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="log">
    <a href="index.php">Home</a><br>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['name']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM signup WHERE name='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['name'];
			$_SESSION['valid'] = $validuser;
			//$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p>Login</p>
        <div class="form">
	<form name="form1" method="post" action="">
		 <div class="td">
        <table border="0">
			<tr> 
				<td><a>Username</a></td>
				<td><input type="text" name="name"></td><br>
			</tr>
			<tr> 
				<td><a>Password</a></td>
				<td><input type="password" name="password"></td><br>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
                
		</table></div>
	</form>
            </div> 
                    
<?php
}
?>
        </div>
</body>
</html>
