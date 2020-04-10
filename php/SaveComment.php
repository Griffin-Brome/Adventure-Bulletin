<?php
session_start();
include 'DBConnection.php'; 
include 'Validate.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate for XSS
    if (isset($_SESSION['uname'])) {
        $uname = $_SESSION['uname'];
    }
    $commentBody = Validate($_POST['commentBody']);
    $postId = $_POST['postId'];
        try {
            $pdo = openConnection();
            // execute query
            $sql = "INSERT INTO comment (uname, comment_body, post_id, comment_time) 
                    VALUES (:uname, :comment_body, :post_id, :comment_time)";    
            
            $datetime = date("Y-m-d H:i:s");

            $statement = $pdo->prepare($sql);
            $statement->bindValue(":uname", $uname);
            $statement->bindValue(":comment_body", $commentBody);
            $statement->bindValue(":post_id", $postId);
            $statement->bindValue(":comment_time", $datetime);
            
            $statement->execute();
            // handle connection errors
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    // free resources and close connection 
    closeConnection($pdo);
}
header("Location: /Adventure-Bulletin/sub-forum.php"); //todo add get?
?>