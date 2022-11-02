<?php
    //* Connect database
    function connect_db(){
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=pottery_ware", $username, $password);
            $conn->exec("set names utf8mb4");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>