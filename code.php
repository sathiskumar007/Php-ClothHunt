<?php

session_start();

require 'config.php';


if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($config, $_POST['username']);
    $email = mysqli_real_escape_string($config, $_POST['email']);
    $password = mysqli_real_escape_string($config, $_POST['password']);
    $cpassword = mysqli_real_escape_string($config, $_POST['cpassword']);


    $query = "INSERT INTO userslist (userName,email,password,conformPassword) VALUES('$name','$email','$password','$cpassword')";

    $query_run = mysqli_query($config, $query);

    if ($query_run) {
        $_SESSION['message'] = "Account Created Sucessfully";
        header('Location:signin.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Account Not Created";
        header('Location:registerphp');
    }
}
