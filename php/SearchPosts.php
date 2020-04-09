<?php 
    include 'DBConnection.php';
    include 'Validate.php';

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $search = Validate($_GET['search']);
        try {
            $pdo = openConnection();
            $sql = "SELECT post_title, post_body, uname, board_title FROM post WHERE post_title LIKE %:search%";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search', $search);
            $stmt->execute();
            closeConnection($pdo);
        } catch (PDOException $e) {
            die($e->getMessage());
        } 
    }
?>