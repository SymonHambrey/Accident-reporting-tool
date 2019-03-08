<?php

/* Copyright 2018, Symon Hambrey, All rights reserved */

    try{
        $server="localhost";
        $user="root";
        $pass="50yl3ntgr33n";
        $db="report";
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$server;dbname=$db;charset=$charset";
        $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES => true ];
        $pdo = new PDO($dsn, $user, $pass, $opt);
    }

    catch(Exception $error){
        echo 'Error : '.$error->getMessage();
    }

?>
