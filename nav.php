<?php
// Start the session at the beginning
session_start();

// Include configuration file for database connection
include_once('./config.php');
$isLoggedIn = isset($_SESSION['user_id']);

if (isset($_SESSION['user_id'])) {
    // Access session variables
    $userId = $_SESSION['user_id'];
    // echo $userId;
}
//  else {
//     // Handle the case when session variable is not set
//     $userId = null; // or any default value
//     echo "<script>window.location.href = 'signin.php';</script>";
// }
// Handle logout request
if (isset($_POST['logout'])) {
    echo "<script>alert('Logout successful!');</script>";
    session_destroy();
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $userId = $_SESSION['user_id'];
    //update
    // if (isset($_POST['update'])) {
    //     $productId = $_POST['update_id'];
    //     $productQty = $_POST['product_qty'];
    //     $productPrice = $_POST['product_price'];

    //     // Update the cart in the database
    //     $update_query = "UPDATE CartDetails SET qty='$productQty', price='$productPrice' WHERE id='$productId' AND userId='$userId'";

    //     if (mysqli_query($config, $update_query)) {
    //         echo "<script>alert('Cart updated successfully.');</script>";
    //         echo "<script>window.location.href = 'index.php';</script>";
    //     } else {
    //         echo "Error updating cart: " . mysqli_error($config);
    //     }
    // }

    // if (isset($_POST['update'])) {
    //     echo "<pre>";
    //     print_r($_POST);
    //     echo "</pre>";
    // }
    if (isset($_POST['update'])) {
        $productId = intval($_POST['update_id']);
        $productQty = intval($_POST['product_qty']);
        $productPrice = floatval($_POST['product_price']);
        $userId = intval($userId); // Ensure $userId is properly set

        // Debugging output
        echo "<p>Product ID: $productId</p>";
        echo "<p>Quantity: $productQty</p>";
        echo "<p>Price: $productPrice</p>";

        // Prepare the SQL statement
        $stmt = $config->prepare("UPDATE CartDetails SET qty=?, price=? WHERE id=? AND userId=?");
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($config->error));
        }

        // Bind parameters
        $stmt->bind_param('idii', $productQty, $productPrice, $productId, $userId);

        // Execute and check
        if ($stmt->execute()) {
            echo "<script>alert('Cart updated successfully.');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "Error updating cart: " . htmlspecialchars($stmt->error);
        }

        // Close statement
        $stmt->close();
    }


    //remove

    if (isset($_POST['remove'])) {
        $productId = intval($_POST['product_id']);

        // Remove the product from the cart
        $remove_query = "DELETE FROM CartDetails WHERE id='$productId' AND userId='$userId'";

        if (mysqli_query($config, $remove_query)) {
            echo "<script>alert('Product removed from cart.');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "Error removing product: " . mysqli_error($config);
        }
    }
}

?>

<style>
    .nav ul li a.active {
        color: #54d9e1;
        font-weight: bold;
    }
</style>



<section>
    <div class="nav">
        <label for="check-btn" id="ham-icon"><i class="fa-solid fa-bars"></i></label>
        <input type="checkbox" id="check-btn">
        <div class="logo">
            <a href="" style="font-size: clamp(16px,3vw,32px);">Cloth Hunt</a>
        </div>
        <ul>
            <?php
            // Fetch navigation items from database
            $current_page = basename($_SERVER['PHP_SELF']);
            $query = "SELECT * FROM `navigation` ORDER BY `position`";
            $result = mysqli_query($config, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $is_active = ($current_page == basename($row['url'])) ? 'active' : '';
                    echo "<li><a href='" . $row['url'] . "' class='" . $is_active . " '>" . $row['nav-items'] . "</a></li>";
                }
            } else {
                echo "<li>No navigation items found</li>";
            }
            ?>
            <style>
                @media screen and (max-width:768px) {
                    .mark {
                        padding-left: 20px;
                        margin: 0px !important;
                    }
                }
            </style>

            <?php if (isset($_SESSION['user_id'])) : ?>
                <li style="margin: 0px!important;">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="mark  margin:0px!important ">
                        <input type="submit" id="logout_button" class="btn" name="logout" style="border-radius: 20px; margin:0px; background-color: #54d9e1;border: none;color: white;" value="Log Out">
                        <label for="logout_button" class="text-center " style="cursor: pointer; line-height: 70px;">Logout</label>
                    </form>
                </li>

            <?php else : ?>
                <li><a href="./signin.php" class="text-center">Login</a></li>
            <?php endif; ?>


        </ul>
        <div class="icons gap-0 d-flex align-items-center px-2">
            <a href="" class="text-dark pb-3"><i class="fa-solid fa-magnifying-glass"></i></a>
            <a class="mb-3" style="color: black;" data-bs-toggle="offcanvas" href="#statcBackdrop" aria-controls="offcanvasExample">
                <i class="fa-solid fa-cart-shopping"> <span class="position-absolute top-25 start-10 translate-middle badge rounded-pill" style="background-color:#54d9e1;">2</span></i>
            </a>
        </div>
    </div>
