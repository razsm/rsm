<?php session_start(); 

    require_once('connection.php');


    if( isset($_POST) && isset( $_POST['prod_id'] ) ) {
     
        $newData = array(
            "prod_id" => $_POST['prod_id'],
            "prod_type" => $_POST['prod_type'],
            "quantity" => $_POST['quantity'],
            "prod_price" => $_POST['prod_price']
        );
        
        if (isset($_SESSION['addToCart'])) {
             array_push($_SESSION['addToCart'],$newData);
        } else {
            $_SESSION['addToCart'][] = $newData;
        }
    }
    else {
       // echo "<h1> Invalid Request </h1";
    }

 
    header("Location: index.php");
    die();
?>
    