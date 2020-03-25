<?php
include 'DBConnection.php'; 
// connect to DB
try {
    $pdo = openConnection();
    
    // execute query

    // process results
    
    // handle connection errors
} catch (PDOException $e) {
    die($e->getMessage());
}
// free resources and close connection 
closeConnection($pdo);
?>