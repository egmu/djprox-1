<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'db_djprox';

    $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal Terhunung Ke-DataBase');

?>