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
        $sql = "SELECT uname, pword FROM `account` WHERE (`uname` = :uname)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':uname', $uname);
        $statement->execute();

        $rst = $statement->fetch(PDO::FETCH_ASSOC);
        
        if ($statement->rowCount() > 0) {
            if (password_verify($pword, $rst['pword'])) {
                $_SESSION["uname"] = $rst['uname']; 
                header('Location: /Adventure-Bulletin/home.php');
                die();
            }
        } 
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    header('Location: ../login.php');
    exit();

?>