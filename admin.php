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
    <!--Nav Bar-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--css-->
    <link rel="stylesheet" href="css/admin.css">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="login.php">Login</a>
                    <a class="dropdown-item" href="account.html">Create Account</a>
                    <a class="dropdown-item" href="admin.php">Admin</a>
                  </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="GET" action="search-results.php" >
            <input class="form-control mr-sm-2" type="search" placeholder="Search posts"  name="search" aria-label="Search">            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <form class="form-inline my-2 my-lg-0" method="GET" action="php/search-users.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search users"  name="search" aria-label="Search">            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
    </div> 
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<?php
    include "php/DBConnection.php";
    if (isset($_SESSION['uname'])) {
        $uname = $_SESSION['uname'];
        $pdo = openConnection();
        $sql = "SELECT is_admin FROM account WHERE uname=:uname";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':uname', $uname);
        $stmt->execute();
        if ($rst = $stmt->fetch()) {
            if ($rst[0]) {
                echo "<div class='container'>
                <div class='row'>
                    <div class='col-md-4'>
                        <p id='picture'><img src='img/user.png' width=100></p>
                    </div>
                    <div class='col-md-8' >
                        <h3>Admin:</h3>
                        <p id='admin'>$uname</p>
                        <h3>Banned users:</h3>
                        <p id='banned'></p>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-8'>
                        <h1>Removed Posts</h1>
                    </div>
                    <div class='col-md-4'>
                        <h3>Removed Sub-Forums:</h3>
                        <p id='sub-forum'></p>
                    </div>
                </div>
            </div>";
            } else {
                echo "<h1 style='color: red; text-align: center'>NOT AN ADMIN</h1>";
            }
        }
    }
?>

</body>
</html>