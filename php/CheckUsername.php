<?php
include 'DBConnection.php'; 
include 'Validate.php';
   $pword = Validate($_POST['username']);
    try {
        $pdo = openConnection();
        $sql = "SELECT uname FROM `account` WHERE (`uname` = :uname)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':uname', $uname);
        $statement->execute();
        $rst = $statement->fetch(PDO::FETCH_ASSOC);     
        if ($statement->rowCount() > 0) {
            echo "<span style='color: red;'>Username is not available.</span>";
        }else{
            echo "<span style='color: green;'>Username is available.</span>";
        }
        echo $response;
        }catch (PDOException $e) {
            die($e->getMessage());
}
?>
