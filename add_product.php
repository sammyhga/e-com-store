<?php

require_once('config.php');
require_once('phpcode/product_upload.php');
require_once ('session.php');
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
    <div class="container-fluid">
        <!--Row with two equal columns-->
        <div class="row">
            <div class="col-3">
                <div class="demo-content">

                    <!--side bar starts here-->
                    <aside>
                        <p> Menu </p>
                        <hr style>
                        <a href="index.php">
                            <i class="fa fa-user-o"></i>
                            <strong>Home
                        </a>

                        <a href="edit_product">
                            <i class="fa fa-clone" aria-hidden="true"></i>
                            Edit Products </strong>
                        </a>

                    </aside>
                </div>
            </div>
            <!--side bar ends here-->

            <!--add product form starts here-->
            <div class="col-md-6">
                <div class="demo-content">
                    <div class="rounded d-flex">
                        <div class="col-md-9 col-sm-12 shadow-lg p-4 bg-light">

                            <div class="text-center">
                                <h4 class="text">Product Form</h3>
                            </div>
                            <form class="row g-needs-validation" action="add_product.php" method="POST"
                                enctype="multipart/form-data">
                                <div name="productName">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="productName"
                                        placeholder="Enter name of product" required> </input>
                                </div>

                                <div name="Product description" style="margin-top:10px">
                                    <label class="form-label">Product Description</label>

                                    <textarea class="form-control" name="description" rows="3"
                                        placeholder="Enter full description of the product" required></textarea>

                                </div>
                                <div name="productPrice" style="margin-top:10px">
                                    <label class="form-label">Price</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text">MWK</span>
                                        <input type="text" class="form-control" name="price"
                                            placeholder="Enter product price" required>
                                        <span class="input-group-text">.00</span>
                                    </div>

                                    <div name="quantity" style="margin-top:10px">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="quantity"
                                            placeholder="Enter product quantity" required>
                                    </div>

                                    <div class="image" style="margin-top:10px">
                                        <label class="form-label">Upload image</label> <br>
                                        <input type="file" name="image" required> </input>
                                    </div>
                                    <div class="text-center" style="margin-top: 15px">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Add Product"
                                            href="add_product.php"></input>

                                    </div>
                                </div>
                        </div>
                    </div>
                    </form>
                    <!--add product form ends here-->
</body>

</html>