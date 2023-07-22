<?php
require_once('config.php');

session_start();

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $res = mysqli_query($con, "SELECT * FROM users where username='$username' AND password='$password'");
    $row = mysqli_fetch_assoc($res);

    if (mysqli_num_rows($res) === 1) {
        if ($row['username'] === $username && $row['password'] === $password) {
            if ($row['username'] === 'customer') {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['id'];

                unset($_SESSION['error_message']);
                header("location: index.php");
            } else if ($row['username'] === 'admin') {
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['id'];

                unset($_SESSION['error_message']);
                header("location: add_product.php");
            }
        }
    } else {
        $_SESSION['error_message'] = "Invalid username or password";
        header("location: login.php");
    }

    // if (($row['username'] == 'customer') && ($row['username'] == $username)) {
    //     $_SESSION['username'] = $row['username'];
    //     header("location: checkout.php");
    // } else if (($row['username'] == 'admin') && ($row['username'] == $username)) {
    //     $_SESSION['username'] = $row['username'];
    //     header("location: add_product.php");
    // } else if (($username == '') && ($password == '')) {
    //     echo "<script language='javascript'>";
    //     echo "alert('Invalid Inputs')";
    //     echo "</script>";
    //     header("location: login.php");
    // } else {
    //     $_SESSION['error_message'] = "Invalid username or password";
    //     echo "<script language='javascript'>";
    //     echo "alert('WRONG INFORMATION')";
    //     echo "</script>";
    //     // header("location: login.php");
    // }
}
?>