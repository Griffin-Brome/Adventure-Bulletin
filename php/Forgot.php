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
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $uname = $row['uname'];
            $pword = $row['pword'];

            // send email
            $to = 'abc@gmail.com';
            $subject = 'Your account details';
            $txt = "Username: $uname\nPassword: $pword";
            $headers = 'From: Site Admins';
            $x=mail($to,$subject,$txt,$headers);
        }
        echo '<script language="javascript">';
        if ($x) {
            // if successfull, send confirmation message to user
                echo 'alert("Email sent!")';
        } else {
            echo 'alert("Error: email could not send")'; 
        }    
    echo '</script>';
    closeConnection($pdo);
    #header("Location: /Adventure-Bulletin/home.php");
    } catch (RuntimeException $e) {
        echo $e->getMessage();
        die();
    }
?>