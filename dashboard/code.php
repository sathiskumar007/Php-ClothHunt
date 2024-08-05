<?php

session_start();

include_once('/xampp/htdocs/php/cloth-hunt/config.php');



// if (isset($_POST['delete'])) {
//     $userid = mysqli_real_escape_string($config, $_POST['delete']);
//     // echo '<script>alert("$userid")</script>';

//     $query = "UPDATE seller set userStatus='$userStatus' WHERE id='$hidden_user_id'";
//     // $query = "DELETE FROM `seller` WHERE id='$userid' ";
//     $query_run = mysqli_query($config, $query);
//     if ($query_run) {
//         $_SESSION['message'] = 'Card Deleted Sucessfully';
//         header('Location:index.php');
//         exit(0);
//     } else {
//         $_SESSION['message'] = "Card Not Deleted";
//         header("Location:index.php");
//         exit(0);
//     }
// }

// if (isset($_POST['delete'])) {
//     include 'config.php'; // Include your database configuration file
//     $userid = mysqli_real_escape_string($config, $_POST['delete']);

//     // Debugging output to check $userid
//     echo '<script>alert("' . $userid . '")</script>';

//     // SQL query to delete record
//     $query = "DELETE FROM `seller` WHERE id='$userid'";

//     // Execute the query
//     $query_run = mysqli_query($config, $query);

//     // Check if the query executed successfully
//     if ($query_run) {
//         $_SESSION['message'] = 'Card Deleted Successfully';
//         header('Location: index.php');
//         exit(); // Exit after redirect
//     } else {
//         $_SESSION['message'] = 'Card Not Deleted: ' . mysqli_error($config); // Error message including MySQL error
//         header('Location: index.php');
//         exit(); // Exit after redirect
//     }
// }

if (isset($_POST['delete'])) {
    // echo '<script>alert("'.$_POST['id'].'") </script>';
    $userId = mysqli_real_escape_string($config, $_POST['hidden-user-id']);

    // Prepare and execute the DELETE query
    // $query = "DELETE FROM seller WHERE id = $userid";
    $query= "update seller set userStatus='inactive' WHERE id=$userId;";

    $stmt = mysqli_prepare($config, $query);
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $_SESSION['message'] = 'Product Deleted Successfully';
    } else {
        $_SESSION['message'] = 'Product Not Deleted';
    }

    header('Location: index.php');
    exit();
}

// Update product

if (isset($_POST['update_user'])) {
    $userId = mysqli_real_escape_string($config, $_POST['id']);
    $imagePath1 = mysqli_real_escape_string($config, $_POST['imagePath1']);
    $imagePath2 = mysqli_real_escape_string($config, $_POST['imagePath2']);
    $title = mysqli_real_escape_string($config, $_POST['title']);
    $rate = mysqli_real_escape_string($config, $_POST['rate']);
    $dRate = mysqli_real_escape_string($config, $_POST['deletedRate']);

    // Prepare and execute the UPDATE query

    $query = "UPDATE seller SET imagePath='$imagePath1', imageback='$imagePath2', title='$title', deletedRate='$dRate',rate='$rate' WHERE id='$userId'";

    if (mysqli_query($config, $query)) {
        $_SESSION['success'] = "Product updated successfully";
        header('Location: index.php'); // Redirect to index page or success page
        exit;
    } else {
        $_SESSION['status'] = "Failed to update product: " . mysqli_error($config);
        header('Location: edit.php?id=' . $userId); // Redirect back to edit page with error message
        exit;
    }
} else {
    $_SESSION['status'] = "Update action not triggered";
    header('Location: edit.php?id=' . $userId); // Redirect back to edit page with error message
    exit;
}



if (isset($_POST['save_card'])) {
    $imgfront = mysqli_real_escape_string($config, $_POST['imagePath1']);
    $imgback = mysqli_real_escape_string($config, $_POST['imagePath1']);
    $title = mysqli_real_escape_string($config, $_POST['title']);
    $price = mysqli_real_escape_string($config, $_POST['rate']);

    $cardStatus = "active";

    // $stuStatus = "active";

    // $query = "INSERT INTO seller (userName,imagePath,imageback,title,rate) VALUES('$imgfront','$imgback','$title','$price')";
    $query = "INSERT INTO `seller` (`imagePath`,`imageback`,`title`,`rate`,`userStatus`)VALUES('$imgfront','$imgback','$title','$price','$cardStatus');";

    $query_run = mysqli_query($config, $query);

    if ($query_run) {
        $_SESSION['message'] = "Card Created Sucessfully";
        header('Location:index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "card Not Created";
        header('Location:create.php');
    }
}
