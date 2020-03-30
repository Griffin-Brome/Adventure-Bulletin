<?php
include 'DBConnection.php'; 
// connect to DB
try {
    $pdo = openConnection();
    // execute query
    $sql = "INSERT INTO comment (uname, comment_id, comment_body, post_id) 
            VALUES (:uname, :comment_id, :comment_body, :post_id)";    
    $statement = $pdo->prepare($sql);
    $statement->bindValue(":uname", $_POST["uname"]);
    $statement->bindValue(":commentId", $_POST["commentId"]);
    $statement->bindValue(":comment_body", $_POST["commentBody"]);
    $statement->bindValue(":post_id", $_POST["postId"]);
    
    $statement->execute();
    // handle connection errors
} catch (PDOException $e) {
    die($e->getMessage());
}
// free resources and close connection 
closeConnection($pdo);
?>