<?php session_start();
   
 include_once("connection.php");
?>
<html>
<head>
	<title>Add Sub  Category</title>
     <link href="adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="header">
	<a href="index.php">Home</a> | <a href="productview.php">View Sub Category</a> | <a href="logout.php">Logout</a>
	<br/><br/>
    </div>
        
	<form name="form1" method="post" action="prodadd.php"  enctype="multipart/form-data">
		   <div class="list">
        <table width="25%" border="0">
			
            <tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
			</tr>
            
            <?php 
            
            $res=$mysqli->query("SELECT * FROM maincat"); ?>
           
         
            <tr><td>Select Main Category</td>
                <td> <div class="maincategory">
                      <select name="maincat_id">
                          <option value="" selected="selected">All</option>
                          <?php  while($row=$res->fetch_array()) { ?>
                                   
                                       <option value="<?php echo $row['id'] ; ?> "><?php echo $row['name']; ?></option>
                                       
                          
                          <?php } ?>
                          
        
                    </select></div></td>
            </tr>
            
            <?php  $res=$mysqli->query("SELECT * FROM category"); ?>
            
            <tr><td>Select Category</td>
                <td> <div class="category">
                      <select name="category_id">
                          <option value="" selected="selected">All</option>
                          <?php  while($row=$res->fetch_array()) { ?>
                                   
                                       <option value="<?php echo $row['id'] ; ?> "><?php echo $row['name']; ?></option>
                                       
                          
                          <?php } ?>
                          
                                </select></div></td>
            </tr>
            
            <?php  $res=$mysqli->query("SELECT * FROM sub_category"); ?>
            
            <tr><td>Select Sub Category</td>
                <td> <div class="subcategory">
                      <select name="subcat_id">
                          <option value="" selected="selected">All</option>
                          <?php  while($row=$res->fetch_array()) { ?>
                                   
                                       <option value="<?php echo $row['id'] ; ?> "><?php echo $row['name']; ?></option>
                                       
                          
                          <?php } ?>
                          
                                </select></div></td>
            </tr>
            
            <tr> 
				<td>code</td>
				<td><input type="text" name="code"></td>
			</tr>
            
            <tr> 
				<td>price</td>
				<td><input type="text" name="price"></td>
			</tr>
            
            <tr> 
				<td>Image</td>
				<td> <input type="file" name="image"> </td>
				
			</tr>
            
            <tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
        </div>

      </form>   
			
</body>
</html>

