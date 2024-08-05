<?php
//session_start(); // Start the session?
// include_once('./config.php');
// Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     // Redirect to login page
//     header("Location: signin.php");
//     // exit();
// }
// else{
//     $userid = $_SESSION['user_id'];
// }
// echo $userid;


// if (!isset($_SESSION['user_id'])) {
//     header('Location: signin.php');
//     exit();
// }

// echo $productId;
// Continue with product page logic if the user is logged in
include_once('./head.php');

// $userId = $_SESSION['user_id'];
// $id = isset($_GET['pId']) ? intval($_GET['pId']) : 0;

// // Fetch product details from database
// $sql = 'SELECT * FROM seller WHERE id=' . $id;
// echo $sql; // For debugging purposes

// $product = mysqli_query($config, $sql);

include_once('./nav.php');
?>

<style>
    /* external css */

    @font-face {
        font-family: roboto;
        src: url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;600;800;900&display=swap');
    }


    * {
        margin: 0;
        padding: 0;
        list-style-type: none;
        font-family: roboto;
    }

    .container {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 50px;
        margin-top: 4%;
    }

    .xzoom-container {
        width: 50%;
        height: auto;
        display: flex;
        flex-direction: row-reverse;
        gap: 20px;
    }

    .xzoom-container .zoom img {
        width: 400px;
    }

    .xzoom-thumb {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .xzoom-gallery {
        width: 100px;
    }

    .description {
        width: 50%;
        display: flex;
        flex-direction: column;

    }
</style>

<?php

if(isset($userId))
{
    echo "User id : ".$userId;
    $id = isset($_GET['pId']) ? intval($_GET['pId']) : 0;
}
else{
    echo "<script>window.location.href = 'signin.php';</script>";
}
?>
<!-- <div class="container"> -->
    <?php
    $sql = 'SELECT * FROM seller WHERE id=' . $id;
    $product = mysqli_query($config, $sql);

    while ($row = mysqli_fetch_array($product)) {
        $productId = $row[0];
        $productImageFront = $row[1];
        $productImageBack = $row[2];
        $productTitle = $row[3];
        $productPrice = $row[4];
        $productoldPrice = $row[5];
  

            if (isset($_POST['add'])) {
                // Check if user is logged in
                // if (!isset($_SESSION['user_id'])) {
                //     echo "<script>alert('Please log in to add items to the cart.');</script>";
                //     echo "<script>window.location.href = 'signin.php';</script>";
                //     exit();
                // }

                // Check if the product already exists in the cart
                // $check_query = "SELECT * FROM CartDetails WHERE id='$productId' AND userId='$userId'";
                // $check_result = mysqli_query($config, $check_query);

                // if (mysqli_num_rows($check_result) > 0) {
                //     // Product already exists in the cart
                //     echo "<script>alert('Product already in cart.');</script>";
                //     echo "<script>window.location.href = 'index.php';</script>";
                // } else {
                    // Insert the product into the cart
                    $query = "INSERT INTO cartdetails (productId, userId, imagePath, title, price) VALUES ('$productId', '$userId', '$productImageFront', '$productTitle', '$productPrice')";

                    

                    if (mysqli_query($config, $query)) {
                        echo "<script>alert('Cart updated successfully');</script>";
                        echo "<script>window.location.href = 'index.php';</script>";
                    } else {
                        echo "<script>alert('Product Already updated .');</script>";

                        // echo "Error updating cart: " . mysqli_error($config);
                    }
                }
            }
        // }
    ?>




<div class="container" style="margin-bottom: 6%;">

<div class="xzoom-container">
    <div class="zoom">
        <img src="./img/<?php echo $productImageFront; ?>" alt="" class="xzoom">
    </div>
    <div class="xzoom-thumb">
        <a href="">
            <img class="xzoom-gallery" src="./img/<?php echo $productImageFront; ?> " alt="">
        </a>
        <a href="">
            <img class="xzoom-gallery" src="./img/<?php echo $productImageBack; ?>" alt="">
        </a>

        <!-- <a href="https://rukminim2.flixcart.com/image/612/612/xif0q/t-shirt/g/t/o/xl-ts23-vebnor-original-imagwhgbjnrg8hjc.jpeg?q=70">
        <img class="xzoom-gallery" src="https://rukminim2.flixcart.com/image/612/612/xif0q/t-shirt/g/t/o/xl-ts23-vebnor-original-imagwhgbjnrg8hjc.jpeg?q=70" alt="">
    </a>
   -->
    </div>
</div>
<!-- zoom container end -->

<!-- description container -->
<div class="description">
    <h1 class="cont">
        <?php echo $productTitle; ?>
        <!-- <?php echo $productTitle; ?> -->
    </h1>
    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita corrupti fuga vitae, minima quaerat
        a? Ex
        consequatur voluptates, molestiae quia quibusdam distinctio tempore. Reprehenderit molestiae explicabo
        fuga
        debitis, accusamus accusantium amet quibusdam laborum expedita architecto dicta dolor a, soluta
        consectetur
        cum quam perspiciatis voluptas repellendus reiciendis facilis deserunt ipsa aspernatur voluptatibus.
        Itaque
        repudiandae sint placeat libero maiores dolore necessitatibus laborum ipsam adipisci. Perspiciatis
        temporibus consequuntur repellendus iure adipisci eaque officia nemo dolorum modi saepe maiores,
        reprehenderit necessitatibus itaque quo laborum praesentium voluptate tenetur corporis fugiat?
        Architecto
        quam similique dolore aliquid ab debitis accusantium sequi laudantium nihil ea? Laborum, qui beatae?
    </p>
    <div class='price d-flex '>
        <p class="fs-1 fw-bold">&#8377;
         <?php echo  $productPrice; ?>
        </p>&nbsp;&nbsp;
        <del class="fs-4 mt-3">&#8377;
            <?php echo  $productoldPrice ; ?>
        </del>
    </div>
    <div class="btnn">
        <!-- <button class="buy">Buy Now</button> -->
        <form action="" method="POST">
            <input type="hidden"  name="product_id" value="<?php $productId ?> ">
            <button class="cart btn btn-danger" type="submit" name="add">Add To Cart</button>
        </form>
    </div>
</div>
</div>




</div>

<?php
include_once('./footer.php');
?>
<script src="./js/jquery.js"></script>
<script src="./js/zoom.js"></script>
<script>
    $(document).ready(function() {
        $(".xzoom, .xzoom-gallery").xzoom({
            zoomWidth: 450,
            tint: "#333",
            Xoffset: 15
        });
    });
</script>