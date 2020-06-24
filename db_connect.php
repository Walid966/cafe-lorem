<?php
// connection to database
$conn = mysqli_connect("localhost", "root", "", "menu__form");

// check connection
if (!$conn) {
    echo "connection error: " . mysqli_connect_errno();
}
