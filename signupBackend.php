<?php
    include 'connection.php';
    $name = $_POST['name'];
    $uname = $_POST['username'];
    $pword = $_POST['pword'];

    $stmtSelect = $pdo->prepare("SELECT * FROM users WHERE user_name = :user_name");
    $stmtSelect ->bindValue(':user_name',$uname,PDO::PARAM_STR);
    $stmtSelect ->execute();

    $user = $stmtSelect->fetchAll();
    if(count($user)>0){
        echo 'User name alredy exist!';
        return false;
    }

    $stmtInsert = $pdo->query("INSERT INTO users(user_name,password,name) VALUES (:user_name,:password,:name)");
    $stmtInsert ->bindValue(':user_name',$uname,PDO::PARAM_STR);
    $stmtInsert ->bindValue(':password',$pword,PDO::PARAM_STR);
    $stmtInsert ->bindValue(':name',$name,PDO::PARAM_STR);
    $stmtInsert ->execute();
    
    echo 'Success';
?>