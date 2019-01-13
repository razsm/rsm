<?php session_start();
    require_once("connection.php")
?>
<html>
<head>
	<title>Add Data</title>
    <link href="adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    
    <div class="header">
      
	<a href="index.php">Home</a> | <a href="maincatview.php">View Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
    </div>
 
	<form action= "maincatadd.php" method="post" name="form1">
		
      
             <div class="list">
               
        <table width="25%" border="0">
            
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name"></td>
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

