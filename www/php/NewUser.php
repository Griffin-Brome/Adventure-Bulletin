<?php
    include 'DBConnection.php';
    try {
        $pdo = openConnection();
        $sql = "INSERT INTO account (uname, email, full_name, birth_date, pword, is_admin)
                VALUES (:uname, :email, :full_name, :birth_date, :pword, :is_admin)";
        $statement = $pdo->prepare($sql);
        
        $statement->bindValue(":uname", $_GET["uname"]);
        $statement->bindValue(":email", $_GET["email"]);
        $statement->bindValue(":full_name", $_GET["full_name"]);
        $statement->bindValue(":birth_date", $_GET["birth_date"]);
        $statement->bindValue(":pword", $_GET["pword"]);
        $statement->bindValue(":is_admin", $_GET["is_admin"]);

        $statement->execute();
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    closeConnection($pdo);
?>