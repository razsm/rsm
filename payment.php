<?php
    session_start(); 

    require_once('connection.php');
   

    if (isset($_POST)) {
        
        $sql_total = 'INSERT INTO total_payment ( fname, lname, address ,contact, total_price, status) VALUES ( "' .  $_POST['fname'] . '", "' .  $_POST['lname'] . '", "' .  $_POST['address'] . '", "' .  $_POST['contact'] . '", "' .  $_POST['totalPrice'] . '", "inital")';
        
        if ($mysqli->query($sql_total) === TRUE) {
            $last_id = $mysqli->insert_id;
            
        $i = 0;
        foreach($_POST['prod_id'] as $prod_id ) {
            $sql = "";
            $prod_type = $_POST['prod_type'][$i];
            $prod_price = $_POST['prod_price'][$i];
            $quantity = $_POST['quantity'][$i];
            $total = $_POST['total'][$i];
            
            $sql = "INSERT INTO payment ( prod_id, prod_type, prod_price, quantity, total, parent_id ) VALUE ( '" .  $prod_id . "', '" .  $prod_type . "', '" .  $prod_price . "', '" .  $quantity . "', '" .  $total . "', '" . $last_id . "' )";
            
            $i++;
            
            $mysqli->query( $sql ) ;
            
            
        }
            unset( $_SESSION['addToCart'] );
          
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    
       
        
    }
 header("Location: index.php");
?>