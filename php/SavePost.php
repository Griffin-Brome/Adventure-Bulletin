<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", "1");

include 'DBConnection.php'; 
include 'Validate.php';

if (isset($_SESSION['uname'])) { // must be logged in to post
    $user = $_SESSION['uname'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $title = Validate($_POST['title']);
        $body = Validate($_POST['post']);
        $board = Validate($_POST['category']);
        try {
            $pdo = openConnection();    
            
            $sql = "INSERT INTO post (post_title, post_body, uname, board_title, post_time) 
            VALUES (:post_title, :post_body, :uname, :board, :post_time)";
            
            //'YYYY-MM-DD hh:mm:ss' 
            $datetime = date("Y-m-d H:i:s");

            $statement = $pdo->prepare($sql);
            $statement->bindParam(":post_title", $title);
            $statement->bindParam(":post_body", $body);
            $statement->bindParam(":uname", $user);
            $statement->bindParam(":board", $board);
            $statement->bindParam(":post_time", $datetime);
            $statement->execute();
            
            closeConnection($pdo);
            
            header("Location: /Adventure-Bulletin/sub-forum.php");
            die();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
} else {
    // todo fix this
    echo $_SESSION['uname'];
}
?>