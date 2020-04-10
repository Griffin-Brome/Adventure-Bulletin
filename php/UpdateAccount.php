<?php
    session_start();
    include "DBConnection.php";
    include "Validate.php";
    if (isset($_SESSION['uname'])) {
        $uname = $_SESSION['uname'];
        
        $email = Validate($_POST['email']);
        $fullName = Validate($_POST['full_name']);
        $pword = Validate($_POST['pword']);
        $pic = file_get_contents($_FILES['pic']['name']);

        $emailValid = preg_match('/[A-Za-z0-9]{2,}@[a-z]{2,}\\.[a-z]{2,3}/', $email);
        $fullNameValid = preg_match('/[A-Z]{1}[a-z]+\\s{1}[A-Z]{1}[a-z]+/', $fullName);
        $pwordValid = preg_match('/\\S/', $pword);

        $hash = password_hash($pword, PASSWORD_DEFAULT); 

        try {
                $pdo = openConnection();
                $sql = "UPDATE account SET email=:email, full_name=:full_name, pword=:pword, pic=:pic WHERE uname = :uname";
                $statement = $pdo->prepare($sql);
                $statement->bindValue(':uname', $uname);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':full_name', $fullName);
                $statement->bindValue(':pword', $hash);
                $statement->bindParam(':pic', $pic, PDO::PARAM_LOB);
                $statement->execute();
            }  catch (PDOException $e) {
                echo $e->getMessage();
                die();
            }
            closeConnection($pdo);
            header('Location: ../home.php');
    }
?>