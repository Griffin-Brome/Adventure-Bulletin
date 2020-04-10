<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
    <link rel="stylesheet" href="css/login.css">
    <!--javascript-->
    <script src="js/login.js"></script>
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
            <li class="nav-item" ><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="sub-forum.php">Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
            <!--Check if user is logged in-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="account.html">Create Account</a>
                    <a class="dropdown-item" href="admin.html">Admin</a>
                  </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="GET" action="search-results.php" >
            <input class="form-control mr-sm-2" type="search" placeholder="Search"  name="search" aria-label="Search">            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
    </div> 
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>


<!--Login section-->
<body>
    <div class="login">
        <!--action should request from our database-->
        <form name=user method="POST" action="php/LoginUser.php" onsubmit="return validateForm()" >
            <p>
                <label for="user">Username:</label>
                <input type="text" id="user" name="username" required>
            </p>
            <p>
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="password" required>
            </p>
            <p>
            <input class="button" id="login" type="submit" value="Login"> 
            </p>    
        </form>
        <a href="forgot.html">Forgot Username/Password?</a>
    </div>
    </body>
    
    </html>