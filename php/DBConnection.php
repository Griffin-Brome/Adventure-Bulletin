<?php
function openConnection() {
    $connString = "mysql:host=localhost;dbname=adventure_db";
    $user = "root";
    $pass = "";

    $pdo = new PDO($connString, $user, $pass);
    return $pdo;
}
function closeConnection($pdo) {
    $pdo = null;
} 
?>