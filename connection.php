<?php
    $pdo= new PDO('mysql:host=localhost;dbname=bingogame;charset=utf8','root','');

    try {
        if($pdo){
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ERRMODE_EXCEPTION);
            // $connect ='success';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>