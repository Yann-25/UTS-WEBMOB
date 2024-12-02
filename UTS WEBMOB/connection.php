<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "db_karyawan";

    $conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $database);

    if (!$conn) {
        echo "Connection Failed";
    }
?>