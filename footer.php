<section class="foot p-2">
    <div class="footer">
        <div class="left">
            <div class="company">
                <a href="" class="cloth text-decoration-none text-dark fs-2 fw-bolder">Cloth Hunt.</a><br><br>
                <p>Contact our customer happiness team <br>
                    Monday-Friday 9am-5pm</p>
                <a href="tel:+91 89562 31489" class="tel anger fw-bold text-decoration-none text-dark" style=" font-size: 16px; ">+91 89562 31489</a>
                <br><br>
                <div class="social gap-2">
                    <div class="fb">
                        <a href="https://www.facebook.com/" target="_blank"> <i class="fa-brands fa-facebook-f fs-2"></i></a>
                    </div>
                    <div class="insta">
                        <a href="https://www.instagram.com/" target="_blank"> <i class="fa-brands fa-instagram fs-2"></i></a>
                    </div>
                    <div class="twitt">
                        <a href="https://www.twitter.com/" target="_blank"><i class="fa-brands fa-twitter fs-2"></i></a>
                    </div>
                    <div class="tik-tok">
                        <a href="https://www.tiktok.com/" target="_blank"><i class="fa-brands fa-tiktok fs-2"></i></a>
                    </div>
                </div>

            </div>
            <div class="shop">
                <h5 style="font-weight: regular; font-size:20px;">Shop</h5><br>
                <a href='./shop.php' class=" text-dark text-decoration-none">Shop brands</a><br><br>
                <a href='#seller' class="text-dark text-decoration-none">On sale</a>
            </div>
        </div>
        <div class="right">
            <div class="customer">
                <h5 style="font-weight: regular; font-size:20px;">Company</h5><br>
                <a href='./contact.php' class="text-dark text-decoration-none">Location</a><br><br>
            </div>
            <div class="staytouch ">
                <h5 style="font-weight: regular; font-size:20px;">Stay in touch....</h5><br>
                <p>Subscribe and be the first to know about exclusive <br> offers, products, promotions & more</p>
                <form action="" method="POST" class="d-flex">
                    <input type="email" class="subscribe form-control" style="width: 180px;" name="email" placeholder="   Enter your email...">
                    <button class="btn text-white py-2 text-center form-control" style=" width:100px;background-color:#54d9e1;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="copy-rights p-2">
        <p class="text-center " style="color: black;">&copy; 2024 <a href="./index.php" style="color:black; font-weight: bold; text-decoration: none;"> Cloth Hunt</a> . All rights reserved.</p>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="./js/main.js"></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="./js/zoom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- jQuery (required for XZoom) -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

<!-- XZoom JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xzoom/0.2.4/xzoom.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

<script>
    AOS.init();
    $(document).ready(function() {
        $(".xzoom, .xzoom-gallery").xzoom({
            zoomWidth: 450,
            tint: "#333",
            Xoffset: 15
        });
    });

    // caurosel
    $(document).ready(function() {
        $("#testimonial-slider").owlCarousel({
            items: 2,
            itemsDesktop: [1000, 2],
            itemsDesktopSmall: [990, 2],
            itemsTablet: [768, 1],
            pagination: true,
            navigation: false,
            navigationText: ["", ""],
            slideSpeed: 1000,
            autoPlay: true
        });
    });



    $(document).ready(function() {
        $('.image-zoom')
            .wrap('<span style="display:inline-block"></span>')
            .css('display', 'block')
            .parent()
            .zoom({
                url: $(this).find('img').attr('data-zoom')
            });
    });

    // slider

    document.addEventListener('DOMContentLoaded', function() {
        new Splide('#my-slider', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
        }).mount();

        new Splide('#my-slider', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
            autoplay: true,
            interval: 3000,
            pauseOnHover: true,
            arrows: true,
            pagination: true,
        }).mount();

    });

</script>