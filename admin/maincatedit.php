<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];	
	
	// checking empty fields
	if(empty($name)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($id)) {
			echo "<font color='red'>Id field is empty.</font><br/>";
		}
		/*
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}*/		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE products SET name='$name' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: maincatview.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM maincat WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$id = $res['id'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="maincatview.php">View Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="maincatedit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Id</td>
				<td><input type="text" name="id" value="<?php echo $id;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
