<?php

    $dsn = "mysql:host=localhost;port=3306;dbname=maya;charset=utf8";

    try{
        $pdo = new PDO($dsn,'root','khalid0000');

    }catch(PDOException $e){
        echo $e->getMessage();
    }
