<?php
session_start();

require_once('config.php');
include('header.php');

$userID = $_SESSION['user_id'];

$searchQuery = "SELECT product_list.id, product_list.name, product_list.price, 
product_list.image, product_list.quantity FROM cart INNER JOIN product_list 
ON cart.product_id = product_list.id where cart.user_id = $userID";

$result = mysqli_query($con, $searchQuery);
$cart_items = mysqli_num_rows($result);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($con);

// Handle delete action
if (isset($_POST['delete'])) {
  $selectedItems = $_POST['selectedItems'];

  foreach ($selectedItems as $itemId) {

    // Delete item from the database
    $deleteQuery = "DELETE FROM cart WHERE id = '$itemId'";
    mysqli_query($con, $deleteQuery);
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Product Registration Form</title>
  <link rel="stylesheet" href="stylesheet/style.css" />
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
  <form method="POST">
    <div class="container-fluid" style="margin-top: 50px">
      <h4 class="text-secondary">Shopping Cart</h3>
        <form>
          <table class="table table-bordered" style="width:50%">
            <tr>

              <th>image</th>
              <th>Product Name</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>

            <?php
            foreach ($products as $product): ?>
              <tr>
                <td width="10"><input type="checkbox" name="selectedItems[]" value="<?php echo $product['id']; ?>"></td>
                <td>
                  <img height="70" width="70" src=<?= "uploads/" . $product['image']; ?> alt="Not found" />
                </td>
                <td>

                  <?= $product['price']; ?>
                </td>
                <td>
                  <?= $product['quantity']; ?>
                </td>
                <td>
                  <?= $product['name']; ?>
                </td>
              </tr>
            <?php endforeach; ?>


          </table>
          <button type="button" class="btn btn-primary">Checkout</button>
          <button type="submit" class="btn btn-danger" name="delete" disabled>Delete</button>


        </form>
</body>

</html>