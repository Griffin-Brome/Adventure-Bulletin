<?php
    include "DBConnection.php";
    include "Validate.php";
    session_start();
    if (isset($_GET)) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $search = $_GET['search'];
            $search = '%'.$search.'%';
            $pdo = openConnection();
            $sql = "SELECT uname, email, full_name, birth_date FROM account WHERE uname LIKE :search";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':search', $search);

            $stmt->execute();
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Users</title>
            </head>
            <body>
                <table>
                    <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Full Name</th>
                    <th>D.O.B</th>
                    </tr>
                ";
            while ($rst = $stmt->fetch()) {
                echo "<tr>
                        <th>$rst[0]</th>
                        <th>$rst[1]</th>
                        <th>$rst[2]</th>
                        <th>$rst[3]</th>
                    </tr>";
            }
            echo "</table>
            </body>
            </html>";
        }
    }
?>
