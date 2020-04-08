<?php
    include 'DBConnection.php';
    include 'Validate.php';
    // get user email from post data
    $email = Validate($_POST['email']);
    try {
        // query database (username and password)
        $pdo = openConnection();
        $sql = "SELECT uname, pword FROM account WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $result = $stmt->execute();
        $row = $result->fetch();
        closeConnection($pdo);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
        $uname = $row['uname'];
        $pword = $row['pword'];

    // send email
    $to = 'abc@gmail.com';
    $subject = 'Your account details';
    $txt = "Username: $uname\nPassword: $pword";
    $headers = 'From: Site Admins';
    $x=mail($to,$subject,$txt,$headers);

    // if successfull, send confirmation message to user
    echo '<script language="javascript">';
    if ($x) {
        echo 'alert("Email sent!")';
    } else {
        echo 'alert("Error: email could not send")'; 
    }
    echo '</script>';
?>