</section>

<div class="offcanvas offcanvas-start d-flex gap-5 px-5 justify-content-between align-items-center" style='width:700px!important;' data-bs-backdrop="static" tabindex="-1" id="statcBackdrop" aria-labelledby="offcanvasExample">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="statcBackdrop">Add To Cart</h5>
        <button type="button" class="btn-close d-flex" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];

            // Query to get cart items for the logged-in user
            $cartquery = "SELECT * FROM cartdetails WHERE userId=$userId";
            $cartproduct = mysqli_query($config, $cartquery);

            if (mysqli_num_rows($cartproduct) > 0) {
        ?>
                <table class="table w-100 border-0 border-2 bg-danger">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($cartproduct)) {
                            $productId = $row['id'];
                            $productImage = $row['imagePath'];
                            $productTitle = $row['title'];
                            $productPrice = $row['price'];
                            $productQty = $row['qty'];
                        ?>
                            <tr>
                                <th scope='row'>
                                    <img src='./img/<?php echo $productImage; ?>' width='100px' height='100px' alt=''>
                                </th>
                                <td>
                                    <h6><?php echo $productTitle; ?></h6>
                                </td>
                                <td>
                                    <p id='price-<?php echo $productId; ?>' class='price-per-item mb-0 px-4'>₹<?php echo $productPrice; ?></p>
                                </td>
                                <td class='mt-5'>
                                    <div class='btn-group d-flex align-items-center justify-content-center quantity'>
                                        <button type='button' class='btn btn-danger increment-btn' data-product-id='<?php echo $productId; ?>' data-price='<?php echo $productPrice; ?>'>+</button>
                                        <input type='number' id='input-qty-<?php echo $productId; ?>' style='width: 40px!important;' class='text-center border-0 bg-white input-qty' value='<?php echo $productQty; ?>' disabled>
                                        <button type='button' class='btn btn-danger decrement-btn' data-product-id='<?php echo $productId; ?>' data-price='<?php echo $productPrice; ?>'>-</button>
                                    </div>
                                </td>
                                <td>
                                    <form action="" method="POST" class="d-inline">
                                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                                        <button type="submit" name="remove" class="btn btn-primary">Remove</button>
                                    </form>
                                    <form action="" method="POST" class="d-inline">
                                        <input type="hidden" name="update_id" value="<?php echo $productId; ?>">
                                        <input type="hidden" name="product_qty" id="hidden-qty<?php echo $productId; ?>" value="<?php echo $productQty; ?>">
                                        <input type="hidden" name="product_price" id="hidden-price<?php echo $productId; ?>" value="<?php echo $productPrice; ?>">
                                        <button type="submit" name="update" class="btn btn-danger">Update</button>
                                    </form>


                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
        <?php
            } else {
                echo "Add the products to your cart.";
            }
        } else {
            echo "Please log in to view your cart.";
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     // Function to update the price based on quantity
    //     function updatePrice(productId, price) {
    //         const qty = document.getElementById(`input-qty-${productId}`).value;
    //         const totalPriceElement = document.getElementById(`price-${productId}`);
    //         const totalPrice = qty * price;
    //         totalPriceElement.textContent = `₹${totalPrice.toFixed(2)}`;
    //     }

    //     // Function to update hidden inputs when quantity changes
    //     function updateHiddenInputs(productId, qty, price) {
    //         document.getElementById(`hidden-qty${productId}`).value = qty;
    //         document.getElementById(`hidden-price${productId}`).value = price;
    //     }

    //     // Increment button click event
    //     document.querySelectorAll('.increment-btn').forEach(button => {
    //         button.addEventListener('click', function() {
    //             const productId = this.getAttribute('data-product-id');
    //             const price = parseFloat(this.getAttribute('data-price'));
    //             const qtyInput = document.getElementById(`input-qty-${productId}`);
    //             let qty = parseInt(qtyInput.value);

    //             if (qty < 10) { // Maximum limit
    //                 qty += 1;
    //                 qtyInput.value = qty;
    //                 updatePrice(productId, price);
    //                 updateHiddenInputs(productId, qty, price);
    //             }
    //         });
    //     });

    //     // Decrement button click event
    //     document.querySelectorAll('.decrement-btn').forEach(button => {
    //         button.addEventListener('click', function() {
    //             const productId = this.getAttribute('data-product-id');
    //             const price = parseFloat(this.getAttribute('data-price'));
    //             const qtyInput = document.getElementById(`input-qty-${productId}`);
    //             let qty = parseInt(qtyInput.value);

    //             if (qty > 1) { // Minimum limit
    //                 qty -= 1;
    //                 qtyInput.value = qty;
    //                 updatePrice(productId, price);
    //                 updateHiddenInputs(productId, qty, price);
    //             }
    //         });
    //     });

    //     // Log hidden values on form submission for debugging
    //     document.querySelectorAll('form').forEach(form => {
    //         form.addEventListener('submit', function() {
    //             const productId = this.querySelector('input[name="update_id"]').value;
    //             console.log('Hidden Qty:', document.getElementById(`hidden-qty${productId}`).value);
    //             console.log('Hidden Price:', document.getElementById(`hidden-price${productId}`).value);
    //         });
    //     });
    // });
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update the price based on quantity
        function updatePrice(productId, price) {
            const qty = document.getElementById(`input-qty-${productId}`).value;
            const totalPriceElement = document.getElementById(`price-${productId}`);
            const totalPrice = qty * price;
            totalPriceElement.textContent = `₹${totalPrice.toFixed(2)}`;
        }

        // Function to update hidden inputs when quantity changes
        function updateHiddenInputs(productId, qty, price) {
            document.getElementById(`hidden-qty${productId}`).value = qty;
            document.getElementById(`hidden-price${productId}`).value = price;
        }

        // Increment button click event
        document.querySelectorAll('.increment-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const price = parseFloat(this.getAttribute('data-price'));
                const qtyInput = document.getElementById(`input-qty-${productId}`);
                let qty = parseInt(qtyInput.value);

                if (qty < 10) { // Maximum limit
                    qty += 1;
                    qtyInput.value = qty;
                    updatePrice(productId, price);
                    updateHiddenInputs(productId, qty, price);
                }
            });
        });

        // Decrement button click event
        document.querySelectorAll('.decrement-btn').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const price = parseFloat(this.getAttribute('data-price'));
                const qtyInput = document.getElementById(`input-qty-${productId}`);
                let qty = parseInt(qtyInput.value);

                if (qty > 1) { // Minimum limit
                    qty -= 1;
                    qtyInput.value = qty;
                    updatePrice(productId, price);
                    updateHiddenInputs(productId, qty, price);
                }
            });
        });

        // Log hidden values on form submission for debugging
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                const productId = this.querySelector('input[name="update_id"]').value;
                console.log('Hidden Qty:', document.getElementById(`hidden-qty${productId}`).value);
                console.log('Hidden Price:', document.getElementById(`hidden-price${productId}`).value);
            });
        });
    });
</script>