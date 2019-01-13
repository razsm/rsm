<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM maincat");
?>

<html>
<head>
	<title>Homepage</title>
    <link href="adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="header">
	<a href="index.php">Home</a> | <a href="mainadd.php">Add New Data</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	</div>
    <div class="list">
	<table width='80%' border=0>
        <tr bgcolor='#CCCCCC' color="#ffffff">
            <th><a>Id</a></th>
            <th><a>Name</a></th>
		</tr>

		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
            echo "<td >".$res['id']."</td>";
			echo "<td>".$res['name']."</td>";
            echo "</tr>";	
		}
		?>
	</table></div>	
</body>
</html>
