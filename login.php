<?php
session_start();
?>

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
<style>
    body,
    html {
        height: 100%;
        display: flex;
        justify-content: center;
        background-color: #EFF0F0;
    }
</style>

<body>
    <div class="login-container">
        <div class="logo-top">
            <a href="index.php"><img src="images/logo.svg"> </a>
        </div>
        <div class="centered-box">
            <h1>Sign In</h1> <br>
            <?php
            if (isset($error_msg)): ?>
                <p style="color: red;">
                    <?php echo $error_msg;
                    ?>
                </p>
            <?php endif;
            ?>

            </br>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                        aria-label="Warning:">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <div>
                        <?php echo $_SESSION['error_message']; ?>
                    </div>
                </div>
            <?php endif; ?>

            <form method="POST" action="verify.php">
                <label>Username:</label>
                <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                </input>
                <br>
                <label>Password:</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                </input>
                <div class="text-center" style="margin-top: 10px">
                    <input type="submit" name="submit" class="btn btn-primary" value="Sign in"></input>
                </div>
            </form>
        </div>
    </div>
</body>

</html>