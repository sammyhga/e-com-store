<?php
require_once('config.php');
include('phpcode/product_upload.php');

if (isset($_GET['id'])) {
  $productId = $_GET['id'];

  // Retrieve the product from the database
  $query = "SELECT * FROM product_list WHERE id = '$productId'";
  $result = mysqli_query($con, $query);
  $product = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  if (isset($_POST['update'])) {

    // Retrieve the updated values from the form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $image = $_POST["image"];


    // Update the product in the database
    $updateQuery = "UPDATE product_list SET name = '$name', description = '$description', quantity = '$quantity', price = '$price', image ='$image' WHERE id = '$productId'";
    mysqli_query($con, $updateQuery);

    // if (move_uploaded_file($_POST["image"], $folder)) {

    //} else {

    // }    
    // Redirect back to the product list page
    header('Location: product_added.php');
    exit();
  }
} else {

  // If no product ID is provided, redirect back to the product list page
  header('Location: product_added.php');
  exit();
}
mysqli_close($con);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
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
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Messages</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Inbox</a>
                            <a href="#" class="dropdown-item">Sent</a>
                            <a href="#" class="dropdown-item">Drafts</a>
                        </div>
                    </div>
                    <a href="#" class="nav-item nav-link disabled" tabindex="-1">Welcome</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="text-center" style="margin-top: 50px">
        <h4 class="text-secondary">Edit Product</h3>
    </div>
    <div class="rounded d-flex justify-content-center">
        <div class="col-md-5 col-sm-12 shadow-lg p-4 bg-light">
            <form action="edit_product.php?id=<?php echo $productId; ?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" required
                        value="<?php echo $product['name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" required
                        value="<?php echo $product['description']; ?>">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" name="quantity" class="form-control" required
                        value="<?php echo $product['quantity']; ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" name="price" class="form-control" required
                        value="<?php echo $product['price']; ?>">
                </div>
                <label for="image" class="form-label">Product image</label>
                <input type="file" name="image" class="form-control" required>

                <div class="text-center" style="margin-top:10px">
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                    <a class="btn btn-primary" href="product_added.php" role="button">Cancel</a>
                </div>
            </form>
        </div>
    </div>