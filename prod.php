<?php session_start(); ?>

<?php

    require_once('connection.php');

   require_once('header.php');

?>
                   
        <?php
    if( isset($_GET) && isset( $_GET['prod_id'] ) ) {
        $prod_id = $_GET['prod_id'];
        
    } else {
        $prod_id = 0;
    }


    $sql  ="SELECT * FROM `product` WHERE id = '$prod_id'";

        
        $result = $mysqli->query($sql);
                    
       
?>
        
        <html>
<head>
	<title>Homepage</title>
</head>

<body> 
  
                <ul>
                
       <?php         
       while($res = $result->fetch_assoc()) {  ?>
                 <li> <div style="display: flex; width: 500px; height: 800px">
                
                     <div class="prod_image" style="width: 600px; height: 800px;">    
              <?php  echo "<img src='./admin/".$res['prod_image'] . "'/>" ;?>
                     </div> 
                
                     <div class="prod">
                   
                 <?php 
                   echo "<br><br>";
			       echo "<a style='color:#333;'>".$res['name']."</a>";		
                   echo "<p style='color:#333; '>".$res['price']."</p>";
                   echo "<p>Availability<p>";?>
               
                <form method="post" action="addcart.php">
                    
                    <input type="hidden" name="prod_id" value="<?=$res['id'] ?>" />
                    <input type="hidden" name="prod_price" value="<?=$res['price'] ?>" />
                     
                     <input type="radio" name="prod_type" value="Radio 1">S
                     <input type="radio" name="prod_type" value="Radio 2">M
                     <input type="radio" name="prod_type" value="Radio 3">L
                    <br><br>
                

                          
                        <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			 </form>
                    
               </div>
                    </div> </li>
           <?php
      }
            ?>
  </ul>
    
   
                  
  
		
		
</body>
</html>
