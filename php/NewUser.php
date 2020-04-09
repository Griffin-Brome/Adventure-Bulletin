<?php
    session_start();

    include 'DBConnection.php';
    include 'Validate.php';
    // must use post method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // validate user data
        $uname = Validate($_POST['uname']);
        $email = Validate($_POST['email']);
        $fullName = Validate($_POST['full_name']);
        $pword = Validate($_POST['pword']);
        $birthDate = Validate($_POST['birth_date']);
        $pic = file_get_contents($_FILES['pic']['name']);
        // check that data matches predefined regex pattern
        $unameValid = preg_match('/[A-Za-z0-9]+/', $uname);
        $emailValid = preg_match('/[A-Za-z0-9]{2,}@[a-z]{2,}\\.[a-z]{2,3}/', $email);
        $fullNameValid = preg_match('/[A-Z]{1}[a-z]+\\s{1}[A-Z]{1}[a-z]+/', $fullName);
        $pwordValid = preg_match('/\\S/', $pword);

        $hash = password_hash($pword, PASSWORD_DEFAULT); 

        if ($unameValid && $emailValid && $fullNameValid && $pwordValid) {
            try {
                // open connection and query database
                $pdo = openConnection();
                $sql = 'INSERT INTO account (uname, email, full_name, birth_date, pword, pic)
                        VALUES (:uname, :email, :full_name, :birth_date, :pword, :pic)';
                // use a prepared statement
                $statement = $pdo->prepare($sql);
                $statement->bindValue(':uname', $uname);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':full_name', $fullName);
                $statement->bindValue(':birth_date', $birthDate);
                // store hashed value in db
                $statement->bindValue(':pword', $hash);
                $statement->bindParam(':pic', $pic, PDO::PARAM_LOB);
                $statement->execute();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            closeConnection($pdo);
            header('Location: ../home.php');
            $_SESSION['uname'] = $uname;
            die();
        } else {
            echo '<h1 style="color:red;">Error: bad data</h1>';
        }
    } 
?>