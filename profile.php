<?php
    session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sub-Forum</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!--Import boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--Import symbols-->
    <script src="https://kit.fontawesome.com/7bea0d4d5b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--css-->
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <header>
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1 id="pageTitle">Adventure Bulletin</h1>
            <p><img src="img/Logo.png" alt="Logo" id="Logo" width=200 class="rounded-circle img-fluid"> </p>
        </div>
    </header>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="navbar-nav">
            <li class="nav-item" ><a class="nav-link" href="home.html">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="sub-forum.html">Posts</a></li>
            <!--Check if user is logged in-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="account.html">Create Account</a>
                    <a class="dropdown-item" href="admin.html">Admin</a>
                  </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
    </div> 
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
    <!--Sould be pulling all this info from database-->
    <?php
    // db calls
    include "php/DBConnection.php";
    if (isset($_SESSION["uname"])) {
        $uname = $_SESSION["uname"];
    }
    else {
        $_SESSION['login_error'] = TRUE;
        header("Location: login.php");
    }
    try {
        $pdo = openConnection();
        // get the users profile pic        
        $sql = "SELECT pic FROM account WHERE uname = :uname";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':uname', $uname);
        $stmt->execute();
        
        $rst = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rst) {
            header("Content-type: image/jpeg");
            echo($rst[0]); // output the image
        }
        echo "<div class='container'>\n";
            echo "<div class='row'>\n";
                echo "<div class='col-md-4'>\n";
                $rst = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($rst) {
                    header("Content-type: image/jpeg");
                    echo($rst[0]); // output the image
                    echo("\n");
                }
                echo "</div>\n";
                echo "<div class='col-md-8' >\n";
                    echo "<h3>Username:</h3>\n";
                    echo "<p id='username' >$uname</p>\n";
                    echo "<h3>Interests:</h3>\n";
                    echo "<p id='interests'></p>\n";
                echo "</div>\n";
                // get the users posts 
                $sql = "SELECT post_title, post_body, board_title FROM post WHERE uname = :uname";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':uname', $uname);
                $stmt->execute();
        
                echo "</div>\n";
            echo "<div class='row'>\n";
                echo "<div class='col-md-8'>\n";
                    echo "<h1>Posts</h1>\n";
                    $i = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<h3>$row[0]</h3>";
                        $i = $i + 1;
                        echo "<p id='post'>$row[1]</p>";
                    }
                echo "</div>\n";

                $sql = "SELECT board_title FROM joined_board WHERE uname = :uname";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':uname', $uname);
                $stmt->execute();
                
                echo "<div class='col-md-4'>\n";
                    echo "<h3>Sub-Forums:</h3>\n";
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<p id='sub-forum'>$row[0]</p>";
                    }
                echo "</div>\n";
            echo "</div>\n";
        echo "</div>\n";
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    ?>
</body>
</main>
</html>