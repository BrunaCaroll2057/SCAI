<?php
<<<<<<< HEAD
    $conn = new mysqli('localhost', 'root', '', 'scai');
=======
$conn = new mysqli('localhost', 'root', 'BRUNAcarol2057', 'scai');
>>>>>>> a592f4cb77f4f860f0240f0fff0b5c37027c2273
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>