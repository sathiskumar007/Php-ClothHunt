<?php
include_once('/xampp/htdocs/php/cloth-hunt/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Product Edit</title>
</head>

<body>
    <div class="container mt-5">
        <?php include('message.php') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Edit
                            <a href="index.php" class="btn btn-danger float-end"> BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $userId = $_GET['id'];
                            $query = "SELECT * FROM seller WHERE id='$userId'";
                            $query_run = mysqli_query($config, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $userInfo = mysqli_fetch_assoc($query_run); // Using assoc for easier access
                        ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $userInfo['id']; ?>">
                                    <div class="mb-3">
                                        <label for="imagePath1" class="form-label">ImagePath1</label>
                                        <input type="file" class="form-control"  id="imagePath1" name="imagePath1" value="<?= $userInfo['imagePath']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagePath2" class="form-label">ImagePath2</label>
                                        <input type="text" class="form-control"  id="imagePath2" name="imagePath2" value="<?= $userInfo['imageback']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control"  id="title" name="title" value="<?= $userInfo['title']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="rate" class="form-label">Deleted Price</label>
                                        <input type="text" class="form-control"  id="deletedRate" name="deletedRate" value="<?= $userInfo['deletedRate']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="rate" class="form-label">Price</label>
                                        <input type="text" class="form-control"  id="rate" name="rate" value="<?= $userInfo['rate']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">Update Product</button>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "<h4>No Product Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>