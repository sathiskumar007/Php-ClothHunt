<?php
include_once('/xampp/htdocs/php/cloth-hunt/config.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        background-color: black;
        color: white;
    }

    .nav a {
        color: black;
        background-color: white;
        text-decoration: none;
        cursor: pointer;
        padding: 5px 0px;
        margin-bottom: 10px;
    }

    .nav a:hover {
        background-color: whitesmoke;
        color: black;
    }

    .nav-pills .nav-link.active {
        background-color: none;
    }

    .bestseller h1 {
        font-size: 36px;
        text-align: center;
    }

    .card-content {
        width: 100%;
        height: auto;
        display: flex;
    }

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

    .hover-switch>img:last-of-type {
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

    .nav-link.active {
        color: #e0e0e0 !important;
        /* background-color: #ff7f50 !important; */
    }

    .nav-link {
        color: white !important;
        background-color: #001f3f !important;
    }

    /* sellerend */
</style>

<body>
    <nav class="navbar navbar-light mx-0 mb-2 sticky-top  " style="box-shadow: 0px 0px 15px #e8e7e6;">
        <div class="container-fluid ">
            <a class="navbar-brand fs-3 mx-2" href="#">Cloth-Hunt.. <br>
            </a>

            <div class="input-group mb-3 w-25">
                <input type="text" class="form-control" placeholder="Search here" aria-label="Username" aria-describedby="basic-addon1">
                <span class="input-group-text text-white " id="basic-addon1" style="background-color:#54d9e1;"><i class="fa-solid fa-magnifying-glass"></i></span>

            </div>
            <div id="datetime" class="text-white  p-2 px-4 btn rounded pill " style="cursor:pointer;font-size:16px; margin-right: 50px;background-color:red; "></div>
            <button class="btn text-white rounded-pill " style="background-color: #54d9e1;"><i class="fa fa-sign-out"></i></button>
        </div>
    </nav>
    <!-- style="background-color: #F5F5F5;" -->
    <div class="d-flex align-items-start text-white">
        <!-- <div class="nav">
        </div> -->

        <div class="nav position-fixed flex-column nav-pills me-3 gap-1 " id="v-pills-tab" role="tablist" style=" width: 15%; ; border-right:0.5px solid #bababa; height:100vh; ">

            <a class="nav-link active text-start px-3  text-dark" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" role="tab"><i class="fas fa-chart-line"></i> Dashboard</a>
            <a class="nav-link text-start px-3  text-dark" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" role="tab"><i class="fa-regular fa-paper-plane"></i> Messages</a>
            <a class="nav-link text-start px-3  text-dark" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-product" role="tab"><i class="fa-brands fa-product-hunt"></i> Product List</a>
            <a class="nav-link text-start px-3   text-dark" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" role="tab"><i class="fa-regular fa-eye"></i> Home</a>
        </div>
        <div class="tab-content text-white" id="v-pills-tabContent" style="background-color: black; width:85%;margin-left:15%; ">

            <div class="tab-pane fade  " id="v-pills-profile" role="tabpanel" style="margin-top: 30px;margin-left:0px;">
                <div class="container-fluid d-flex justify-content-center gap-5 mb-5">
                    <div class="card px-5 py-2 " style="width:24%; border-bottom: 3px solid blue;">
                        <p class="fs-6">Users Count</p>
                        <h3><i class="fa-solid fa-arrow-up-long fs-4" style="color: #38f254;"></i> 224 <i class="fa-solid fa-percent fs-4"></i></h3>
                    </div>
                    <div class="card px-5 py-2 " style="width:24%; border-bottom: 3px solid red;">
                        <p class="fs-6">Selling Product</p>
                        <h3><i class="fa-solid fa-arrow-up-long fs-4" style="color:#f01e1a;"></i> 71 <i class="fa-solid fa-percent fs-4"></i></h3>
                    </div>
                    <div class="card px-5 py-2 " style="width:24%; border-bottom: 3px solid yellow;">
                        <p class="fs-6">Company Value</p>
                        <h3><i class="fa-solid fa-arrow-up-long fs-4" style="color: #38f254;"></i> &dollar;22 <i class="fa-solid fa-percent fs-4"></i></h3>
                    </div>
                    <div class="card px-5 py-2 " style="width:24%; border-bottom: 3px solid #2dfc38;">
                        <p class="fs-6">New Users</p>
                        <h3><i class="fa-solid fa-arrow-up-long fs-4" style="color: #38f254;"></i> 88 <span class="fs-5" style="color:#c4c0c0;">hires</span> <i class="fa-solid fa-percent fs-4"></i></h3>
                    </div>
                </div>

                <div class="container-fluid">
                    <h3>Users List</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">updateDateTime</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $usersquery = "SELECT * FROM userslist";
                            $usersproduct = mysqli_query($config, $usersquery);

                            while ($row = mysqli_fetch_array($usersproduct)) {

                                $id = $row['id'];
                                $name = $row['userName'];
                                $email = $row['email'];
                                $update = $row['updatedOn'];

                            ?>
                                <tr>
                                    <th scope="row"><?= $id ?></th>
                                    <td><?= $name ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $update ?></td>
                                </tr>

                            <?php
                            }
                            // }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="container-fluid d-flex justify-content-center gap-5 mb-5 mt-5">
                    <div class="card px-5 py-2 " style="width:24%; border-bottom: 3px solid blue;">
                        <p class="fs-6">Income</p>
                        <h3><i class="fa-solid fa-arrow-up-long fs-4" style="color: #38f254;"></i> &dollar; 5.456 <i class="fa-solid fa-percent fs-5"></i></h3>
                    </div>
                    <div class="card px-5 py-2 " style="width:24%; border-bottom: 3px solid red;">
                        <p class="fs-6">Expenses</p>
                        <h3><i class="fa-solid fa-arrow-up-long fs-4" style="color:#f01e1a;"></i> &dollar; 71 <i class="fa-solid fa-percent fs-5"></i></h3>
                    </div>
                    <div class="card px-5 py-2 " style="width:24%; border-bottom: 3px solid yellow;">
                        <p class="fs-6">Spendings</p>
                        <h3><i class="fa-solid fa-arrow-up-long fs-4" style="color: #38f254;"></i> &dollar;1.5M <i class="fa-solid fa-percent fs-5"></i></h3>
                    </div>
                    <div class="card px-5 py-2 " style="width:24%; border-bottom: 3px solid #2dfc38;">
                        <p class="fs-6">Total</p>
                        <h3><i class="fa-solid fa-arrow-up-long fs-4" style="color: #38f254;"></i>&dollar;31,564 <span class="fs-5" style="color:#c4c0c0;">hires</span> <i class="fa-solid fa-percent fs-5"></i></h3>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <h1>sdhhcbkjhsdbckjh</h1>
            </div>

            <div class="tab-pane fade show active" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
                <h1 style="font-family: roboto;" class="text-center mt-5">Product list</h1>
                <!-- <h1>aaschabjschb</h1> -->
                <div class="sellerflow">
                    <?php
                    $sellerquery = "SELECT * FROM seller WHERE userStatus='active'";
                    $sellerproduct = mysqli_query($config, $sellerquery);
                    $sellerfirst = true; // tcaurosel active or not active itteration

                    while ($row = mysqli_fetch_array($sellerproduct)) {
                        // caurosel working or not condition
                        $selleractiveClass = $sellerfirst ? 'active' : '';
                        $sellerfirst = false; //false after first iteration
                        $userId = $row['id'];
                        // echo $userId;
                        echo "
                        <div class='container-flow mt-5 mb-5' >
                        <a href='#'>
                            <div class='containerr $selleractiveClass'>
                                <div class='hover-switch'>
                                    <img src='../img/{$row[1]}' alt='' />
                                    <img src='../img/{$row[2]}' alt='' />
                                </div>
                            </div>
                        </a>

                        <div class='containerr  mt-4'>
                            <h5 class='fs-4'>{$row[3]}</h5>
                                <div class='price d-flex' >    
                                    <p>&#8377;{$row[4]}</p>&nbsp;&nbsp;
                                    <del>&#8377;{$row[5]}</del>
                                </div>
                            <div class='color flex gap-3'>
                                <button type='button' data-bs-toggle='tooltip' data-bs-placement='left' title='Skyblue' style='width:20px ; height:20px; border:0.1px solid black; background-color:#54d9e1; border-radius:80px;'></button>
                                <button type='button' data-bs-toggle='tooltip' data-bs-placement='bottom' title='White' style='width:20px ; height:20px; border:0.1px solid black; background-color:whitesmoke; border-radius:80px;'></button>
                                <button type='button' data-bs-toggle='tooltip' data-bs-placement='right' title='Yellow' style='width:20px ; height:20px; border:0.1px solid black; background-color:yellow; border-radius:80px;'></button><br>
                               
                               
                               
                                <form action='index.php' method='POST' class='d-flex gap-3 '>
                                    <a class='btn btn-primary  type='button' href='edit.php?id=$userId'>Edit</a>
                                    <input type='hidden' name='hidden-user-id' value='$userId'>
                                    <input type='button'  class='btn btn-danger ' value='Delete '>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                        ";
                    }


                    ?>

                    <?php

                    if (isset($_POST['delete'])) {
                        $hidden_user_id = $_POST['hidden-user-id'];
                        $query = "UPDATE seller set userStatus='inactive' WHERE id='$hidden_user_id' ";
                        $query_run = mysqli_query($config, $query);
                        if ($query_run) {
                            $_SESSION['message'] = 'Card Deleted Sucessfully';
                            header('Location:index.php');
                            exit(0);
                        } else {
                            $_SESSION['message'] = "Card Not Deleted";
                            header("Location:index.php");
                            exit(0);
                        }
                    }
                    ?>
                    <!-- <a class='btn btn-danger px-4 mt-2' name='delete_user' type='button' href='index.php'>Delete</a> -->
                    <!-- <form action='index.php' method='POST'>
                            <input type='submit' name='delete_user'  class='btn- btn-danger' value='Delete'>
                        </form> -->
                </div>

                <div class="new" style="display: flex;justify-content:start; margin-top:50px;margin-left:8%;">
                    <h1></h1>
                    <a class='btn btn-success px-3 mt-2 text-center border-0' style="background-color: #2dfc38;" href="create.php" type='button'>New card create</a>
                </div>

            </div>
            <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <h1>sjkdckjsdnc</h1>
            </div>


            <!-- <div class='container-flow mt-5 mb-5' >
                        <a href='#'>
                            <div class='containerr $selleractiveClass'>
                                <div class='hover-switch'>
                                    <img src='../img/{$row[1]}' alt='' />
                                    <img src='../img/{$row[2]}' alt='' />
                                </div>
                            </div>
                        </a>

                        <div class='containerr  mt-4'>
                            <h5 class='fs-4'>{$row[3]}</h5>
                                <div class='price d-flex' >    
                                    <p>&#8377;{$row[4]}</p>&nbsp;&nbsp;
                                    <del>&#8377;{$row[5]}</del>
                                </div>
                            <div class='color flex gap-3'>
                                <button type='button' data-bs-toggle='tooltip' data-bs-placement='left' title='Skyblue' style='width:20px ; height:20px; border:0.1px solid black; background-color:#54d9e1; border-radius:80px;'></button>
                                <button type='button' data-bs-toggle='tooltip' data-bs-placement='bottom' title='White' style='width:20px ; height:20px; border:0.1px solid black; background-color:whitesmoke; border-radius:80px;'></button>
                                <button type='button' data-bs-toggle='tooltip' data-bs-placement='right' title='Yellow' style='width:20px ; height:20px; border:0.1px solid black; background-color:yellow; border-radius:80px;'></button><br>
                               
                               
                               
                                <form action='index.php' method='POST' class='d-flex gap-3 '>
                                    <a class='btn btn-primary  type='button' href='edit.php?id=$userId'>Edit</a>
                                    <input type='hidden' name='hidden-user-id' value='$userId'>
                                    <input type='button'  class='btn btn-danger ' value='Delete '>
                                </form>
                                
                            </div>
                        </div>
                    </div> -->

        </div>
    </div>

    <script>
        function updateDateTime() {
            let now = new Date();
            let dateTimeString = now.toLocaleString();
            document.getElementById("datetime").textContent = dateTimeString;
        }
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>