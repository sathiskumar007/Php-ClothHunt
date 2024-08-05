<?php

include_once('./config.php');

// ['user_id'];
// } else {
//     echo "No session variables are set.";
// }
// include_once('config.php');

// if (isset($_GET['logout'])) {
//     setcookie('myUserId', "", time() - 60 * 60 * 24);
//     header('Location:signin.php');
// }
// if (isset($_COOKIE['myUserId'])) {
//     $thisUserId = $_COOKIE['myUserId'];
// }


// session_start();
// require 'config.php';

// // Check if the user is logged in
// if (isset($_SESSION['user'])) {
//     $name = $_SESSION['user'];
//     echo "<h1>Hello, " . htmlspecialchars($name) . "</h1>";
// } else {
//     session_destroy();
//     header('Location: signin.php');
//     exit(); // Ensure the script stops here
// }

// // Check if the logout button has been pressed
// if (isset($_POST['logout'])) {
//     session_destroy();
//     header('Location: signin.php');
//     exit(); // Ensure the script stops here
// }
?>



<!DOCTYPE html>
<html lang="en">

<?php
include_once('./head.php');
include_once('./nav.php');


?>
<style>
    /* slider */


    .splide__slide {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: #eee;
        border: 1px solid #ddd;
    }

    .captions {
        width: 100%;
        position: absolute;
        left: 15%;
    }

    .captions h1 {
        font-size: clamp(10px, 5vw, 80px);
        font-weight: normal;
    }

    .text {
        font-size: clamp(5px, 2vw, 18px);
        font-weight: normal;
        /* color: black; */
        padding: 0;
        margin: 0;
    }

    .hover-button {
        position: relative;
        padding: 5px 20px;
        font-size: clamp(5px, 2vw, 18px);
        color: black;
        font-weight: normal;
        background: transparent;
        border: none;
        overflow: hidden;
        cursor: pointer;
        outline: none;
        text-align: center;
    }

    .hover-button :hover {
        color: #54d9e1;
    }

    .button-text {
        position: relative;
        z-index: 1;
    }

    .hover-line {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background-color: #54d9e1;
        transform: translateX(-100%);
        transition: transform 0.3s ease;
    }

    .hover-button:hover .hover-line {
        color: #54d9e1;
        transform: translateX(0);
    }

    @media screen and (max-width:325px) and (min-width:50px) {
        .hover-button {
            padding: 2px 5px;
            margin: 0;
        }
    }


    /* slider end */



    .card-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: auto;
        flex-wrap: wrap;
        gap: 50px;
    }

    .card-wrapper {
        width: 400px;
        height: 400px;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
    }

    .card-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .card-top {
        position: absolute;
        top: 75%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
    }

    .card-top p {
        color: white;
        font-size: 30px;
        font-family: 'Roboto', sans-serif;
    }

    .button {
        color: black;
        background-color: white;
        font-size: 20px;
        padding: 10px 30px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.5s ease;
    }

    .button:hover {
        background-color: #54d9e1;
        color: white;
    }



    .categories {
        margin-top: 3%;
        margin-left: 4%;
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 75px;
    }

    .cat h1 {
        margin-top: 6%;
        text-align: center;
        font-family: roboto;
    }

    .categories .catimg {
        width: 200px;
        height: 200px;
    }

    .catimg img {
        transition: 0.1s ease-in-out;
    }

    .catimg img:hover {
        transform: scale(0.9);
    }

    .categories .catimg img {
        border-radius: 50%;
    }

    .categories .catimg p {
        text-align: center;
        font-size: 20px;
        margin-top: 30px;
        margin-left: 40px;
        margin-bottom: 8%;

    }

    .categories .catimg p:hover {
        color: #54d9e1;
    }

    .container-fluid {
        width: 100%;
        height: 100vh;
        display: flex;
        /* flex-wrap: wrap; */
        align-items: center;
        margin: 0;
        padding: 0;
        background-color: #d9d9d9;
        background-blend-mode: normal;
        background-image: url('https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/banner-10.jpg');
        background-position: top center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        position: relative;
        margin-bottom: 5%
    }

    .content {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        position: absolute;
        justify-content: center;
        align-items: center;
    }

    .content a {
        font-size: clamp(50px, 3vw, 100px);
        color: white;
        text-align: center;
    }

    .fashbtn {
        background-color: white;
        padding: 10px 30px;
        border-radius: 10px;
        border: 1px solid white;
        cursor: pointer;
        transition: 0.2s ease-in-out;
    }

    .fashbtn:hover {
        color: white;
        background-color: #54d9e1;
        border: 1px solid #54d9e1;
    }

    .bestseller h1 {
        font-size: 36px;
        text-align: center;
    }

    .card-content {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .entry-header .div3 {
        width: 30px;
        height: 30px;
        background-color: blue;
        border-radius: 50px;

    }

    @media(max-width:768px) {
        .carousel-caption {
            margin-bottom: 0px;
        }

        .cat {
            margin-top: 15%;

        }

        .categories {
            margin-top: 20%;
            /* margin-right: 20%; */
            margin-bottom: 30%;
        }

    }



    .carousel-caption {
        /* background-color: ; */
        color: white;
        font-size: 30px;
        padding: 20px;
    }


    /* testimonial */

    .testimonial {
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
        padding: 30px 30px 30px 130px;
        margin: 0 15px 30px 15px;
        overflow: hidden;
        position: relative;
    }

    .testimonial:before {
        content: "";
        position: absolute;
        bottom: -4px;
        left: -17px;
        transform: rotate(45deg);
    }

    .testimonial:after {
        content: "";
        position: absolute;
        top: -4px;
        left: -17px;
        transform: rotate(135deg);
    }

    .testimonial .pic {
        display: inline-block;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        position: absolute;
        top: 60px;
        left: 20px;
    }

    .testimonial .pic img {
        width: 100%;
        height: auto;
    }

    .testimonial .description {
        font-size: 15px;
        letter-spacing: 1px;
        color: #6f6f6f;
        line-height: 25px;
        margin-bottom: 15px;
    }

    .testimonial .title {
        display: inline-block;
        font-size: 20px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #54d9e1;
        margin: 0;
    }

    .testimonial .post {
        display: inline-block;
        font-size: 17px;
        color: #54d9e1;
        font-style: italic;
    }

    .owl-theme .owl-controls .owl-page span {
        border: 2px solid white;
        background: #54d9e1 !important;
        border-radius: 15 !important;
        opacity: 1;
    }

    .owl-theme .owl-controls .owl-page.active span,
    .owl-theme .owl-controls .owl-page:hover span {
        background: white !important;
        border-color: #54d9e1;
    }

    @media (max-width: 767px) {
        .testimonial {
            padding: 20px;
            text-align: center;
        }

        .testimonial .pic {
            display: block;
            position: static;
            margin: 0 auto 15px;
        }
    }

    .testimonial-title {
        text-align: center;
        font-family: roboto;
        margin-bottom: 2em;
    }

    /* testimonial end */

    /* folloe insta */

    .ccard {
        position: relative;
        width: 300px;
        height: 300px;
        background-color: #f0f0f0;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s;
        margin-bottom: 50px;
    }

    .ccard:hover .social-icons {
        transform: translateY(-100px);
        opacity: 1;
        visibility: visible;
    }

    .ccard:hover img {
        transform: scale(1.1);
    }

    .ccard-content img {
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: cover;
        transition: 0.5s;
    }

    .social-icons {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        transform: translateY(100%);
        opacity: 0;
        visibility: hidden;
        text-align: center;
        transition: transform 0.3s, opacity 0.3s, visibility 0.3s;
    }

    .social-icons a {
        display: inline-block;
        margin-right: 10px;
        color: white;
        font-size: 30px;
        text-decoration: none;
    }

    .card-wrapper img {
        transition: 0.5s;
    }

    .card-wrapper:hover img {
        transform: scale(1.1);
    }

    /* folloe insta end */

    /* seller */

    .sellerflow {
        width: 100%;
        height: auto;
        flex-wrap: wrap;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container-flow {
        width: 330px;
        height: 530px;
        flex-direction: column;
    }

    .containerr {
        width: 300px;
        height: 400px;
        margin-bottom: 0px;
    }

    .hover-switch {
        cursor: pointer;
    }

    .hover-switch img {
        position: absolute;
        object-fit: cover;
        width: 300px;
        height: 400px;
        border-radius: 10px;
    }

    .hover-switch img:last-of-type {
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
        -webkit-transition: opacity 0.5s ease-in-out;
    }

    .hover-switch:hover>img:last-of-type {
        opacity: 1;
    }

    .hover-switch:hover>img:first-of-type {
        opacity: 1;
    }

    /* sellerend */
</style>

<body>
    <?php
    // include_once('./nav.php');


    ?>

    <!-- 
    <section class="mb-5">
        <div id="carouselExampleAutoplaying " style="z-index: -10" class="carousel slide " data-bs-ride="carousel">
            <div class='carousel-inner'>
                <?php
                // $query = "SELECT * FROM caurosel";
                // $product = mysqli_query($config, $query);
                // $first = true; 

                // while ($row = mysqli_fetch_array($product)) {
                //     $activeClass = $first ? 'active' : '';
                //     $first = false; 

                //     echo "
                //         <div class='carousel-item $activeClass' style='background-color:white; padding-top:clamp(20px,3.5vw,60px); height: auto;'>
                //             <img class='img d-block float-right' src='./img/{$row[1]}' alt='Slide' style='width: 30%;'>
                //             <div class='caption carousel-caption  d-flex flex-column m w-50' >
                //                  <h1 class='text text-dark' style='margin-top:10px; font-size:clamp(20px ,3.5vw,90px);'>{$row[2]}</h1>
                //                 <button class='btn border px-3  text-dark' style='width: 150px;' >Shop Now</button>
                //             </div>
                //         </div>
                //           ";
                // }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" style="color: black; font-size:larger; background-color:#54d9e1;padding:20px;"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" style="color: black; font-size:larger; background-color:#54d9e1;padding:20px;"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


    </section> -->


    <section>
        <div id="my-slider" class="splide " style="z-index: -1;">
            <div class="splide__track">
                <ul class="splide__list">

                    <?php
                    $query = "SELECT * FROM caurosel";
                    $product = mysqli_query($config, $query);
                    $first = true; // tcaurosel active or not active itteration

                    while ($row = mysqli_fetch_array($product)) {
                        // caurosel working or not condition
                        $activeClass = $first ? 'active' : '';
                        $first = false; //false after first iteration

                        echo "
                  

                     <li class='splide__slide  w-100 h-100 bg-white $activeClass' data-aos='fade-up-right''>
                        <div class='captions'>
                            <p class='text'data-aos='fade-right' style=' color: #54d9e1; text-transform: uppercase; font-weight: bloder;'>{$row[2]}</p>
                            <h1  class='caption'>{$row[3]}</h1>
                            <button class='hover-button'>
                                <span class='button-text'>Shop Now</span>
                                <span class='hover-line'></span>
                            </button>
                        </div>
                        <img src='./img/{$row[1]}' class='w-25 ms-auto' alt=''>
                    </li>
                          ";
                    }
                    ?>

                    <!-- <div class='carousel-item $activeClass' style='background-color:white; padding-top:clamp(20px,3.5vw,60px); height: auto;'>
                        <img class='img d-block float-right' src='./img/{$row[1]}' alt='Slide' style='width: 30%;'>
                        <div class='caption carousel-caption  d-flex flex-column m w-50'>
                            <h1 class='text text-dark' style='margin-top:10px; font-size:clamp(20px ,3.5vw,90px);'>{$row[2]}</h1>
                            <button class='btn border px-3  text-dark' style='width: 150px;'>Shop Now</button>
                        </div>
                    </div> -->

                    <!-- <li class='splide__slide w-100 h-100 bg-white'>
                        <div class='captions'>
                            <p class='text' style=' color: #54d9e1; text-transform: uppercase; font-weight: bloder;'>New Arrival</p>
                            <h1 class='caption'>Discover the <br> Latest Collections</h1>
                            <button class='hover-button'>
                                <span class='button-text'>Shop Now</span>
                                <span class='hover-line'></span>
                            </button>
                        </div>
                        <img src='./img/banner-1.png' class='w-25 ms-auto' alt=''>
                    </li> -->
                    <!-- <li class="splide__slide w-100 h-100 bg-white">
                        <div class="captions">
                            <p class="text" style=" color: #54d9e1; text-transform: uppercase; font-weight: bloder;">Big sale</p>
                            <h1 class="caption">Up To 50% Off <br> Trendy Fashion</h1>
                            <button class="hover-button">
                                <span class="button-text">Shop Now</span>
                                <span class="hover-line"></span>
                            </button>
                        </div>
                        <img src="./img/banner-2.png" class="w-25 ms-auto" alt="">
                    </li>
                    <li class="splide__slide w-100 h-100 bg-white">
                        <div class="captions">
                            <p class="text" style=" color: #54d9e1; text-transform: uppercase; font-weight: bloder;">Fashion Women</p>
                            <h1 class="caption">Top Deals <br>Up To 50% Off</h1>
                            <button class="hover-button">
                                <span class="button-text">Shop Now</span>
                                <span class="hover-line"></span>
                            </button>
                        </div>
                        <img src="./img/banner-3.png" class="w-25 ms-auto" alt="">
                    </li> -->
                </ul>
            </div>
        </div>
    </section>


    <style>
        /* Example CSS for hover animations */
        .hover-button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            background-color: #54d9e1;
            color: white;
            border: none;
            cursor: pointer;
        }

        .hover-button .button-text {
            position: relative;
            z-index: 1;
        }

        .hover-button .hover-line {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #000;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease;
        }

        .hover-button:hover .hover-line {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .card-wrapper {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-wrapper:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script>

    </script>
    <section style="margin-top: 5%;">
        <h1 class="heading text-center " style="margin-bottom: 80px; z-index: -2;margin-top:80px" data-aos="fade-up">Our Special Collections</h1>
        <div class="card-container">
            <!-- <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/banner.jpg" alt=""><br> -->
            <!-- <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/banner-1.jpg" alt=""><br> -->
            <!-- <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/banner-2.jpg" alt=""><br> -->

            <?php
            $collectionquery = "SELECT * FROM collections";
            $collectionproduct = mysqli_query($config, $collectionquery);
            $collectionfirst = true; // tcaurosel active or not active itteration

            while ($row = mysqli_fetch_array($collectionproduct)) {
                // caurosel working or not condition
                $collectionactiveClass = $collectionfirst ? 'active' : '';
                $collectionfirst = false; //false after first iteration

                echo "
                    <div class='card-wrapper  $collectionactiveClass'  style='z-index: -1   ' >
                    <img src='./img/{$row[3]}'>
                    <div class='card-top'>
                        <p>{$row[1]}</p>
                        <button class='button'>Show More</button>
                    </div>
                </div>
            ";
            }
            ?>


            <!-- <div class="card-wrapper">
        <img src="./img/specialcollection-1.jpg" alt="Spring Collection">
        <div class="card-top">
            <p>Spring Collection</p>
            <button class="button">Show More</button>
        </div>
    </div> -->


            <!-- <div class="card-wrapper">
                <div class="card-top">
                    <p>Spring Collection</p>
                    <button class="button">Show More</button>
                </div>
            </div> -->
            <!-- <div class="card-wrapper">
                <div class="card-top">
                    <p>Spring Collection</p>
                    <button class="button">Show More</button>
                </div>
            </div>
            <div class="card-wrapper">
                <div class="card-top">
                    <p>Spring Collection</p>
                    <button class="button">Show More</button>
                </div>
            </div> -->

        </div>
    </section>


    <section class="cat">
        <h1 data-aos="fade-down">Shop by categories </h1>
        <div class="categories" style="width: 90% ;">

            <?php
            $categoriesquery = "SELECT * FROM categories";
            $categoriesproduct = mysqli_query($config, $categoriesquery);
            $categoriesfirst = true; // tcaurosel active or not active itteration

            while ($row = mysqli_fetch_array($categoriesproduct)) {
                // caurosel working or not condition
                $categoriesactiveClass = $categoriesfirst ? 'active' : '';
                $categoriesfirst = false; //false after first iteration

                echo "
                        <div class='catimg  $categoriesactiveClass' style='margin-bottom:50px;'  data-aos='zoom-out-left'>
                            <img src='./img/{$row[1]}'>
                            <p>{$row[2]}</p>
                        </div>
            ";
            }
            ?>
            <!-- <div class="catimg">
                <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/category.jpg" alt="">
                <p>Topes</p>
            </div> -->
            <!-- <div class="catimg">
                <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/category.jpg" alt="">
                <p>Topes</p>
            </div>
            <div class="catimg">
                <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/category.jpg" alt="">
                <p>Topes</p>
            </div>
            <div class="catimg">
                <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/category.jpg" alt="">
                <p>Topes</p>
            </div>
            <div class="catimg">
                <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/category.jpg" alt="">
                <p>Topes</p>
            </div>
            <div class="catimg">
                <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/category.jpg" alt="">
                <p>Topes</p>
            </div> -->

        </div>
    </section>




    <section style="margin-top:10%;">
        <!-- <div class="fashion w-100  " style="background-image:url('./img/pretty-girl-black-hat-red-coat-raised-hands-holding-cap-studio-white-wall.jpg') ; margin:0px;font-family:roboto;">
            <div class="content">
                <a href="https://youtu.be/I10XB1-IIbA?si=iVjfkE4IbezmX9ZN"><i class="fa-regular fa-circle-play"></i></a><br>
                <h1>Step into Fashion Excellence</h1>
                <button class="fashbtn">Show More</button>
            </div>
        </div> -->

        <!-- <div class="fashion container-fluid ">
            <div class="img">
                <img src="./img/pretty-girl-black-hat-red-coat-raised-hands-holding-cap-studio-white-wall.jpg" alt="">
            </div>
            <div class="content">
                <a href="https://youtu.be/I10XB1-IIbA?si=iVjfkE4IbezmX9ZN"><i class="fa-regular fa-circle-play"></i></a><br>
                <h1 class="text-center">Step into Fashion Excellence</h1>
                <button class="fashbtn">Show More</button>
            </div>
        </div> -->
        <div class="container-fluid">
            <!-- <div class="adimg">
                <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2023/11/banner-10.jpg" alt="">
            </div> -->
            <div class="content ">
                <a href="https://youtu.be/I10XB1-IIbA?si=iVjfkE4IbezmX9ZN" data-aos="fade-down-right" target="_blank"><i class="fa-regular fa-circle-play"></i></a>
                <h1 class="text-center text-white" data-aos="fade-down-left">Step into Fashion Excellence</h1><br>
                <button class="fashbtn" data-aos="fade-down-right">Show More</button>
            </div>
        </div>
    </section>


    <section class="py-3 py-md-5" style="margin-bottom: 7%;margin-top: 5%;">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h1 class=" text-black mb-2  text-center">Best seller</h1>
                </div>
            </div>
        </div>

        <!-- <div class="container overflow-hidden " style="margin-top: 50px;">
            <div class="row gy-4 gy-lg-0"> -->
        <!-- <div class=" d-flex  flex-md-row justify-content-center align-items-center gap-3 mt-5"> -->

        <?php
        // $sellerquery = "SELECT * FROM seller";
        // $sellerproduct = mysqli_query($config, $sellerquery);
        // $sellerfirst = true; // tcaurosel active or not active itteration

        // while ($row = mysqli_fetch_array($sellerproduct)) {
        //     // caurosel working or not condition
        //     $selleractiveClass = $sellerfirst ? 'active' : '';
        //     $sellerfirst = false; //false after first iteration

        // echo "
        //     <div class='col-12 col-lg-4   $selleractiveClass' style='margin-bottom:50px;'>
        //     <article>
        //         <div class='card border-0 '>
        //             <figure class='card-img-top m-0 overflow-hidden bsb-overlay-hover'>
        //                 <a href='#!'>
        //                     <img class='img-fluid bsb-scale bsb-hover-scale-up w-100' loading='lazy' alt='Business' src='./img/{$row[1]}' alt=''>
        //                 </a>
        //             </figure>
        //             <div class='card-body  bg-white p-4 '>
        //                 <div class='entry-header mb-3'>
        //                     <h2 class='card-title entry-title h4 mb-0'>
        //                         <a class='link-dark text-decoration-none' href='#!'>{$row[2]}</a>
        //                     </h2>

        //                 <p class='card-text entry-summary text-secondary'>
        //                 {$row[3]}
        //                 </p>
        //             </div>

        //         </div>
        //     </article>
        // </div>
        // ";
        // }
        // echo "       <div class='tpn_card'>
        //             <img src='./img/seller-1.jpg' class='w-100 mb-4' />
        //             <h5>Dragon Art</h5>
        //             <p>Enjoy this clean styling.</p>
        //             <div class='buttons'>
        //                 <a href='#' class='btn tpn_btn'>Explore</a>
        //                 <a href='#' class='btn tpn_btn'>Add to cart</a>
        //             </div>
        //  ";
        // }
        ?>
        <!-- <div class=" d-flex  flex wrap flex-md-row justify-content-center  gap-3 mt-5 mb-5" style="flex-wrap: wrap;"> -->
        <style>

        </style>
        <div id="seller" class="sellerflow" data-aos="fade-up" style='margin-top:25px;'>
            <?php

            $sellerquery = "SELECT * FROM seller WHERE userStatus='active'";
            $sellerproduct = mysqli_query($config, $sellerquery);
            $sellerfirst = true; // tcaurosel active or not active itteration
            // if($userid){
            //     echo $userid;
            // }else{
            //     echo "no wshow";
            // }
            while ($row = mysqli_fetch_array($sellerproduct)) {
                // caurosel working or not condition
                $pId = $row['id'];
                $selleractiveClass = $sellerfirst ? 'active' : '';
                $sellerfirst = false; //false after first iteration

            ?>
                <div class='container-flow mt-5'>

                    <?php
                    if (isset($userId)) {
                    ?>
                        <a href='./cart.php?pId=<?php echo $pId; ?>'>
                        <?php
                    } else {
                        ?>

                            <a href='./signin.php'>
                            <?php
                        }
                            ?>

                            <div class='containerr $selleractiveClass'>
                                <div class='hover-switch'>
                                    <img src='./img/<?php echo $row[1]; ?> ' alt='' />
                                    <img src='./img/<?php echo $row[2]; ?>' alt='' />
                                </div>
                            </div>
                            </a>
                            <div class='containerr px-2  mt-4'>
                                <h5 class=''><?php echo $row[3]; ?></h5>
                                <div class='price d-flex'>
                                    <p class='fs-5 fw-regular'>&#8377;<?php echo $row[4]; ?></p>&nbsp;&nbsp;
                                    <del class='fs-6 mt-2'>&#8377;<?php echo $row[5]; ?></del>
                                </div>

                            </div>
                </div>
            <?php
            }
            ?>

            <!-- // <div class='color flex gap-3'>
                // <button type='button' data-bs-toggle='tooltip' data-bs-placement='left' title='Skyblue' style='width:20px ; height:20px; border:0.1px solid black; background-color:#54d9e1; border-radius:80px;'></button>
                // <button type='button' data-bs-toggle='tooltip' data-bs-placement='bottom' title='White' style='width:20px ; height:20px; border:0.1px solid black; background-color:whitesmoke; border-radius:80px;'></button>
                // <button type='button' data-bs-toggle='tooltip' data-bs-placement='right' title='Yellow' style='width:20px ; height:20px; border:0.1px solid black; background-color:yellow; border-radius:80px;'></button>
                // </div> -->

            <!-- 
            <div class="container-flow">
                <a href="./index.php">
                    <div class="container ">
                        <div class="hover-switch">
                            <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2020/12/products-1-1-600x820.jpg" alt="" />
                            <img src="https://wpbingosite.com/wordpress/bemins/wp-content/uploads/2020/12/products-2-1-600x820.jpg" alt="" />
                        </div>
                    </div>
                </a>
                <div class="containerr mx-5 mt-4">
                    <h1>90s Chino Pant</h1>
                    <p>$50.00 – $60.00</p>
                    <div class="color flex gap-3">
                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-placement="left" title="Skyblue" style="width:20px ; height:20px; border:1px solid black; background-color:#54d9e1; border-radius:80px;"></button>
                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-placement="bottom" title="White" style="width:20px ; height:20px; border:1px solid black; background-color:white; border-radius:80px;"></button>
                        <button type="button" class="btn " data-bs-toggle="tooltip" data-bs-placement="right" title="Yellow" style="width:20px ; height:20px; border:1px solid black; background-color:yellow; border-radius:80px;"></button>
                    </div>
                </div>
            </div> -->
            <!-- <div class="tpn_card">
                <img src="./img/seller-1.jpg" class="w-100 mb-" />
                <h5>Dragon Art</h5>
                <p>Enjoy this clean styling.</p>
                <div class="buttons mb-5">
                    <a href="#" class="btn tpn_btn">Explore</a>
                    <a href="#" class="btn tpn_btn">Add to cart</a>
                </div>
            </div> -->
            <!-- <div class="tpn_card">
                <img src="./img/seller-1.jpg" class="w-100 mb-" />
                <h5>Dragon Art</h5>
                <p>Enjoy this clean styling.</p>
                <div class="buttons mb-5">
                    <a href="#" class="btn tpn_btn">Explore</a>
                    <a href="#" class="btn tpn_btn">Add to cart</a>
                </div>
            </div>
            <div class="tpn_card">
                <img src="./img/seller-1.jpg" class="w-100 mb-" />
                <h5>Dragon Art</h5>
                <p>Enjoy this clean styling.</p>
                <div class="buttons mb-5">
                    <a href="#" class="btn tpn_btn">Explore</a>
                    <a href="#" class="btn tpn_btn">Add to cart</a>
                </div>
            </div>
            <div class="tpn_card">
                <img src="./img/seller-1.jpg" class="w-100 mb-" />
                <h5>Dragon Art</h5>
                <p>Enjoy this clean styling.</p>
                <div class="buttons mb-5">
                    <a href="#" class="btn tpn_btn">Explore</a>
                    <a href="#" class="btn tpn_btn">Add to cart</a>
                </div>
            </div>
            <div class="tpn_card">
                <img src="./img/seller-1.jpg" class="w-100 mb-" />
                <h5>Dragon Art</h5>
                <p>Enjoy this clean styling.</p>
                <div class="buttons mb-5">
                    <a href="#" class="btn tpn_btn">Explore</a>
                    <a href="#" class="btn tpn_btn">Add to cart</a>
                </div>
            </div> -->


        </div>

        <!-- <figcaption>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-eye text-white bsb-hover-fadeInLeft' viewBox='0 0 16 16'>
                                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z' />
                                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z' />
                                            </svg>
                                            <h4 class='h6 text-white bsb-hover-fadeInRight mt-2'>Read More</h4>
                                        </figcaption> -->

        <!-- <div class='col-12 col-lg-4'>
                    <article>
                        <div class='card border-0'>
                            <figure class='card-img-top m-0 overflow-hidden bsb-overlay-hover'>
                                <a href='#!'>
                                    <img class='img-fluid bsb-scale bsb-hover-scale-up w-100' loading='lazy' alt='Business' src='./img/seller-1.jpg' alt=''>
                                </a>
                                <figcaption>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-eye text-white bsb-hover-fadeInLeft' viewBox='0 0 16 16'>
                                        <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z' />
                                        <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z' />
                                    </svg>
                                    <h4 class='h6 text-white bsb-hover-fadeInRight mt-2'>Read More</h4>
                                </figcaption>
                            </figure>
                            <div class='card-body border bg-white p-4 '>
                                <div class='entry-header mb-3'>
                                    <h2 class='card-title entry-title h4 mb-0'>
                                        <a class='link-dark text-decoration-none' href='#!'>90s Chino Pant</a>
                                    </h2>
                                </div>
                                <p class='card-text entry-summary text-secondary'>
                                $50.00 – <del>$60.00</del>
                                </p>
                                <button class="btn" style="background-color:#54d9e1; color:white;">Add to cart</button>
                            </div>
                            
                        </div>
                    </article>
                </div> -->
        <!-- </div> -->
        </div>
    </section>


    <section>
        <style>
            /* .owl-item {
            -webkit-backface-visibility: hidden;
            -webkit-transform: translateZ(0) scale(1.0, 1.0);
        } */

            .first-slide:before {
                position: absolute;
                content: "";
                padding: 25px;
                border-bottom: 7px solid #54d9e1;
                top: -53px;
                left: 140px;
                width: 75px;
            }

            .first-slide {
                position: relative;
                text-align: left;
                border: 3px solid #49494952;

                padding: 65px 35px;
                margin-top: 40px;
            }

            .first-slide h5 {
                color: #ff4800;
                font-size: 14px;
                text-transform: uppercase;
            }

            .first-slide h3 {
                font-size: 24px;
            }

            .first-slide-before {
                margin-top: 50px;
            }

            .jimmysection h2 {
                font-size: 20px !important;
                margin: 10px 0px;
                padding-left: 0px;
                text-transform: uppercase;
                font-size: 14px;
                color: #54d9e1;
                font-weight: 600;
            }

            .jimmysection p {
                font-weight: 600;
            }

            .second-slide:before {
                position: absolute;
                content: "";
                padding: 25px;
                border-bottom: 7px solid #54d9e1;
                top: -53px;
                left: 140px;
                width: 75px;
            }

            .second-slide {
                position: relative;
                text-align: left;
                border: 3px solid #49494952;

                padding: 65px 35px;
                margin-top: 40px;
            }

            .second-slide h5 {
                color: #ff4800;
                font-size: 14px;
                text-transform: uppercase;
            }

            .second-slide h3 {
                font-size: 24px;
            }

            .second-slide-before {
                margin-top: 50px;
            }

            .gailsection h2 {
                margin: 10px 0px;
                padding-left: 0px;
                text-transform: uppercase;
                font-size: 14px;
                color: #54d9e1;
                font-size: 20px !important;
                ;
                font-weight: 600;
            }

            .gailsection p {
                font-weight: 600;
            }

            .third-slide:before {
                position: absolute;
                content: "";
                padding: 25px;
                border-bottom: 7px solid #54d9e1;
                top: -53px;
                left: 140px;
                width: 75px;
            }

            .third-slide {
                position: relative;
                text-align: left;
                border: 3px solid #49494952;
                padding: 65px 35px;
                margin-top: 40px;
            }

            .third-slide h5 {
                color: #ff4800;
                font-size: 14px;
                text-transform: uppercase;
            }

            .third-slide h3 {
                font-size: 24px;
            }

            .third-slide-before {
                margin-top: 50px;
            }

            .mansonsection h2 {
                margin: 10px 0px;
                padding-left: 0px;
                text-transform: uppercase;
                font-size: 14px;
                color: #54d9e1;
                font-size: 20px !important;
                ;
                font-weight: 600;
            }

            .mansonsection p {
                font-weight: 600;
            }
        </style>


        <!-- <div class="container " style="margin-bottom:5%;">
            <div class="row p-5 ">
                <h1 class="testimonial-title ">Testimonial </h1>
                <div class="col-md-12 p-5 "> -->
        <!-- <div id="testimonial-slider" class="owl-carousel"> -->
        <!-- <div class="testimonial">
                            <div class="pic">
                                <img src="./img/image1.jpg" alt="Testimonial 1">
                            </div>
                            <p class="description">Great service and excellent quality!</p>
                            <h3 class="title">John Doe</h3>
                            <small class="post">- Architect</small>
                        </div> -->
        <!-- <div class='testimonial'>
                            <div class='pic'>
                                <img src='./img/image2.jpg' alt='Testimonial 2'>
                            </div>
                            <p class='description'>I love the products! Will definitely come back.</p>
                            <h3 class='title'>Jane Smith</h3>
                            <small class='post'>- Designer</small>
                        </div> -->
        <!-- Add more testimonials as needed -->
        <!-- </div> -->

        <!-- <div id="testimonial-slider" class="owl-carousel"> -->

        <?php
        // $testimonialquery = 'SELECT * FROM testimonial';
        // $testimonialproduct = mysqli_query($config, $testimonialquery);
        // // echo $testimonialquery;

        // // $testimonialfirst = true;

        // while ($row = mysqli_fetch_array($testimonialproduct)) {

        //     $pId = $row['id'];
        //     $pImgPath = $row['imagePath'];
        //     $pDesc = $row['description'];
        //     $pAuthor = $row['Author'];

        // echo $pId . "<br>";
        // echo $pImgPath . "<br>";
        // echo $pDesc . "<br>";
        // echo $pAuthor . "<br><br>";

        //     echo "   <div class='testimonial'>
        //         <div class='pic'>
        //             <img src='./img/image2.jpg' alt='Testimonial 2'>
        //         </div>
        //         <p class='description'>I love the products! Will definitely come back.</p>
        //         <h3 class='title'>Jane Smith</h3>
        //         <small class='post'>- Designer</small>
        //     </div>    

        //         ";
        // }
        // 
        ?>

        <!-- <div class='testimonial'>
                        <div class='pic'>
                            <img src='https://images.pexels.com/photos/704955/pexels-photo-704955.jpeg?w=940&h=650&auto=compress&cs=tinysrgb'>
                        </div>
                        <p class='description'>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed malesuada vulputate nisi in fermentum. Vivamus ac libero quis nisi auctor pulvinar. Aenean sit amet lectus posuere, mattis massa eget, ullamcorper diam. Nunc sit amet felis eget arcu congue dictum.
                        </p>
                        <h3 class='title'>Jessica</h3>
                        <small class='post'>- Archietect</small>
                    </div> -->
        <!-- </div> -->
        <!-- </div>
            </div>
        </div>
    </section> -->


        <section>
            <div class="container">
                <div class="author-carousel owl-carousel owl-theme">
                    <!-- <div class="col-md-4"> -->

                    <?php
                    $testimonialquery = 'SELECT * FROM testimonial';
                    $testimonialproduct = mysqli_query($config, $testimonialquery);
                    // echo $testimonialquery;

                    // $testimonialfirst = true;

                    while ($row = mysqli_fetch_array($testimonialproduct)) {

                        $pId = $row['id'];
                        $pImgPath = $row['imagePath'];
                        $pDesc = $row['description'];
                        $pAuthor = $row['Author'];

                        // echo $pId . "<br>";
                        // echo $pImgPath . "<br>";
                        // echo $pDesc . "<br>";
                        // echo $pAuthor . "<br><br>";

                        echo "   
                       <div class='first-slide'>
                    <h5>Comic</h5>
                    <h3>" . $pDesc . "</h3>
                    <div class='first-slide-before'>
                        <div class='row'>
                            <div class='col-md-3'>
                                <img src='img/" . $pImgPath . "' style='width: 50px; border-radius: 50px;' alt=''>
                            </div>
                            <div class='col-md-9'>
                                <div class='jimmysection'>
                                    <h2>" . $pAuthor . "</h2>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            ";
                    }
                    ?>
                    <!-- <div class='first-slide'>
                    <h5>Comic</h5>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    <div class='first-slide-before'>
                        <div class='row'>
                            <div class='col-md-3'>
                                <img src='img/22.jpg' style='width: 50px; border-radius: 50px;' alt=''>
                            </div>
                            <div class='col-md-9'>
                                <div class='jimmysection'>
                                    <h2>jimmy jefferson</h2>
                                    <p>21/08/2013</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                    <!-- <div class='testimonial'>
                            <div class='pic'>
                                <img src='./img/image2.jpg' alt='Testimonial 2'>
                            </div>
                            <p class='description'>I love the products! Will definitely come back.</p>
                            <h3 class='title'>Jane Smith</h3>
                            <small class='post'>- Designer</small>
                        </div>     -->
                    <!-- </div> -->

                    <!-- <div class='col-md-4"> -->
                    <!-- <div class="second-slide">
                    <h5>lifestyle</h5>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    <div class="second-slide-before">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="img/22.jpg" style="width: 50px; border-radius: 50px;" alt="">
                            </div>
                            <div class="col-md-9">

                                <div class="gailsection">
                                    <h2>Gail Gutierrez</h2>
                                    <p>21/08/2013</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- </div> -->

                    <!-- <div class="col-md-4"> -->
                    <!-- <div class="third-slide">
                    <h5>Travel</h5>
                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                    <div class="third-slide-before">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="img/22.jpg" style="width: 50px; border-radius: 50px;" alt="">
                            </div>
                            <div class="col-md-9">

                                <div class="mansonsection">
                                    <h2>mason johnston</h2>
                                    <p>21/08/2013</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->
                    <!-- </div> -->

                </div>
            </div>
        </section>


        <section>
            <h1 class="main-title  text-center" style="font-size: 36px; margin-bottom:20px;"> Followus on instagram</h1>
            <p class="main-title text-center" style=" margin-bottom:50px;">@Clothhunt</p>
            <div class="card-container w-100 d-flex flex-wrap">
                <?php
                $instaquery = "SELECT * FROM insta";
                $instaproduct = mysqli_query($config, $instaquery);
                $instafirst = true;

                while ($row = mysqli_fetch_array($instaproduct)) {

                    $instaactiveClass = $instafirst ? 'active' : '';
                    $instafirst = false;
                    echo "
                                <div class='ccard $instaactiveClass'>
                                <div class='ccard-content'>
                                    <img src=' ./img/{$row[1]}'>
                                </div>
                                <div class='social-icons'>
                                <a href='https://www.instagram.com/' target='_blank'>   {$row[2]}</a>
                                </div>
                
                            </div>
                            ";
                }


                ?>

                <!-- <div class="ccard">
                <div class="ccard-content">
                    <img src="./img/category-6.jpg" alt="">
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div> -->
            </div>
        </section>


        <!-- Add to cart offcanvas page  -->

        <section>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample">
                <div class="offcanvas-header  mt-5">
                    <h5 class="mx-auto " id="offcanvasExampleLabel d-inline-block">Add To Cart</h5>
                    <button type="button" class="btn-close px-5" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ">
                    <div class="cart d-flex justify-content-around align-items-center ">
                        <img src="./img/sellerfront-1.jpg" style="width:20% ; height:auto;" class=" background-cover" alt="">
                        <h6>titlascsdvsdve</h6>
                        <div class="btn-group d-flex align-items-center">
                            <button class="plus-btn text-black py-2 px-3" style="width: 30px;border-radius:30px; background-color:#54d9e1;color:white;border:none;">+</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <p>1</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="minus-btn  py-2 px-3" style="width: 30px;border-radius:30px; background-color:#54d9e1;color:white;border:none;"><strong>-</strong></button>
                        </div>
                        <p>para</p>
                        <button class="close-btn btn-outline-danger  py-2 px-3  color-danger" style="border-radius: 20px; "><i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Add to cart offcanvas page end  -->

        <?php
        include_once('./footer.php');
        ?>
        <!-- <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script> -->

        <script>
            // $(document).ready(function() {
            //     $("#testimonial-slider").owlCarousel({
            //         items: 2,
            //         itemsDesktop: [1000, 2],
            //         itemsDesktopSmall: [990, 2],
            //         itemsTablet: [768, 1],
            //         pagination: true,
            //         navigation: false,
            //         navigationText: ["", ""],
            //         slideSpeed: 1000,
            //         autoPlay: true
            //     });
            // });


            // // slider

            // document.addEventListener('DOMContentLoaded', function() {
            //     new Splide('#my-slider', {
            //         type: 'loop',
            //         perPage: 3,
            //         perMove: 1,
            //     }).mount();

            //     new Splide('#my-slider', {
            //         type: 'loop',
            //         perPage: 3,
            //         perMove: 1,
            //         autoplay: true,
            //         interval: 3000,
            //         pauseOnHover: true,
            //         arrows: true,
            //         pagination: true,
            //     }).mount();

            // });



            // document.addEventListener('DOMContentLoaded', () => {
            //     const cartItems = document.querySelectorAll('.cart');

            //     cartItems.forEach(cartItem => {
            //         const plusBtn = cartItem.querySelector('.plus-btn');
            //         const minusBtn = cartItem.querySelector('.minus-btn');
            //         const quantityText = cartItem.querySelector('p');

            //         // Event listener for plus button
            //         plusBtn.addEventListener('click', () => {
            //             let quantity = parseInt(quantityText.textContent);
            //             if (quantity < 10) {
            //                 quantity++;
            //                 quantityText.textContent = quantity;
            //             }
            //         });

            //         // Event listener for minus button
            //         minusBtn.addEventListener('click', () => {
            //             let quantity = parseInt(quantityText.textContent);
            //             if (quantity > 1) {
            //                 quantity--;
            //                 quantityText.textContent = quantity;
            //             }
            //         });
            //     });
            // });
        </script>
</body>

</html>