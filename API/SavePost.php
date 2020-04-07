<?php
include 'DBConnection.php'; 
include 'Validate.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $pdo = openConnection();    
            $sql = "INSERT INTO post (post_title, post_body) 
            VALUES (:post_title, :post_body)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":post_title", $_GET["postTitle"]);
            $statement->bindValue(":post_body", $_GET["post_body"]);
            $statement->execute();
            closeConnection($pdo);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>