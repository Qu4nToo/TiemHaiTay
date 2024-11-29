<?php
function getDatabaseConnection() {
    $host = 'localhost';
    $dbname = 'tiemhaitay';
    $username = 'root';
    $password = '';
    
    $conn = new mysqli($host, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    
    return $conn;
}
?>


