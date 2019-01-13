<?php session_start(); ?>

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

   
    if (isset($_SESSION['addToCart'])) {
            $totalProduct = count($_SESSION['addToCart']);
        } else {
           $totalProduct = 0;
        }
?>

<!DOCTYPE HTML>
<html>
    <title>RS </title>
    <link href="style.css" rel="stylesheet" type="text/css">
     <!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->
   <link rel="stylesheet" href="css/blink.css">
    <link rel="stylesheet" type="text/css" href="slidecss/style.css">

    
    <body>
        <!--CONTAINER-->
    <div id="container">
        
        <!--HEADER-->
        <div id="header">
            <div id="logo"><a href="index.php"><img src="img/logo.png"  alt=""></a></div>
            <div id="top_right">
               <ul>
                   <li><a href="cart.php">Cart (<?= $totalProduct ?>)  </a></li>
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
                <!-- search option-->
             
                
    <?php
    /*$query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM product
            WHERE (`title` LIKE '%".$query."%') OR (`text` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['title']."</h3>".$results['text']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }*/
?>
    
              
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
                        
                  
                
        
        <div id="content_area">
        
            <!-- <section class="blink-slider">
        <div class="blink-view" id="blink">
          <div class="viewSlide">
            <img class="fullImg" src="https://picsum.photos/1000/700/?random" id="foto1" />
          </div>

          <div class="viewSlide">
            <img class="fullImg" src="https://placeimg.com/1000/700/any" id="foto2" />
          </div>

          <div class="viewSlide">
            <img class="fullImg" src="https://placeimg.com/1000/700/people" id="foto3" />
          </div>
        </div>
        <div class="blink-control" id="blink-control">

        </div>

      </section>-->
           <figure>
               <img src="kameez/1.jpg">
               <img src="kameez/2.jpg">
               <img src="kameez/3.jpg">
               <img src="kameez/4.jpg">
             </figure>
          
            
       </div>
         <!--Men Part  -->
        <div id="rowbar"><span><a>Mens</a></span></div>
        <div class="mens" >
        
         <?php   
         $query  = "SELECT * FROM product WHERE maincat_id='1' LIMIT 4";
       
        $result = $mysqli->query( $query );
        ?>
        
        
        <ul>
        <?php
         while($row = $result->fetch_assoc() ) { ?>
             <li>
                <div class="prod"><!--<a href="prod.php?prod_code="> -->
              <!--  <form method="post" action="addcart.php?action=add&code=">-->
                <div style="min-width: 290px; height: 300px;">  
                    <?php 
                   echo "<a href='prod.php?prod_id=". $row['id'] . "'> " . "<img src='./admin/".$row['prod_image'] . "'/>" . "</a> " ;
                   echo "<br><br>";
			       echo "<a style='color:#333;'>".$row['name']."</a>";		
                   echo "<p style='color:#333; '>".$row['price']."</p>";
                      
                 ?>  
                    <a href="prod.php?prod_id=<?=  $row['id'] ?>"> Add to Cart </a>
                 </div></div> </li>
            <?php
         }
            
        ?>
            </ul>
        </div>
        <!--Women Part  -->
        <div id="row_2"><span><a>Women</a></span></div>
        <div class="women" >
        
         <?php   
         $query  = "SELECT * FROM product WHERE maincat_id='5' LIMIT 5";
       
        $result = $mysqli->query( $query );
        ?>
        
        
        <ul>
        <?php
         while($row = $result->fetch_assoc() ) { ?>
             <li>
                 <div style="min-width: 290px; height: 300px;">  
                 <?php 
                   echo "<a href='prod.php?prod_id=". $row['id'] . "'> " . "<img src='./admin/".$row['prod_image'] . "'/>" . "</a> " ;
                   echo "<br><br>";
			       echo "<a style='color:#333;'>".$row['name']."</a>";		
                   echo "<p style='color:#333; '>".$row['price']."</p>";
                     ?>  
                     <a href="prod.php?prod_id=<?=  $row['id'] ?>"> Add to Cart </a>
                 </div>
            </li>
            <?php
         }
            
        ?>
            </ul>
              </div>
        
        <!--FOOTER-->
        <div id="footer"><a>FOOTER</a>
           <ul>
               <ul><a href="info.php">Information</a>
                <li>About Us</li>
                </ul>
               <ul><a>Customer Service</a>
                <li>About Us</li>
                </ul>
        </ul>
            </div>
         </div>
    <!--END CONTAINER-->
        
        
      <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.blink.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#blink").blink();
      });
    </script>

    </body>
    
</html>