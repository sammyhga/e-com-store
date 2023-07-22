<?php

//check if details have been entered in the product form
if (isset($_POST['submit'])){
  
  $name = htmlspecialchars (mysqli_real_escape_string($con, $_POST['productName']));

  $desc = htmlspecialchars (mysqli_real_escape_string($con, $_POST['description']));

  $quantity = htmlspecialchars (mysqli_real_escape_string($con, $_POST['quantity']));
 
  $price = htmlspecialchars (mysqli_real_escape_string($con, $_POST['price']));

  $filename = $_FILES["image"]["name"];
  
  $tempname = $_FILES["image"]["tmp_name"];

  $folder = "uploads/" . $filename;
  
//query for inserting data
$query_db = "INSERT INTO product_list (name, description, quantity, price, image) VALUES ('$name',  '$desc','$quantity','$price', '$filename')";

//checks if data has been successfully inserted
if (mysqli_query($con, $query_db)){
   
} else{

 echo "Could not insert into database: ". mysqli_error ($con);
}

//moves image to folder
if (move_uploaded_file($tempname, $folder)) {
  
} else {
 
}
}

?>