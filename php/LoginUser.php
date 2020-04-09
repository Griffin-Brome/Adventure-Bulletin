<?php
    session_start();
    include 'DBConnection.php';
    include 'Validate.php';

    // validate user input server-side
   $uname = Validate($_POST['username']);
   $pword = Validate($_POST['password']);

    try {
        // check if user exists in DB
        $pdo = openConnection();
        $sql = "SELECT uname FROM `account` WHERE `uname` = :uname AND `pword` = :pword";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':uname', $uname);
        $statement->bindValue(':pword', $pword);
        $statement->execute();


        if ($statement->rowCount() > 0) {
            $_SESSION["uname"] = $uname; 
        } else {
            header('Location: /login.php');
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    header('Location: ../home.php');
?>