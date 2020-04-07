<?php
error_reporting(E_ALL);
ini_set("display_errors", "1");

include 'DBConnection.php'; 
include 'Validate.php';

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $pdo = openConnection();    
            $sql = "INSERT INTO post (post_title, post_body, uname, board) 
            VALUES (:post_title, :post_body, :uname, :board)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":post_title", $_GET["title"]);
            $statement->bindValue(":post_body", $_GET["post"]);
            $statement->bindValue(":post_body", $_GET["board"]);
            $statement->bindValue(":uname", $user);
            $statement->execute();
            closeConnection($pdo);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>