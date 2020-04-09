<?php 
    session_start()
?>
<!DOCTYPE html>
<html>
<head>
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
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <header>
        <div class="jumbotron text-center" id="top" style="margin-bottom:0">
            <h1 id="pageTitle">Adventure Bulletin</h1>
            <p><img src="img/Logo.png" alt="Logo" id="Logo" width=200 class="rounded-circle img-fluid"> </p>
        </div>
    </header>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="navbar-nav">
            <li class="nav-item" ><a class="nav-link nav-link active" href="#">Home</a></li> 
            <li class="nav-item"><a class="nav-link" href="sub-forum.php">Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
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
        <form class="form-inline my-2 my-lg-0" method="GET" action="php/Search.php" >
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" id="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
    </div> 
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<!--Start of posts-->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>New Posts</h1>
            <?php
                include "php/DBConnection.php";
                $pdo = openConnection();
                $sql = "SELECT post_title, post_body, uname, board_title, post_time FROM post ORDER BY post_time DESC LIMIT 10";                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                while ($rst = $stmt->fetch()) {
                    echo "<h3>$rst[0]</h3>";
                    echo "<p id='post'>$rst[1]</p>";
                }
            ?>
        </div>
    <!--End of posts-->
    
    <!--User profile-->
    <?php
        if (isset($_SESSION['uname'])) {
            $user = $_SESSION['uname'];
      
            echo "<div class='col-md-4' id='userProfile'>
                <h3>User Profile</h3>
                <p id='username'>Username: $user</p>
                <p id='Interests'>Interest: </p>
                <p id='userImg'><img src='img/user.png' width=100></p>
                <p><button class='btn' id='settings' value='Edit Profile'>Edit Profile</p>
                    <script type='text/javascript'>
                        document.getElementById('settings').onclick = function () {
                            location.href = 'edit-profile.html';
                        echo };
                    </script>
            </div>";
    } 
?>
</div>
<!--End user profile-->
</body>

</html>