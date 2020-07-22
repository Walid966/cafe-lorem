<?php
// connection to database
// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);

// b1bebdf9e0f352
// 9fc88926
// eu-cdbr-west-03.cleardb.net
// heroku_a5f9b39930c0939

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

// $conn = new mysqli($server, $username, $password, $db);

$conn = mysqli_connect($server, $username, $password, $db);
// $conn = mysqli_connect("localhost", "root", "", "menu__form");

// check connection
if (!$conn) {
    echo "connection error: " . mysqli_connect_errno();
}
