<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>search-results</title>
    <!--Import boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--Nav Bar-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--css-->
    <link rel="stylesheet" href="css/search-results.css">
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
            <li class="nav-item" ><a class="nav-link" href="home.html">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="sub-forum.php">Posts</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
            <!--Check if user is logged in-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="login.html">Login</a>
                    <a class="dropdown-item" href="account.html">Create Account</a>
                    <a class="dropdown-item" href="admin.php">Admin</a>
                  </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="GET" action="search-results.php" >
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
    </div> 
    <button type="button" class="navbar-toggler" data-toggle="collapse"  name="search" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<!--Start of results-->
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <h1>Search Results</h1>
                <?php
                    include 'php/DBConnection.php';
                    include 'php/Validate.php';

                    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                        $search = Validate($_GET['search']);
                        $search = '%'.$search.'%';
                        try {
                            $pdo = openConnection();
                            $sql = "SELECT post_title, post_body, uname, board_title, post_time FROM post WHERE post_title LIKE :search ORDER BY post_time DESC LIMIT 10";
                            $stmt = $pdo->prepare($sql);
                            $stmt->bindValue(':search',  $search);   
                            $stmt->execute();
                            while ($rst = $stmt->fetch()) {
                                echo "<h3>$rst[0]</h3>";
                                echo "<p id='post'>$rst[1]</p>";
                            }
                            closeConnection($pdo);
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                            die();
                        } 
                    }
                ?>
            </div>
        </div>
    </div>

</body>
</html>