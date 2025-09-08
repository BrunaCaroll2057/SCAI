<?php
    $conn = new mysqli('localhost', 'root', '', 'scai');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
