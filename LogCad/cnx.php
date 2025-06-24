<?php

    const DB_HOST = "127.0.0.1";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "scai";

    $cnx = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$cnx) printf("Erro ao se conectar ao banco de dados! Erro número %d", mysqli_connect_errno());

?>