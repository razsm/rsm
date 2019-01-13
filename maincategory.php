<?php

    if( isset($_GET) && isset( $_GET['category_id'] ) ) {
        $category_id = $_GET['category_id'];
    }


    echo "<h1>" . $maincat_id . "</h1>";

?>

 <?php 
                 //$catSql = "SELECT * FROM sub_category WHERE category_id='" . $row['id'] . "'";
                         
                $showprod = "SELECT * FROM category WHERE maincat_id'" . $category_id['id'] . "'";
                       
                //$resultSubCategory = $mysqli->query($catSql);
                        
                $resultcategory=$mysqli->query($showprod) ;
                
                if ($resultcategory->num_rows > 0){
                    ?>
                    
                <!--SUB Product Print-->
                 <div class="maincat">       
                 <ul>
                        
                    <?php  
                         //while($rowCat = $resultSubCategory->fetch_assoc()) { 
                           while($rowmaincat = $resultcategory->fetch_assoc()){
                      
                       //$prod="SELECT * FROM product WHERE subcat_id='" . $rowCat['id'] . "'";
                       
                               $allpro="SELECT * FROM sub_category WHERE category_id='" . $resultcategory['id'] . "'";
                        
                          //echo " <li><h>  ". $rowCat['name'] .  "</h> "; 
                               echo " <li><h>  ". $rowmaincat['name'] .  "</h> "; 
                         
                        $prodres = $mysqli->query($prod);
                        
                        
                        while($rowprod = $prodres->fetch_assoc()) { 
                            
                            echo ' <p><a href="product.php?category_id='. $rowprod['id'] . '"> '.  $rowprod['name'] . '</a></p>';
                                
                         } 
                        echo "</li>";
                         
                    } 
                ?>
                         </ul>
                            
</div>
                        <!-- End Product-->
                        <?php 
                        } 

?>
                        <!--End Sub Category-->

