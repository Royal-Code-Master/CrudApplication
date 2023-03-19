<?php

require_once './connection.php';

if (isset($_POST['submit'])) {
    $item = $_POST['item'];
    $insert_item = "INSERT INTO items (item_name) VALUES ('$item')";
    if (mysqli_query($con, $insert_item)) {
        echo '
            <script>
                alert("item Added");
            </script>
        ';
    }
}

// select items from table.

$select_query = "SELECT * FROM items";
$result = mysqli_query($con, $select_query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$num = mysqli_num_rows($result);

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
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Create</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Read</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages" type="button" role="tab" aria-controls="messages" aria-selected="false">Update</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="delete-tab" data-bs-toggle="tab" data-bs-target="#delete" type="button" role="tab" aria-controls="delete" aria-selected="false">Delete</button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="container p-3">
                        <form action="" method="post" class="form-control p-3 mt-5" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="item" id="" placeholder="enter item name" class="form-control mt-4" required>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="form-control btn btn-dark mt-4" name="submit">Add Item</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="container p-3">
                        <div class="data p-3 mt-5">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Item Name</th>
                                        <th>Date of joined</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sn = 0;
                                        if ($num > 0) {
                                            foreach ($result as $data) {
                                                $sn = $sn + 1;
                                        ?>
                                                <tr>
                                                    <td><?php echo $sn ?></td>
                                                    <td><?php echo $data['item_name'] ?></td>
                                                    <td><?php echo $data['joined'] ?></td>
                                                </tr>

                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr id="not">
                                                <td colspan="3">
                                                    <center>
                                                        Alert msessage : No data is available right now.
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                    <div class="container p-3">
                        <div class="data1 p-3 mt-5">
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Item Name</th>
                                        <th>Action</th>
                                        <th>Date of joined</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sn = 0;
                                        if ($num > 0) {
                                            foreach ($result as $data) {
                                                $sn = $sn + 1;
                                        ?>
                                                <tr>
                                                    <td><?php echo $sn ?></td>
                                                    <td><?php echo $data['item_name'] ?></td>
                                                    <td>
                                                        <a href="./update.php?uid=<?php echo $data['id']; ?>"><i class="fa fa-pencil" style="color: navy;"> update</i></a>
                                                    </td>
                                                    <td><?php echo $data['joined'] ?></td>
                                                </tr>

                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr id="not">
                                                <td colspan="4">
                                                    <center>
                                                        Alert msessage : No data is available right now.
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="delete" role="tabpanel" aria-labelledby="delete-tab">
                    <div class="container p-3">
                        <div class="data2 p-3 mt-5">
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <thead>
                                        <th>S.N</th>
                                        <th>Item Name</th>
                                        <th>Action</th>
                                        <th>Date of joined</th>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sn = 0;
                                        if ($num > 0) {
                                            foreach ($result as $data) {
                                                $sn = $sn + 1;
                                        ?>
                                                <tr>
                                                    <td><?php echo $sn ?></td>
                                                    <td><?php echo $data['item_name'] ?></td>
                                                    <td>
                                                        <a href="./delete.php?did=<?php echo $data['id']; ?>"><i class="fa fa-trash" style="color: orangered;"> delete</i></a>
                                                    </td>
                                                    <td><?php echo $data['joined'] ?></td>
                                                </tr>

                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <tr id="not">
                                                <td colspan="4">
                                                    <center>
                                                        Alert msessage : No data is available right now.
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>





    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>