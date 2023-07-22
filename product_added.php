<?php
include('config.php');
include_once('search.php');

// Handle delete action
if (isset($_POST['delete'])) {
  $selectedItems = $_POST['selectedItems'];

  foreach ($selectedItems as $itemId) {

    // Delete item from the database
    $deleteQuery = "DELETE FROM product_list WHERE id = '$itemId'";
    mysqli_query($con, $deleteQuery);
  }

  header('Location: product_added.php');
  exit();
}

// Retrieve products from the database
$searchQuery = "SELECT id, name, description, quantity, price, image FROM product_list ORDER BY time_created";
$result = mysqli_query($con, $searchQuery);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($con);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                BuyUs
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link active">View Products</a>
                    <div class="nav-item dropdown">
                        <a href="add_product.php" class="nav-link" data-bs-toggle="dropdown">Add product</a>

                    </div>
                    <a href="add_product.php" class="nav-item nav-link disabled" tabindex="-1"></a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <?php
    if (isset($searchMessage)) {
      echo "<p>{$searchMessage}</p>";
    } elseif (!empty($products)) {
      ?>
    <div class="container-fluid" style="margin-top: 50px">
        <h4 class="text-secondary">Products</h3>
            <form action="product_added.php" method="POST">
                <table class="table table-bordered table-striped table-hover" style="width:90%">
                    <tr align="center">
                        <th></th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>image</th>
                        <th width="90"></th>
                    </tr>
                    <?php
          foreach ($products as $product) {
            ?>
                    <tr align="center">
                        <td width="10"><input type="checkbox" name="selectedItems[]"
                                value="<?php echo $product['id']; ?>"></td>
                        <td>
                            <?php echo $product['name']; ?>
                        </td>
                        <td>
                            <?php echo $product['description']; ?>
                        </td>
                        <td>
                            <?php echo $product['quantity']; ?>
                        </td>
                        <td>
                            <?php echo $product['price']; ?>
                        </td>
                        <td>
                            <?php echo $product['image']; ?>
                        </td>
                        <td><a href="edit_product.php?id=<?php echo $product['id']; ?>">Edit</a></td>
                    </tr>
                    <?php
          }
          ?>
                </table>
                <div class="text-center">
                    <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                </div>
    </div>
    </form>
    <?php

    } else {

      echo "There are no products in the database. Please add."; ?>
    <div class="text-center">
        <a class="btn btn-primary" href="add_product.php" role="button">Add Product</a>
    </div>
    <?php

    }

    ?>
    </div>
</body>

</html>