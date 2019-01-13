<?php 
	session_start(); 
	if(!isset($_SESSION['valid'])) {
		header('Location: login.php');
	}
?>

<html>
<head>
	<title>Add Products</title>
</head>

<body>
	
<?php
//including the database connection file
include_once("connection.php");
  
      //$sql = "SELECT * FROM category";
    $sql11 = "SELECT * FROM maincat";

    $result2 = $mysqli->query($sql11);
    
    $catArray  = [];

     while ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
//       $str .= '<option value="' . $row2['id'] . '"> ' . $row2['name'] . '</option>
         $catArray[ $row2['id'] ] =  $row2['name'];
     }
    /*
    $catArray = array(
       "1"=>"MEN",
       "5"=>"WOMEN",
       "6"=>"KIDS",
       "7"=>"ELECTRONICS",
       "8"=>"HOME APPLIENCE",
       "9"=>"LIVING",
       "11"=>"GROCERY",
        "12" => "Agriculture"
   );
    */
   
if(isset($_POST['Submit'])  && isset($_FILES) ) {
    $target_dir = "./uploads";
    
    
//     echo "<h2> target_file  :: " . $target_dir  . "</h2>";
    
	$name = $_POST['name'];
    $maincat_id = $_POST['maincat_id'];
    $category_id = $_POST['category_id'];
    $subcat_id = $_POST['subcat_id'];
    $code =  $_POST['code'];
    $price = $_POST['price'];
    $prod_image= $_FILES['image'];
 
		
	// checking empty fields
    
    if($name == "" || $code == "" || $price == "" || $maincat_id == "" || $category_id == "" || $subcat_id == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
    }
    else { 
//        echo "maincat_id :: " .  $_POST['maincat_id'];
//        echo " catArary " .  $catArray[ (int) $_POST['maincat_id']  ];
        
             
        $path = $target_dir . "/" .   $catArray[ (int) $_POST['maincat_id']  ]  . "/" ;
    
//        echo "<h2> path :: " . $path . "</h2>";
  
	   $target_file = $path  .  basename($_FILES["image"]["name"]);
           
        if (!file_exists($path)) {
            
            mkdir($path, 0777, true) or die("cannot create folder");
        }
      
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
//		  echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded. <br />";
//            		$prod_image =  $target_file;
            $prod_image = "uploads/" . $catArray[ (int) $_POST['maincat_id']  ]  . "/" .  basename($_FILES["image"]["name"]);
//            echo "  prod_image :::: " .  $prod_image ;
        } else {
		  $prod_image = "";
        }
	
        $sql = "INSERT INTO product(name, maincat_id, category_id , subcat_id, code , price , prod_image) VALUES('$name', '$maincat_id','$category_id' , '$subcat_id','$code','$price', '$prod_image')";      
           
//        echo " sql:: " .  $sql;
        
		//insert data to database	
		$result = mysqli_query($mysqli, $sql) or die('cannot add new product');
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='productview.php'>View Result</a>";
	}
    
}
?>
</body>
</html>
