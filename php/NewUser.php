<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "1");

    include 'DBConnection.php';
    include 'Validate.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $uname = Validate($_POST['uname']);
        $email = Validate($_POST['email']);
        $fullName = Validate($_POST['full_name']);
        $pword = Validate($_POST['pword']);
        $birthDate = Validate($_POST['birth_date']);
        
        $unameValid = preg_match('/[A-Za-z0-9]+/', $uname);
        $emailValid = preg_match('/[A-Za-z0-9]{2,}@[a-z]{2,}\\.[a-z]{2,3}/', $email);
        $fullNameValid = preg_match('/[A-Z]{1}[a-z]+\\s{1}[A-Z]{1}[a-z]+/', $fullName);
        $pwordValid = preg_match('/\\S/', $pword);

        if ($unameValid && $emailValid && $fullNameValid && $pwordValid) {
            try {
                $pdo = openConnection();
                $sql = 'INSERT INTO account (uname, email, full_name, birth_date, pword)
                        VALUES (:uname, :email, :full_name, :birth_date, :pword)';
                $statement = $pdo->prepare($sql);
                
                $statement->bindValue(':uname', $uname);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':full_name', $fullName);
                $statement->bindValue(':birth_date', $birthDate);
                $statement->bindValue(':pword', $pword);
                //$statement->bindValue(":is_admin", $_POST["is_admin"]);
                
                $statement->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            closeConnection($pdo);
        } else {
            echo '<h1 style="color:red;">Error: bad data</h1>';
        }
    } 
?>