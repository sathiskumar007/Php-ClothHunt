<?php

// session_start();
include_once('/xampp/htdocs/php/cloth-hunt/config.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create Product</title>
</head>

<body>
    <div class="container mt-5">
        <?php //include('message.php'); 
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Product <a href="./index.php" class="btn btn-danger float-end">Back</a></h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="imagePath1">ImagePath1</label>
                                <input type="file" name="imagePath1" accept=".jpg, .png, .web" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="imagePath2">ImagePath2</label>
                                <input type="file" name="imagePath2" accept=".jpg, .png, .web" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="rate">Price</label>
                                <input type="text" name="rate" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="deletedrate">Deleted Price</label>
                                <input type="text" name="deletedrate" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="form-control btn btn-primary">Create Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php


    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $rate = $_POST['rate'];
        $deletedRate = $_POST['deletedrate'];

        // File upload handling for imagePath1
        $imagePath1 = '';
        if (isset($_FILES['imagePath1'])) {
            $file1 = $_FILES['imagePath1'];
            $fileName1 = $file1['name'];
            $fileTmpName1 = $file1['tmp_name'];
            $fileSize1 = $file1['size'];
            $fileError1 = $file1['error'];
            $fileType1 = $file1['type'];

            $fileExt1 = strtolower(pathinfo($fileName1, PATHINFO_EXTENSION));
            $allowedExtensions1 = array('jpg', 'jpeg', 'png');

            if (in_array($fileExt1, $allowedExtensions1)) {
                if ($fileError1 === 0) {
                    $fileNewName1 = uniqid('', true) . "." . $fileExt1;
                    $fileDestination1 = '/xampp/htdocs/php/cloth-hunt/img/' . $fileNewName1;
                    move_uploaded_file($fileTmpName1, $fileDestination1);
                    $imagePath1 = $fileNewName1;
                } else {
                    // $_SESSION['message'] = "Error uploading ImagePath1.";
                    echo "<script>alert('Error uploading ImagePath1.')</script>";
                    header('Location: create.php');
                    exit();
                }
            } else {
                // $_SESSION['message'] = "Invalid file type for ImagePath1. Only JPG, JPEG, PNG files are allowed.";
                echo "<script>alert('Invalid file type for ImagePath1. Only JPG, JPEG, PNG files are allowed.')</script>";
                header('Location: create.php');
                exit();
            }
        }

        // // File upload handling for imagePath2
        $imagePath2 = '';
        if (isset($_FILES['imagePath2'])) {
            $file2 = $_FILES['imagePath2'];
            $fileName2 = $file2['name'];
            $fileTmpName2 = $file2['tmp_name'];
            $fileSize2 = $file2['size'];
            $fileError2 = $file2['error'];
            $fileType2 = $file2['type'];

            $fileExt2 = strtolower(pathinfo($fileName2, PATHINFO_EXTENSION));
            $allowedExtensions2 = array('jpg', 'jpeg', 'png');

            if (in_array($fileExt2, $allowedExtensions2)) {
                if ($fileError2 === 0) {
                    $fileNewName2 = uniqid('', true) . "." . $fileExt2;
                    $fileDestination2 = '/xampp/htdocs/php/cloth-hunt/img/' . $fileNewName2;
                    move_uploaded_file($fileTmpName2, $fileDestination2);
                    $imagePath2 = $fileNewName2;
                } else {
                    // $_SESSION['message'] = "Error uploading ImagePath.";
                    echo "<script>alert('Error uploading ImagePath2.')</script>";
                    header('Location: create.php');
                    exit();
                }
            } else {
                // $_SESSION['message'] = "Invalid file type for ImagePath2. Only JPG, JPEG, PNG files are allowed.";
                echo "<script>alert('Invalid file type for ImagePath2. Only JPG, JPEG, PNG files are allowed.')</script>";
                header('Location: create.php');
                exit();
            }
        }

        // Insert into database
        $query = "INSERT INTO seller (imagePath, imageback, title, deletedRate, rate, userStatus, cartStatus) VALUES ('$imagePath1', '$imagePath2', '$title', '$deletedRate', '$rate', 'active', 'false')";
        // echo "<script>alert('Product created successfully!')</script>";

        if (mysqli_query($config, $query)) {
            echo "<script>alert('Product created successfully!')</script>";
            header('Location: index.php');
        } else {
            echo "<script>alert('Error: " . $query . "<br>" . mysqli_error($config) . "')</script>";
            header('Location: create.php');
        }


        //     if (mysqli_query($config, $query)) {
        //         // $_SESSION['message'] = "Product created successfully!";
        //         echo "<script>alert('Product created successfully!')</script>";
        //         header('Location: index.php');
        //         exit();
        //     } else {
        //         // $_SESSION['message'] = "Error: " . $query . "<br>" . mysqli_error($config);
        //         echo "<script>alert('Error: " . $query . "<br>" . mysqli_error($config) . "')</script>";
        //         header('Location: create.php');
        //         exit();
        //     }
        // } else {
        //     // $_SESSION['message'] = "Form submission failed.";
        //     echo "<script>alert('Form submission failed.')</script>";
        //     header('Location: create.php');
        //     exit();
    }



    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>