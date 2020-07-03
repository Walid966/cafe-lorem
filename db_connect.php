<?php
// connection to database
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);

$conn = mysqli_connect("eu-cdbr-west-03.cleardb.net", "b1bebdf9e0f352", "9fc88926", "heroku_a5f9b39930c0939");

// check connection
if (!$conn) {
    echo "connection error: " . mysqli_connect_errno();
}
