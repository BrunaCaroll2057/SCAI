<?php
<<<<<<< HEAD
    $conn = new mysqli('localhost', 'root', 'BRUNAcarol2057', 'scai');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
=======

$conn = mysqli_connect('localhost','root','','scai') or die('connection failed');

?>
>>>>>>> 00626c3c943773718a7ed094807c732ee36fb5ed
