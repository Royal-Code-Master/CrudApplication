<?php

require_once './connection.php';
$id = $_GET['did'];

$delete_item = "DELETE  FROM items  WHERE id = $id";
if (mysqli_query($con, $delete_item)) {
    echo '
            <script>
                alert("item deleted");
            </script>
        ';

    header("location:./index.php?message=<?php echo 'Deleted' >");
}
mysqli_close($con);
