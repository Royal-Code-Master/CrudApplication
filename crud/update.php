<?php

require_once './connection.php';
$id = $_GET['uid'];
if (isset($_POST['update'])) {
    $item = $_POST['item'];
    $update_item = "UPDATE items SET item_name = '$item' WHERE id = $id";
    if (mysqli_query($con, $update_item)) {
        echo '
            <script>
                alert("item Updated");
            </script>
        ';
    }
}
mysqli_close($con);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="https://logodix.com/logo/2028991.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>

</head>

<style>
    #head1 {
        margin-top: 3rem;
        background-color: rgb(9, 132, 236);
        scroll-behavior: smooth;
    }

    .t1 {
        text-align: center;
        padding: 15px;
        color: white;
        font-weight: 600;
        font-family: 'Courier New', Courier, monospace;
    }

    .nav-link {
        font-weight: 600;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 1px;
    }

    th {
        text-align: center;
    }

    td {
        text-align: center;
    }
</style>



<body>

    <div class="container" id="head1">
        <header>
            <div class="app">
                <h3 class="t1">CRUD Application</h3>
            </div>
        </header>
    </div>

    <div class="container mt-4" id="head2">
        <main>
            <div class="container p-3">
                <form action="" method="post" class="form-control p-3 mt-5" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="item" id="" placeholder="enter item name" class="form-control mt-4" required>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="form-control btn btn-dark mt-4" name="update">update Item</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>





    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>