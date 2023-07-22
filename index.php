<?php
session_start();
include('config.php');
include('header.php');

$searchQuery = "SELECT id, name, description, quantity, price, image  FROM product_list ORDER BY time_created";
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
    <title>BuyUS. Your no.1 e-commerce shop</title>
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


    <!-- Slide show starts here -->
    <div id="bg">
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>

            </div>

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="images/carousel/4.png" class="d-block">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="images/carousel/2.png" class="d-block">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="1000">
                    <img src="images/carousel/1.png" class="d-block">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Slide ends starts here -->

    <!-- side bar -->
    <div class="row">
        <div class="col-3">
            <div class="container-fluid">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                ELECTRONICS
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Sound system
                                Television <br>
                                Tablets
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                CLOTHES
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Sound system
                                Television <br>
                                Tablets
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                HEALTH & BEAUTY
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                2
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                ENTERTAINMENT
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- side bar ends here-->

        <!-- middle content begins -->
        <div class="col-8" id="middle-content">
            <div class="container">


                <div class="row">
                    <?php
                    foreach ($products as $product) {
                        ?>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                <img src="uploads/<?php echo $product['image']; ?>">
                                <div class="caption">
                                    <h3>
                                        <a href="">
                                            <?php echo $product['name']; ?>
                                        </a>
                                    </h3>
                                    <p>
                                        <?php echo $product['description']; ?>
                                    </p>
                                    <h4 class="pull-right"> Price: MWK
                                        <?php echo $product['price']; ?>
                                    </h4>
                                </div>
                                <div class="space-ten"></div>
                                <div class="btn-ground text-center">
                                    <?php if (isset($_SESSION['username'])): ?>
                                        <button type="button" class="btn btn-primary" data-id=<?= $product['id'] ?>
                                            id="add_cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            Add To Cart
                                        </button>
                                    <?php endif; ?>
                                    <button type="button" class="btn btn-dark" data-toggle="modal"
                                        data-target="#product_view" disabled><i class="fa fa-search"></i>
                                        <?php echo $product['quantity']; ?> in stock
                                    </button>
                                </div>
                                <div class="space-ten"></div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        <!-- middle content ends here-->

        <?php include('footer.php'); ?>

        <script>
            $(document).ready(function () {
                $(document).on('click', '#add_cart', function () {
                    let itemID = $(this).attr('data-id');
                    let userID = "<?php echo $_SESSION['user_id']; ?>";

                    $.post('add_to_cart.php', {
                        itemID,
                        userID
                    }, function (response) {
                        if (Boolean(response)) alert('inserted')
                        else alert('not in')
                    })
                        .fail(function (xhr, status, error) {
                            console.log('Error occurred during the request:', error);
                        });
                })
            });
        </script>

</body>

</html>