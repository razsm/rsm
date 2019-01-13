<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
    <div class="head">
        <div id="adminheader"><a> Welcome to my page!</a></div>
  </div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM maincat");
	?>
				
		<!--Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>-->
     <div class="data">
    <div class="slidebar">
        <ul>
        <li><a href='signup.php'>Register new member</a></li><br>
		<li><a href='maincatview.php'>View and Add Main Category</a></li><br>
       <li> <a href='catview.php'>View and Add Category</a></li><br>
       <li> <a href='subcatview.php'>View and Add Sub Category</a></li><br>
       <li> <a href='productview.php'>View and Add Product</a></li><br>
            </ul>
        <div id="out">
         <a href="logout.php">Logout</a>
        </div>
        </div>
		
       
        
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<div class='foot'><a href='login.php'>Login </a> </div>" ;
	}
    
	?> 
         
    </div>
      </div>
</body>
</html>
