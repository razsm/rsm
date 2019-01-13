<?php
    session_start(); 

    require_once('connection.php');
     ?>

<!DOCTYPE HTML>
<html>
  	<link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="slidecss/style.css">
    <body>
        <div class="cart_des">
<?php
       if (isset($_SESSION['addToCart'])) {
           
           if( isset( $_GET['is_clear_cart'] ) ) {
               unset($_SESSION['addToCart']);
                echo "<h1> Cart is empty <a href='/rsm/'> Back to flairbd </a> </h1>";
           } else {
                
            $totalProduct = count($_SESSION['addToCart']);
             echo '<form method="post" action="payment.php">';
            ?>

           <div class="cart_clear">
           <a href='cart.php?is_clear_cart=true'>Clear cart </a>
           <a href='/rsm/'> Back to flairbd </a>
           </div>
        
<div class="prod_details">
    <table border="2">
        <tr>
            <th> prod_id   </th>
             <th>  prod_type   </th>
             <th> quantity   </th>
            <th> prod_price   </th>
            <th> Total Price  </th>
        </tr>
      
            
<?php
            $totalPrice = 0;

            foreach ($_SESSION['addToCart'] as $cart) {
                echo '<input type="hidden" name ="prod_id[]" value="'. $cart['prod_id']  . '" /> ';
                 echo '<input type="hidden" name ="prod_type[]" value="'. $cart['prod_type']  . '" /> ';
                 echo '<input type="hidden" name ="prod_price[]" value="'. $cart['prod_price']  . '" /> ';
                 echo '<input type="hidden" name ="quantity[]" value="'. $cart['quantity']  . '" /> ';
                 echo '<input type="hidden" name ="total[]" value="'.  ( $cart['quantity'] * $cart['prod_price'] )  . '" /> ';
                $totalPrice +=  ( $cart['quantity'] * $cart['prod_price'] );
                 echo "<tr>";
                echo "<td> " . $cart['prod_id'] . " </td>";
                echo " <td> " . $cart['prod_type'] . " </td>";
                echo " <td> " . $cart['quantity']  . "</td>";
                echo " <td> " . $cart['prod_price'] . " </td>";
                echo " <td> "  .  ( $cart['quantity'] * $cart['prod_price'] ) .  " <br />";
              
                echo "</tr>";
            }
              
?>
        
        <tr>
        
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td> = <?= $totalPrice ?> </td>
        </tr>
        
</table> </div>  
        <h>Insert your information</h><br><br>
   <div class="info_form">
		<table width="25%" border="1">
			
            <tr> 
				<td>First Name</td>
				<td><input type="text" name="fname"></td>
			</tr>
            
             <tr> 
				<td>Last Name</td>
				<td><input type="text" name="lname"></td>
			</tr>
            
             <tr> 
				<td>Address</td>
				<td><input type="text" name="address"></td>
			</tr>
            
             <tr> 
				<td>Contact</td>
				<td><input type="text" name="contact"></td>
			</tr>
            
            
       </table>
        </div>
               
   <br>
 <div class="cart_button">
<input type="submit" name="payment" />
                </div>
           <!-- </form>-->
        
       




<?php
           }
          
   
           
        } else {
           ?>
    <div class="cart_foot">
        <h>Cart is empty</h>
        <a href="/rsm/"> Back to flairbd </a>
    </div>      
   <!-- echo "<h1> Cart is empty </h1>  <a href='/rsm/'> <h1> Back to flairbd<h1> </a> ";-->
    
        <?php
       } ?>  
        
  </div>  
 </body>
 </html>    

