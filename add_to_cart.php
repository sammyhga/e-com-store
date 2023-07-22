<?php
require_once('config.php');

$userID = $_POST['userID']; // Replace 'name' with the actual name of the input field
$itemID = $_POST['itemID']; // Replace 'email' with the actual name of the input field

$sql = "INSERT INTO cart (user_id, product_id) VALUES ('$userID', '$itemID')";

if (mysqli_query($con, $sql)) {
    echo true;
} else {
    echo false;
}

// Close the connection
mysqli_close($con);
?>