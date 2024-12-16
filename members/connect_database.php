<?php

    $dsn    = 'mysql:host=localhost;dbname=on_road';
    $user   = 'root';
    $pass   = '';
    $option = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => ('SET NAMES utf8')
    );
    try {
        $from_data = new PDO($dsn, $user, $pass, $option);
        $from_data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection to Database Failed : " . $e->getMessage();
    }