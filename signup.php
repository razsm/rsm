<html>
<head>
	
</head>

<body>
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
	$pass = $_POST['password'];
    

	if($name == "" || $age == ""||$email== "" || $pass == "") {
        echo '<script type="text/javascript">

          window.onload = function () { alert("All fields should be filled. Either one or many fields are empty."); }

              </script>';
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='signup.php'>Go back</a>";
	} else {
        mysqli_query($mysqli, "INSERT INTO signup (name,age,email,password) VALUES('$name','$age','$email',md5('$pass'))")
		//mysqli_query($mysqli, "INSERT INTO signup(name,age,email,password) VALUES('$name','$age',$email',md5('$pass'))")
			or die("Could not execute the insert query.");
			
		echo "Registration successfully";
		echo "<br/>";
		//echo "<a href='signup.php'> Login </a>";
	}
} else {
?>
	<p><font size="+2">Register</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Full Name</td>
				<td><input type="text" name="name"></td>
			</tr>
            
            <tr> 
				<td>age</td>
				<td><input type="text" name="age"></td>
			</tr>
            
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
            
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
