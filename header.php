<?php
include_once('config.php');


$cart = "SELECT id, user_id, product_id FROM cart";
$results = mysqli_query($con, $cart);
$cart_items = mysqli_num_rows($results);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


</head>

<body>

    <nav class="navbar fixed-top navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                BuyUs
            </a>
            <div class="d-flex">
                <a class="navbar-brand" href="index.php">Home </a>

                <?php if (isset($_SESSION['username'])): ?>
                <a class="navbar-brand" href="logout.php">| Logout </a>
                <?php else: ?>
                <a class="navbar-brand" href="login.php">| Login </a>
                <?php endif; ?>
            </div>
            <?php if (isset($_SESSION['username'])): ?>
            <a href="checkout.php">
                <button type="button" class="btn position-relative">
                    <img src="images/cart.png"> </img>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php echo $cart_items?>
                        <span class="visually-hidden"></span>

                    </span>
                </button>
            </a>
            <?php else: ?>
            <?php endif; ?>
            <form class="form-inline my-2 my-lg-0" action="product_added.php" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search product">
                    <button class="btn btn-dark" type="submit" disabled>Search</button>
                </div>
            </form>
        </div>
    </nav>

</body>

</html>