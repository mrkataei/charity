<?php
define("DB_HOST", "localhost");
define("DB_USERNAME","root");
define("DB_PASSWORD", "");
define("DB_NAME", "db_proj");

function db_conn(){
    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>