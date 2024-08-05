<?php
// session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>view</title>
</head>

<body>


    <div class="container mt-5">
       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Card View Details
                            <a href="index.php" class="btn btn-danger float-end"> BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $user_id = mysqli_real_escape_string($config, $_GET['id']);
                            $query = "SELECT *FROM seller WHERE id='$user_id'";
                            $query_run = mysqli_query($config, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $userInfo = mysqli_fetch_array($query_run);
                        ?>
                                    <div class="mb-3">
                                        <label for="">ImagePath1</label>
                                        <p class="form-control">
                                            <?=$userInfo['studentName'] ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">ImagePath2</label>
                                        <p class="form-control">
                                            <?=$userInfo['email'] ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Title</label>
                                        <p class="form-control">
                                            <?=$userInfo['phone'] ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Rate</label>
                                        <p class="form-control">
                                            <?=$userInfo['course'] ?>
                                        </p>
                                    </div>
                                    
                        <?php


                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>