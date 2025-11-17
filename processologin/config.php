<?php
$conn = new mysqli('localhost', 'root', 'BRUNAcarol2057', 'scai');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>