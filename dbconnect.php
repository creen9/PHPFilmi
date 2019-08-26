<?php
    $rooturl = "http://localhost:8080/mysqliOO/";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "filmi";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }