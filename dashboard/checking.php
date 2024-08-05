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
    <?php //include('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Create Product <a href="./index.php" class="btn btn-danger float-end">Back</a></h5>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
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