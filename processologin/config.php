<?php
<<<<<<< HEAD
    $conn = new mysqli('localhost', 'root', '', 'scai');
$conn = new mysqli('localhost', 'root', '', 'scai');
=======
$conn = new mysqli('localhost', 'root', 'BRUNAcarol2057', 'scai');
>>>>>>> e04a7c98e4cbdba44d6ad3f72345c88cb8ebec24
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>