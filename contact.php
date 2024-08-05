<?php
include_once('config.php');
include_once('head.php');
include_once('nav.php');

?>

<section>
    <div class="contact" style="margin-top: 50px;">
        <h3 style="text-align: center; font-weight: 600;">Contact</h3>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8289.824353478083!2d80.19835104419082!3d13.053284589337839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5266c657aa81af%3A0x4bbacd41addf7039!2sSaligramam%2C%20Chennai%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1721916958962!5m2!1sen!2sin" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<h2 class="mt-5 mb-5 text-center">Get In Touch With Us</h2>
<section style="margin-bottom: 50px;">
    <div class="contact-details">
        <div class="container w-50" >
            <div class="row w-100 d-flex flex-column">
                <div class="col-lg-12 w-100 col-md-4 mb-3">
                    <div class="address d-flex align-items-center">
                        <i class="fa-solid fa-location-pin-lock fa-2x me-3"></i>
                        <div class="add">
                            <h4>Address</h4>
                            <p>No:5 KK Nagar,</p>
                            <p>Saligramam,</p>
                            <p>Chennai Pin-600093</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 w-100 col-md-4 mb-3">
                    <div class="address d-flex align-items-center">
                        <i class="fa-solid fa-phone-volume fa-2x me-3"></i>
                        <div class="add">
                            <h4>Phone</h4>
                            <a href="tel:+91 89562 31489" class="text-decoration-none text-dark " style=" font-size: clamp(14px, 1.5vw, 16px); " >+91 89562 31489</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 w-100 col-md-4 mb-3">
                    <div class="address d-flex align-items-center">
                        <i class="fa-solid fa-envelope fa-2x me-3"></i>
                        <div class="add">
                            <h4>Email</h4>
                            <a href="mailto:cloth@hunt007.com" class="text-decoration-none text-dark">cloth@hunt007.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php

        $nameErr = '';
        $emailErr = '';
        $messageErr = '';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            // $sql = "INSERT INTO `contact` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";

            // $result = mysqli_query($con, $sql);
            if (empty($name)) {
                $namecheck = '/^[a-zA-Z\s]+$/';
                $nameErr = "Name is required";
                if (!preg_match($namecheck, $name)) {
                    $nameErr = "Only alphabets and whitespaces are allowed";
                }
            }
            if (empty($email)) {
                $emailErr = "Email is required";
                $mailcheck = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix';
                if (!preg_match($mailcheck, $email)) {
                    $emailErr = "Invalid email address";
                }
            }
            if (empty($message)) {
                $messageErr = "Message is required 200 characters";
            }
            if (!empty($name) && !empty($email) && !empty($message)) {
                $sql = "INSERT INTO `contact` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message')";
                $result = mysqli_query($con, $sql);
                echo "<script>alert('Message sent successfully!');</script>";
            } else {
                echo "<script>alert('There is a problem in sending your message!');</script>";
            }
        }
        ?>
        <!-- form section -->

        <div class="form w-50">

            <form action="" method="POST">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    <span style="color: red;"><?php echo $nameErr; ?></span>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    <span style="color: red;"><?php echo $emailErr; ?></span>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label" required>Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    <span style="color: red;"><?php echo $messageErr; ?></span>
                </div>
                <button type="submit" name="submit" class="btn text-white py-2" style=" background-color:#54d9e1;">Submit</button>
            </form>
        </div>

    </div>


</section>



<?php
include_once('footer.php');

?>