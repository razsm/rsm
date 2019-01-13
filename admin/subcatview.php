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

//$result = mysqli_query($mysqli, "SELECT c.id as id, c.name as cat_name, m.id as maincat_id, m.name as maincat_name FROM category as c LEFT JOIN maincat as m on m.id = c.maincat_id");

$result = mysqli_query($mysqli, "SELECT s.id as id, s.name as subcat_name, c.maincat_id as maincat_id, c.id as category_id FROM sub_category as s LEFT JOIN category as c on c.id = s.category_id");
?>



<html>
<head>
	<title>Homepage</title>
     <link href="adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
     <div class="header">
	<a href="index.php">Home</a> | <a href="subcategoryadd.php">Add New Sub Category</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	</div>
    <div class="list">
	<table width='80%' border=0>
        <tr bgcolor='#CCCCCC' color="#ffffff">
            <th>Id</th>
            <th>Name</th>
            <th>Main Category Id</th>
            <th>Category Id</th>
		</tr>
        
        
<?php
      while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
            echo "<td>".$res['id']."</td>";
			echo "<td>".$res['subcat_name']."</td>";			
            echo "<td>".$res['maincat_id']."</td>";
			echo "<td>".$res['category_id']."</td>";
      }
            ?>
  
    
  
		
        </table></div>	
</body>
</html>