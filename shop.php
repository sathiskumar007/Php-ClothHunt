<?php

include_once('config.php');
?>


<?php
include_once('head.php');
include_once('nav.php');

?>

<style>
    .containerr {
        width: 100%;
        height: auto;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
    }

    .cardd {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 400px;
        text-align: center;
    }

    .cardd img:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .cardd img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        background-position: center center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;

    }

    .cardd-content {
        padding: 20px;
        text-align: justify;
    }

    .cardd-title {
        font-size: 1.5em;
        color: #333;
        margin: 0;
    }

    .cardd-description {
        margin: 15px 0;
    }

    .cardd-button {
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        background-color: transparent;
        transition: background-color 0.3s ease;
        text-decoration: none;
    }

    .cardd-button:hover {
        color: white !important;
        background-color: #54d9e1;
    }

    .banner-container {
        background-image: url('./img/sho-banner.jpg');
        background-position: center;
        background-size: cover;
        height: 400px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.507);
        background-blend-mode: normal;
        background-attachment: fixed;
    }

    .banner-container h1 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: clamp(2rem, 5vw, 4.5rem);
    }
</style>


<div class="banner-container">
    <h1 class="text-center">Products</h1>
</div>

<div class="container-fluid w-100  d-flex flex-column gap-5" style="margin-top: 2%;margin-bottom: 5%;">
    <h3 class=" px-5">The New Fashion Collection</h3>

    <div class="containerr w-100 d-flex gap-5 mt-0 ">
        <?php
        $sql = "SELECT * FROM shop";
        $result = mysqli_query($config, $sql);

        while ($row = mysqli_fetch_array($result)) {
            $productId = $row[0];
            $productImageFront = $row[1];
            $productTitle = $row[2];
            $productPrice = $row[3];
            $productQty = $row[4];
            echo "
             <div class='cardd'>
                <img src='./img/$productImageFront' alt='Cardd Image'>
                <div class='cardd-content'>
                    <h3 class='cardd-title mb-3'>$productTitle</h3>
                    <p class='price fs-5 fw-bold'>&#8377;$productPrice</p>
                     <form action='' method='POST'>
                        <input type='hidden' name='product_id' value='$productId'>
                        <input type='hidden' name='product_image' value='$productImageFront'>
                        <input type='hidden' name='product_title' value='$productTitle'>
                        <input type='hidden' name='product_price' value='$productPrice'>
                        <button type='submit' name='productAdd' class='cardd-button text-dark bg-none'>Shop Now</button>
                     </form>
                </div>
            </div>
            ";
        }
        ?>
        <!-- </div> -->

        <!-- <form action='' method='POST'>
        <button type='submit'  class=' cardd-button text-dark bg-none'>Shop Now</button>
        </form> -->
        <!-- <script>
            alert('Shop Now');
        </script> -->
        <!-- <button type='submit'  class=' cardd-button text-dark bg-none'>Shop Now</button> -->
        <?php
        if (isset($_POST['productAdd'])) {
            $productId = $_POST['product_id'];
            $productImage = $_POST['product_image'];
            $productTitle = $_POST['product_title'];
            $productPrice = $_POST['product_price'];

            $query = "INSERT INTO CartDetails (id, imagePath, title, price) VALUES ('$productId', '$productImage', '$productTitle', '$productPrice')";
            if (mysqli_query($config, $query)) {
                echo "
            <script>alert('Cart updated successfully.');</script>
            <script>window.location.href = 'shop.php';</script>
            ";
            } else {
                echo "Error updating cart: " . mysqli_error($config);
            }
        }
        ?>

        <!-- <div class="cardd">
            <img src="https://nooni-be87.kxcdn.com/nooni-fashion/wp-content/uploads/2023/06/38-450x572.jpg" alt="Cardd Image">
            <div class="cardd-content">
                <h3 class="cardd-title mb-3">Detail Maxi Dress</h3>
                <a href="#" class=" cardd-button text-dark bg-none">Shop Now</a>
            </div>
        </div>
        <div class="cardd">
            <img src="https://nooni-be87.kxcdn.com/nooni-fashion/wp-content/uploads/2023/06/38-450x572.jpg" alt="Cardd Image">
            <div class="cardd-content">
                <h3 class="cardd-title mb-3">Detail Maxi Dress</h3>
                <a href="#" class=" cardd-button text-dark bg-none">Shop Now</a>
            </div>
        </div>
        <div class="cardd">
            <img src="https://nooni-be87.kxcdn.com/nooni-fashion/wp-content/uploads/2023/06/38-450x572.jpg" alt="Cardd Image">
            <div class="cardd-content">
                <h3 class="cardd-title mb-3">Detail Maxi Dress</h3>
                <a href="#" class=" cardd-button text-dark bg-none">Shop Now</a>
            </div>
        </div>
        <div class="cardd">
            <img src="https://nooni-be87.kxcdn.com/nooni-fashion/wp-content/uploads/2023/06/38-450x572.jpg" alt="Cardd Image">
            <div class="cardd-content">
                <h3 class="cardd-title mb-3">Detail Maxi Dress</h3>
                <a href="#" class=" cardd-button text-dark bg-none">Shop Now</a>
            </div>
        </div>
        <div class="cardd">
            <img src="https://nooni-be87.kxcdn.com/nooni-fashion/wp-content/uploads/2023/06/38-450x572.jpg" alt="Cardd Image">
            <div class="cardd-content">
                <h3 class="cardd-title mb-3">Detail Maxi Dress</h3>
                <a href="#" class=" cardd-button text-dark bg-none">Shop Now</a>
            </div>
        </div> -->
    </div>
</div>

<!-- <div class="container d-flex justify-content-center mb-5" style="color: #54d9e1!important;">
    <nav aria-label="Page navigation example">
        <ul class="pagination" style="box-shadow: 0px 0px 20px 10px solid #54d9e1;">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true" class="text-dark">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link text-decoration-none fw-bold" style="color: #54d9e1!important ;" href="#">1</a></li>
            <li class="page-item"><a class="page-link text-decoration-none fw-bold" style="color: black!important ;" href="#">2</a></li>
            <li class="page-item"><a class="page-link text-decoration-none fw-bold" style="color: black!important ;" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true" class="text-dark">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div> -->

<?php
// include_once('footer.php');
include('./footer.php')

?>