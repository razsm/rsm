<?php
   $sql = "SELECT * FROM maincat";

    $result = $mysqli->query($sql);
?>


<!DOCTYPE HTML>
<html>
    <title>RS </title>
    <link href="style.css" rel="stylesheet" type="text/css">
     <!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->
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
                        <span> <?php echo "<a href='maincategory.php?maincat_id=". $row['id'] . "'> ". $row['name'] . "</a> " ?> </span>
                        
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
                        
             