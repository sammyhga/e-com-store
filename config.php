<?php


// database connection

$con = mysqli_connect('localhost', 'samuel', 'password', 'products');

if (!$con){
  $error = mysqli_connect_error();
  echo $error;
}

?>