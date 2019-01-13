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

//$result = mysqli_query($mysqli, "SELECT s.id as id, s.name as subcat_name, c.maincat_id as maincat_id, c.id as category_id FROM sub_category as s LEFT JOIN category as c on c.id = s.category_id");

$result = mysqli_query($mysqli, "SELECT p.prod_image as prod_image, p.id as id, p.name as product_name, s.maincat_id as maincat_id,s.category_id as category_id , s.id as subcat_id ,code ,price FROM product as p LEFT JOIN sub_category as s on s.id = p.subcat_id");
?>



<html>
<head>
	<title>Homepage</title>
     <link href="adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
       <div class="header">
	<a href="index.php">Home</a> | <a href="productadd.php">Add New Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
    </div>
       <div class="list">
	<table width='100%' border=0>
		 <tr bgcolor='#CCCCCC' color="#ffffff">
            <td><a>Id</a></td>
            <td><a>Name</a></td>
            <td><a>Main Category Id</a></td>
            <td><a>Category Id</a></td>
            <td><a>Sub Category Id</a></td>
            <td><a>Code</a></td>
            <td><a>Price</a></td>
            <td><a>Image</a></td>
		</tr>
        
                            
    <div class="subcat_res">
        
<?php
      while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
            echo "<td>".$res['id']."</td>";
			echo "<td>".$res['product_name']."</td>";			
            echo "<td>".$res['maincat_id']."</td>";
			echo "<td>".$res['category_id']."</td>";
            echo "<td>".$res['subcat_id']."</td>";
            echo "<td>".$res['code']."</td>";
            echo "<td>".$res['price']."</td>";
            echo "<td><img src='".$res['prod_image']."' width='100' height='100' /></td>";
		
      }
            ?>
  
    
    </div>
		
           </table>	</div>
</body>
</html>