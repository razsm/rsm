<?php session_start(); ?>
<!--Header part -->
<?php

    require_once('connection.php');

   
    //$sql = "SELECT * FROM category";
    $sql = "SELECT * FROM maincat";

    $result = $mysqli->query($sql);

   $result2 = $mysqli->query($sql);

    $str = "";
     while ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
       $str .= '<option value="' . $row2['id'] . '"> ' . $row2['name'] . '</option>';
     }
   
?>

<!DOCTYPE HTML>
<html>
    <title>RS </title>
    <link href="style.css" rel="stylesheet" type="text/css">
     <!--<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" type="text/css" href="slidecss/style.css">

    
    <body>
        <!--CONTAINER-->
    <div id="container">
        
        <!--HEADER-->
        <div id="header">
            <div id="logo"><a href="index.php"><img src="img/logo.png"  alt=""></a></div>
            <div id="top_right">
               <ul>
                   <li><a href="cart.php">Cart</a></li>
                  <!-- <li><a href="login.php">login</a></li>
                   <li><a href="signup.php">signup</a></li>-->
                   <li>
                       <div id="search_option">
                           
                                 <!--<li><div id="search"> -->
                           <div id="search">
                              <form action="search.php" method="POST">
                                   <div id="main_catagory">
                                       <select name="main_category" id="field">
                                           <option value="">All</option>
                                          <?php echo  $str ?>
                                        </select>
                                    </div>
                                <input id="search" type="text" name="query" placeholder="Type here">
                                <input id="submit" type="submit" value="Search">
                              </form>
                           </div>
                       </div>
                       
                       </li>
                </ul> 
               
                </div>
            <!--<div id="top_info">TOP INFO</div>-->
            <div id="navbar">
                
                <!--Category Print-->
                
                <?php while($row = $result->fetch_assoc()) { ?>
                    <div class="dropdown">
                        <span> <?php echo "<a maincat_id=". $row['id'] . "'> ". $row['name'] . "</a> " ?> </span>
                        
                        <!-- Sub Category print-->   
                        
                    <?php 
                         //$catSql = "SELECT * FROM sub_category WHERE category_id='" . $row['id'] . "'";
                            $catSql = "SELECT * FROM category WHERE maincat_id='" . $row['id'] . "'";
                        
                        $resultSubCategory = $mysqli->query($catSql);  
                                                      
                        if ($resultSubCategory->num_rows > 0) {
                    ?>
                    
                        <!--Product Print-->
                        
                        <div class="dropdown-content">
                            <ul>
                        
                    <?php while($rowCat = $resultSubCategory->fetch_assoc()) { 
                           
                      
                        //$prod = "SELECT * FROM product WHERE category_id='" . $row['id'] . "'";
                        $prod="SELECT * FROM sub_category WHERE category_id='" . $rowCat['id'] . "'";
                        
                          echo " <li><h>  ". $rowCat['name'] .  "</h> ";  
                         
                        $prodres = $mysqli->query($prod);
                        
                        
                        while($rowprod = $prodres->fetch_assoc()) { 
                            
                            echo ' <p><a href="product.php?sub_cat_id='. $rowprod['id'] . '"> '.  $rowprod['name'] . '</a></p>';
                                
                         } 
                        echo "</li>";
                         
                    } 
                ?>
                         </ul>
                            
                        </div>
                        <!-- End Product-->
                        <?php } ?>
                        <!--End Sub Category-->
                </div>
                <?php  } ?>
               <!--End Category-->
            </div>
            
        </div>
                        
              
<!-- Header part ending-->
        
        <!-- Product image part-->
<?php

    if( isset($_GET) && isset( $_GET['sub_cat_id'] ) ) {
        $subcat_id = $_GET['sub_cat_id'];
    } else {
        echo "<h1> Please select category first </h1>";
        $subcat_id = 0;
    }


    // echo "<h1>" . $category_id . "</h1>";

    $sql  ="SELECT * FROM `product` WHERE subcat_id = '$subcat_id'";

     //echo "sql : " . $sql . " <hr />";
include_once("connection.php");

//fetching data in descending order (lastest entry first)

//$result = mysqli_query($mysqli, "SELECT s.id as id, s.name as subcat_name, c.maincat_id as maincat_id, c.id as category_id FROM sub_category as s LEFT JOIN category as c on c.id = s.category_id");

$result = mysqli_query($mysqli,  $sql);
     
?>



<html>
<head>
	<title>Homepage</title>
</head>

<body>
    
   <!--  <div style="display: flex">
       <div class= "filter">
        <form action="">
            <a>By Color</a><br>
  <input type="checkbox" name="color" value="black">Black<br>
  <input type="checkbox" name="color" value="brown">Brown<br><br>
            
            <a>By Size</a><br>
  <input type="checkbox" name="size" value="small">Small<br>
  <input type="checkbox" name="size" value="medium">Medium<br>
  <input type="checkbox" name="size" value="large">Large<br><br>
  <input type="submit" value="Filter">
</form>
        </div></div>--> 
        
        
              <!-- <div class= "display">  
              <div class= "window"></div>-->
       
           
            <?php ?>
                	
            <div class="subcat_res">
                <ul>
                
       <?php    
                     if(  mysqli_num_rows($result) < 1  ){
                                    echo "<h1>Product is empty</h1>";
                                                 }   
                      else{
      while($res = mysqli_fetch_array($result)) { ?>
               
                 <li>
                <div class="prod"><!--<a href="prod.php?prod_code="> -->
              <!--  <form method="post" action="addcart.php?action=add&code=">-->
                 <?php 
          
                   echo "<a href='prod.php?prod_id=". $res['id'] . "'> " . "<img src='./admin/".$res['prod_image'] . "'/>" . "</a> " ;
                  
                   echo "<br><br>";
			       echo "<a style='color:#333;'>".$res['name']."</a>";		
                   echo "<p style='color:#333; '>".$res['price']."</p>";
                   echo "<br><br>";
         
                 ?>  
                    <div><a href="prod.php?prod_id=<?=  $res['id'] ?>"> Add to Cart </a> </div>
                 </div></li>
           <?php
      }
                      
            
                      }
            ?>
  </ul>
                 
    
    </div>
                <!--   </div>-->
  
		
		
</body>
</html>