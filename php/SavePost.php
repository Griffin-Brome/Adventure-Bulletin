<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", "1");

include 'DBConnection.php'; 
include 'Validate.php';

if (isset($_SESSION['user'])) { // must be logged in to post
    $user = $_SESSION['user'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $title = Validate($_GET['title']);
        $body = Validate($_GET['post']);
        $board = Validate($_GET['board']);
        try {
            $pdo = openConnection();    
            $sql = "INSERT INTO post (post_title, post_body, uname, board) 
            VALUES (:post_title, :post_body, :uname, :board)";
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":post_title", $title);
            $statement->bindValue(":post_body", $body);
            $statement->bindValue(":uname", $user);
            $statement->bindValue(":board", $board);
            $statement->execute();
            closeConnection($pdo);
            header("Location: ../sub-forum.html");
            die();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
?>