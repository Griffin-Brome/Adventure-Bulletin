<?php
include 'DBConnection.php'; 

try {
    $pdo = openConnection();    
    $sql = "INSERT INTO post (post_title, post_body) 
            VALUES (:post_title, :post_body)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":post_title", $_GET["postTitle"]);
    $statement->bindValue(":post_body", $_GET["post_body"]);
    $statement->execute();
} catch (PDOException $e) {
    die($e->getMessage());
}
closeConnection($pdo);
?>