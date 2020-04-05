<?php
    include 'DBConnection.php';
    session_start();
    // validate user input server-side
    
    
    
    
    
    
    
    
    
    try {
        // check if user exists in DB
        $pdo = openConnection();
        $sql = 'SELECT uname FROM account WHERE uname = :uname AND pword = :pword';
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':uname', $_GET["uname"]);
        $statement->bindValue(':pword', $_GET["pword"]);
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