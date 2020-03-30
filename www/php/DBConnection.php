<?php
function openConnection() {
    $connString = "mysql:host=DBHOST;dbname=DBNAME";
    $user = "DBUSER";
    $pass = "DBPASS";

    $pdo = new PDO($connString, $user, $pass);
    return $pdo;
}
function closeConnection($pdo) {
    $pdo = null;
} 
?>