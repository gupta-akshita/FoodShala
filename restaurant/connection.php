<?php
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "food");
    
    $con = mysqli_connect("localhost", "root", "", "food") or die("Connection was not established");
?>