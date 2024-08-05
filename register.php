<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Register Page</title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;800;900&display=swap);

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;

        }

        .register-form {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: start;
            align-items: center;
            margin-top: 2%;
            margin-left: 140px !important;
            position: relative;
        }

        .left-image {
            width: 50%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left-image img {
            width: 60%;
            height: auto;
            border-radius: 0px 10px 10px 10px;
        }

        .right-form {
            width: 28%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding-top: 80px;
            padding-bottom: 80px;
            border-radius: 20px;
            box-shadow: 0px 0px 20px 19px rgba(202, 202, 202, 0.8);
        }

        .ovel,
        .ovel2,
        .ovel3,
        .ovele,
        .ovele2,
        .ovele3 {
            position: absolute;
            width: 120px;
            height: 120px;
        }

        .ovel {
            border-radius: 100px;
            border: 20px solid #dd99ff;
            top: 80%;
            left: 20px;
        }

        .ovele2 {
            border-radius: 100px;
            border: 20px solid #80ff80;
            top: 72px;
            left: 89%;
        }

        .ovele3 {
            border-radius: 100px;
            border: 20px solid #ffbf80;
            top: 15px;
            left: 87%;
        }

        .ovele {
            border-radius: 100px;
            border: 20px solid #ff6666;
            top: 20px;
            left: 91%;
        }

        .ovel2 {
            border-radius: 100px;
            border: 20px solid #54d9e1;
            top: 78%;
            left: 100px;
        }

        .ovel3 {
            border-radius: 100px;
            border: 20px solid #ffc409;
            top: 72%;
            left: 40px;
        }

        .button {
            padding: 6px 20px;
            border: none;
            background-color: transparent;
            border: 2px solid black;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            color: black;
            transition: 0.5s;
        }

        .button:hover {
            background-color: #54d9e1;
            color: white;
            border: 2px solid #54d9e1;
            padding: 8px 22px;
        }

        input[type='text'],
        input[type='email'],
        input[type='password'],
        input[type='cpassword'] {
            width: clamp(200px, 20vw, 350px);
            height: 25px;
            padding-left: 10px;
            font-weight: 400;
            font-size: 16px;
        }

        @media screen and (max-width:1440px) and (min-width:200px) {
            .register-form {
                display: flex;
                flex-direction: column;
                gap: 80px;
                margin: 0px !important;
                padding-left: 50px;
            }

            .right-form {
                width: clamp(80%, 20vw, 50%);
            }
            .left-image {
                width: clamp(100%, 20vw, 50%);
            }
            .left-image img{
                width: 100%;
            }

            .left-image {
                width: 60%;
            }

            input[type='text'],
            input[type='email'],
            input[type='password'],
            input[type='cpassword']{
                width: clamp(250px, 20vw, 200px);
            }
        }
    </style>
</head>

<body>
    <?php
    include_once("config.php");

    $errorNo = 0;
    $nameerror = $mailerror = $passerror = $cpasserror = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if (empty($name)) {
            $errorNo++;
            $nameerror = "Enter Your Name <br>";
        } else {
            $namepattern = '/^[a-zA-Z]{3,}$/';
            if (!preg_match($namepattern, $name)) {
                $errorNo++;
                $nameerror =  "Username Is too Long<br>";
            }
        }
        if (empty($email)) {
            $errorNo++;
            $mailerror = "Enter Your Email-Id <br>";
        } else {
            $mailPatt = '/[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/';
            if (!preg_match($mailPatt, $email)) {
                $errorNo++;
                $mailerror = "Enter Your Email Properly <br>";
            }
        }

        if (empty($password)) {
            $errorNo++;
            $passerror =  "Enter Your Password  <br>";
        } else {
            if (strlen($password) < 8) {
                $errorNo++;
                $passerror =  "Password must have at least 8 characters.<br>";
            }
        }
        if (empty($cpassword)) {
            $errorNo++;
            $cpasserror =  "Enter Your Conform Password <br>";
        } else {
            if ($password != $cpassword) {
                $errorNo++;
                $cpasserror = "Passwords do not match.<br>";
            }
        }
        $duplicateEmailErr = "";
        // Check for duplicate email
        if ($mailerror == "") {
            $check_query = "SELECT * FROM userslist WHERE email='$email'";
            $check_result = mysqli_query($config, $check_query);
            if (mysqli_num_rows($check_result) > 0) {
                $duplicateEmailErr = "Email ID already exists";
            }
        }

        if ($errorNo == 0) {
            // No validation errors, proceed with registration
            $sql = "INSERT INTO `userslist` (userName, email, password, conformPassword) VALUES ('$name', '$email', '$password', '$cpassword')";
            $result = mysqli_query($config, $sql);
            if ($result) {
                echo "<script>alert('Registration successful!');</script>";
                header('Location: signin.php');
            } else {
                echo "<div class='danger'>There is a problem in registering your account.</div>";
            }
        }
    }

    ?>
    <!-- <div class="container">

        <div class="form-section">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                <h1>Register</h1> -->

    <?php


    // if (isset($_POST['submit'])) {
    //     if ($errorNo == 1) {
    //         // echo "<span class='error'>" . $errorMsg . "</span>";
    //         // echo $errorMsg;
    //     }
    //     if (isset($_POST['message'])) {
    //         $errorMsg = "register sucessfully";
    //         echo "<span class='warning'>" . "</span>";
    //     }
    // }
    // echo $errorMsg;
    ?> <br><br>

    <!-- <?php  //echo (!empty($duplicateEmailErr)) ? $duplicateEmailErr : ''; 
            ?>
                <?php //echo (!empty($nameerror)) ? $nameerror : ''; 
                ?>
                <i class="fa-solid fa-user"></i>

                <input type="name" name="username" placeholder="           name"><br><br>
                <?php  //echo (!empty($mailerror)) ? $mailerror : ''; 
                ?>
                <i class="fa-solid fa-at"></i>
                <input type="email" name="email" placeholder="           Your Email"><br><br>
                <?php //echo (!empty($passerror)) ? $passerror : ''; 
                ?>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="           Password"><br><br>
                <?php // echo (!empty($cpasserror)) ? $cpasserror : ''; 
                ?>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="cpassword" placeholder="            Repeat Your Password"><br><br>
                <a href="signin.php">I have an account </a><br><br>

                <input type="submit" name="submit" value="Register">
                <input type="reset" name="clear" value="Clear"> -->

    <br>
    <?php   // if(isset($_POST['submit'])) { echo $submit_error;}
    //echo $submit_sucess; 
    ?>
    <!-- </form>
        </div>
        <div class="img"></div> -->
    <!-- </div> -->
    <div class="ovele"></div>
    <div class="ovele2"></div>
    <div class="ovele3"></div>
    <div class="ovel"></div>
    <div class="ovel2"></div>
    <div class="ovel3"></div>

    <div class="register-form">
        <div class="left-image">
            <img src="https://images.pexels.com/photos/2584269/pexels-photo-2584269.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
        </div>
        <div class="right-form">
            <form action="" method="POST">
                <h1 class="head text-center" style="margin-bottom: 50px;">Register Form</h1>
                <div class="mb-5" style="display: flex;flex-direction: column;">
                    <label for="name">Name</label>
                    <input type="text" name="username" id="" value="">
                    <span style="color: red; margin-bottom:30px;"><?php echo (!empty($nameerror)) ? $nameerror : ''; ?></span>
                </div>

                <div class="mb-5" style="display: flex;flex-direction: column;">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="" value=" ">
                    <span style="color: red; margin-bottom:30px;"> <?php echo (!empty($mailerror)) ? $mailerror : ''; ?></span>
                </div>

                <div class="mb-5" style="display: flex;flex-direction: column;">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="" value="   ">
                    <span style="color: red; margin-bottom:30px;"> <?php echo (!empty($passerror)) ? $passerror : ''; ?></span>
                </div>

                <div class="mb-5" style="display: flex;flex-direction: column;">
                    <label for="password">Conform Password</label>
                    <input type="password" name="cpassword" id="" value="  ">
                    <span style="color: red; margin-bottom:30px;"><?php echo (!empty($cpasserror)) ? $cpasserror : ''; ?></span>
                </div>
                <a href="./signin.php" style="text-decoration:none;  color:blue;">I have an account </a>
                <br><br>
                <input type="submit" class="button" name="submit" value="Register" style="margin-right: 60px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" class="button" name="clear" value="Reset">
            </form>
        </div>
    </div>
</body>

</html>