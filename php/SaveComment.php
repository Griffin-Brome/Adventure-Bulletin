<?php
include 'DBConnection.php'; 
include 'Validate.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate for XSS
    $uname = Validate($_POST['uname']);
    $commentId = Validate($_POST['commentId']);
    $commentBody = Validate($_POST['commentBody']);

    if ($uname && $commentId && $commentBody) {
        try {
            $pdo = openConnection();
            // execute query
            $sql = "INSERT INTO comment (uname, comment_id, comment_body, post_id) 
                    VALUES (:uname, :comment_id, :comment_body, :post_id)";    
            $statement = $pdo->prepare($sql);
            $statement->bindValue(":uname", $uname);
            $statement->bindValue(":commentId", $commentId);
            $statement->bindValue(":comment_body", $commentBody);
            $statement->bindValue(":post_id", $postId);
            
            $statement->execute();
            // handle connection errors
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    // free resources and close connection 
    closeConnection($pdo);
    } else {
        echo '<h1 style="color:red;">Error: bad data</h1>';
    }
}
?>