<?php
    session_start();
    include 'DBConnection.php';
    include 'Validate.php';

    // validate user input server-side
    $uname = Validate($_POST['uname']);
    $pword = Validate($_POST['pword']);

    try {
        // check if user exists in DB
        $pdo = openConnection();
        $sql = 'SELECT uname FROM account WHERE uname = :uname AND pword = :pword';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':uname', $uname);
        $statement->bindValue(':pword', $pword);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $_SESSION["uname"] = $result[0]; 
        } else {
            header('Location: /login.php');
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    header('Location: ../profile.php');
?>