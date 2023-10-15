<?php
    include 'connection.php';
    $uname = $_POST['username'];
    $pword = $_POST['pword'];

    // echo $connect;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_name = :user_name AND password=:password");
    $stmt ->bindValue(':user_name',$uname,PDO::PARAM_STR);
    $stmt ->bindValue(':password',$pword,PDO::PARAM_STR);
    $stmt ->execute();

    $user = $stmt->fetchAll();
    // print_r($user);
    if(count($user)>0){
        session_start();
        $_SESSION['uname'] = $user[0]['user_name'];
        $_SESSION['name'] = $user[0]['name'];

    }
    echo json_encode($user);
    
?>