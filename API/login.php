<?php
    include 'DBConnection.php';
    include 'Validate.php';

    session_start();
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
        $result = $statement->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    // if yes, write to session cookie
    if (! is_null($result)){
        $_SESSION['user'] = $_GET['uname'];
    } else {
        // return error message

    } 
        // redirect to homepage
?>