<?php
// connection to database
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = mysqli_connect($server, $username, $password, $db);

// check connection
if (!$conn) {
    echo "connection error: " . mysqli_connect_errno();
}
