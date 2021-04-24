<?php
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
        PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
    );
    $dbh = new PDO("mysql:host=localhost;dbname=inwentaryzacjadb", "root", "", $options);
    
?>