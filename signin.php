<?php
session_start();
include_once('config.php'); // Make sure your config.php file contains the correct database connection

$isError = 0;
$errorMsg = "";
$subAdmin = 'sathisvel123@gmail.com';
$subadminPass = 'sathisvel@123';

// Initialize variables to avoid undefined variable warnings
$email = "";
$password = "";

// if (isset($_POST['submit'])) {
//     // Sanitize and validate input
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Check if the input values are valid
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $isError = 1;
//         $errorMsg = "Invalid email format";
//     } else {
//         // Prepare SQL statement to avoid SQL injection
//         // $stmt = $config->prepare("SELECT * FROM `userslist` WHERE email=$email");
//         // $stmt->bind_param("s", $email);
//         // $stmt->execute();
//         // $result = $stmt->get_result();

//         $sql = "SELECT * FROM `userslist` WHERE email = '$email' ";

//         $check = mysqli_query($config, $sql);
//         if ($row = mysqli_fetch_array($check)) {

//             $actualEmail = $row[2];
//             $actualId = $row[0];
//             $actualpwd = $row[3];


//             echo " $actualId";
//             echo " $actualpwd";
//             if ($email == $actualEmail && $password == $actualpwd) {
//                 // Initialize session
//                 $_SESSION['user_id'] = $actualId;
//                 // echo "<script>alert('".$actualId."')</script>";
//                 // echo "<script>window.location.href='./index.html?pid=$actualId';</script>";

// 
?>
<!-- <a href="./index.php?pId=$actualId"> send</a> -->
<?php
//                 // 

//                 header('Location: index.php');

//                 // exit(); // Ensure script stops after redirect
//             } else {
//                 $isError = 1;
//                 $errorMsg = "Password is incorrect";
//             }
//         } else {
//             $isError = 1;
//             $errorMsg = "Email not found in the database";
//             header('Location: register.php');
//             echo "<script>alert('Email not found in the database')</script>";
//             // echo "<script>window.location.href='./register.php</script>";
//         }
//     }
// } else {
//     // Handle the case where the form has not been submitted
//     $email = "";
//     $password = "";
// }
// session_start();
// $isError = 0;
// $errorMsg = "";

if (isset($_POST['submit'])) {
    // Sanitize and validate input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the input values are valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $isError = 1;
        $errorMsg = "Invalid email format";
    } else {
        // Prepare SQL statement to avoid SQL injection
        $sql = "SELECT * FROM `userslist` WHERE email = '$email'";
        $check = mysqli_query($config, $sql);
        if ($row = mysqli_fetch_array($check)) {

            $actualEmail = $row[2];
            $actualId = $row[0];
            $actualpwd = $row[3];

            if ($email == $actualEmail && $password == $actualpwd) {
                // Initialize session
                $_SESSION['user_id'] = $actualId;

                // Check if there is a redirect URL
                $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php';

                // Redirect to the desired page or default to home
                header('Location: ' . urldecode($redirect));
                exit(); // Ensure script stops after redirect
            } else {
                $isError = 1;
                $errorMsg = "Password is incorrect";
            }
        } else {
            $isError = 1;
            $errorMsg = "Email not found in the database";
            echo "<script>alert('Create new account')</script>";
            echo "<script>window.location.href = 'register.php';</script>";
        }
    }
}
// echo "<h1> $actualEmail</h1>";
// echo "<h1> $actualId</h1>";
// echo "<h1> $actualpwd</h1>";
?>
<!-- <a href="./add-to-cart.php?pid=$actualId">Add to Cart</a> -->


<?php
// Check subAdmin credentials
if ($email == $subAdmin || $password == $subadminPass) {
    echo "<script>alert('SubAdmin is allowed');</script>";
    echo "<script>window.location.href='../cloth-hunt/dashboard/index.php';</script>";
    exit();
}

?>
<!-- <script>alert('window.location.href = "register.php";')</script> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <title>Signin Page</title>
    <style>
        @font-face {
            font-family: roboto;
            src: url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;800;900&display=swap');
        }

        * {
            margin: 0;
            padding: 0;
            list-style: none;
            font-family: roboto;

        }


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
            margin-left: clamp(60px, 20vw, 380px) !important;
            flex-direction: row-reverse;
            position: relative;
            flex-wrap: wrap;
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


        input[type='email'],
        input[type='password'],
        input[type='cpassword'] {
            width: clamp(250px, 20vw, 350px);
            height: 25px;
            padding-left: 10px;
            font-weight: 400;
            font-size: 16px;
        }

        @media(max-width:425px) {
            .container {
                flex-direction: column-reverse;
            }
        }

        @media screen and (max-width:384px) {
            body {
                overflow-x: hidden;
            }
        }

        @media screen and (max-width:1200px) and (min-width:200px) {
            body {
                overflow-x: hidden;
            }

            .register-form {
                display: flex;
                flex-direction: column;
                gap: 80px;
                margin: 0px !important;
                margin-top: 80px 0px;
                justify-content: center;
            }

            .left-form {
                width: 100%;
                margin-top: 80px;
            }

            .left-form img {
                width: 100%;
            }

            .right-form {
                width: 60%;
                padding: 50px;
            }
        }
    </style>
</head>

<body>
    <?php
    // echo "<h1> $actualEmail</h1>";
    // echo "<h1> $actualId</h1>";
    // echo "<h1> $actualpwd</h1>";
    ?>
    <div class="ovele"></div>
    <div class="ovele2"></div>
    <div class="ovele3"></div>
    <div class="ovel"></div>
    <div class="ovel2"></div>
    <div class="ovel3"></div>
    <!-- <div class="container"> -->
    <div class="register-form">
        <div class="left-image">
            <img src="https://images.pexels.com/photos/5325554/pexels-photo-5325554.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="">
        </div>
        <div class="right-form">
            <form action="" method="POST">
                <h1 class="head text-center" style="margin-bottom: 50px;">SignIn</h1>
                <div class="mb-5" style="display: flex;flex-direction: column;">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="" value="">
                </div>
                <br>
                <div class="mb-5" style="display: flex;flex-direction: column;">
                    <label for="email">Password</label>
                    <input type="password" name="password" id="" value=" ">
                </div><br>

                <span style="color: red; margin-bottom:30px;"><?php echo (!empty($errorMsg)) ? $errorMsg : ''; ?></span><br><br>

                <a href="./register.php" style="text-decoration:none;  color:blue;">New User </a>
                <br><br>
                <input type="submit" class="button" name="submit" value="Signin" style="margin-right: 60px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" class="button" name="clear" value="Reset">
            </form>
        </div>
    </div>


</body>

</html>