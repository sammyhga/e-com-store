<?php

// database connection

include ('config.php');

// Handle search
if (isset($_GET['search'])) {
  $filter = $_GET['search'];
  $searchQuery = "SELECT id, name, description, quantity, price FROM product_list WHERE CONCAT(name, description) LIKE '%$filter%' ORDER BY time_created";
  $query_run = mysqli_query($con, $searchQuery);
  $products = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

  if (empty($products)) {
    $searchMessage = "No records found.";
  }
} else {
  // Retrieve all products from the database
  $query = "SELECT id, name, description, quantity, price FROM product_list ORDER BY time_created";
  $result = mysqli_query($con, $query);
}

?>