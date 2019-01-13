<?php

    require_once('connection.php');
 require_once('header.php');

    if( isset( $_POST ) ) {
        
       $maincat_id = $_POST['main_category'];       
       $query = $_POST['query'];
        
        $sub = '';
      
        if( $maincat_id == '' ) {
           $sub .= "";
        } else {
            $sub =  " AND m.id='$maincat_id'";
        }

         $sql = "SELECT p.id as id, p.prod_image as prod_image, p.name as name, p.price as price FROM product as p LEFT JOIN maincat as m ON m.id = p.maincat_id WHERE p.name LIKE '%$query' " . $sub;
      // $sql = "SELECT * FROM product as p LEFT JOIN maincat as m ON m.id = p.maincat_id WHERE p.name LIKE '%$query' " . $sub;
        
        $result = $mysqli->query($sql);
        
        $rowcount=mysqli_num_rows($result);
        
        if( $rowcount > 0 ) {

           
           
?>

             <div class="subcat_res">
                <ul>
                
       <?php    
            while ($res = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                ?>
                
                 <li>
                <div class="prod">
                 <?php 
                echo "<a href='prod.php?prod_id=". $res['id'] . "'> " . "<img src='./admin/".$res['prod_image'] . "'/>" . "</a> " ;
                  
                   echo "<br><br>";
			       echo "<a style='color:#333;'>".$res['name']."</a>";		
                   echo "<p style='color:#333; '>".$res['price']."</p>";
                   echo "<br><br>";
             
                 ?>
                <div><a href="prod.php".php?prod_id=<?=  $res['id'] ?>> Add to Cart </a> </div>
                 </div></li>
           <?php
      }
                      
            
                      }
            ?>
  </ul>
                 
    
    </div>
            
    
<?php
        
    
    } else {
        echo "<h1> No search found </h1>";
    }

?>