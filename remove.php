<?php

include("db_connect.php");

// delete from menu
if (isset($_POST["breakDlt"])) {
    $id_b = $_POST['id'];

    echo $id_b;

    $deleteB = mysqli_query($conn, "DELETE FROM breakfast WHERE id={$id_b}");

    if ($deleteB or $deleteL or $deleteD) {
        header('location: admin.php#grey-menu');
    }
}
