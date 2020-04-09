<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Sub-Forum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!--Import boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!--Nav bar-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--css-->
    <link rel="stylesheet" href="css/sub-forum.css">
    <!--javascript-->
    <script src="js/sub-forum.js"></script>
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
            <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
            <li class="nav-item" ><a class="nav-link nav-link active" href="#">Posts</a></li>
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
            <!--Change to categories-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item">Skiing</a>
                    <a class="dropdown-item">Biking</a>
                    <a class="dropdown-item">Climbing</a>
                    <a class="dropdown-item">Kayaking</a>
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
<!--Start of posts-->
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>Posts</h1>
            <h3>1</h3>
            <p id="post1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <button type="button" class="btn" data-toggle="collapse" data-target="#c1">Comments</button>
            <div id="c1" class="collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <!--Add New Comment-->
            <button type="button" class="btn" data-toggle="collapse" data-target="#new1">Add Comment</button>
            <div id="new1" class="collapse">
                <form name=new-post method="POST" action="./php/SaveComment.php/" >
                    <p>
                        <textarea name="post" id="post" style="width:500px; height:200px;"></textarea>
                    </p>   
                    <p>
                        <input id="sub" type="submit" value="Add"> 
                    </p>    
                </form>
            </div>
            <h3>2</h3>
            <p id="post2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <button type="button" class="btn" data-toggle="collapse" data-target="#c2">Comments</button>
            <div id="c2" class="collapse">           
                <p">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <button type="button" class="btn" data-toggle="collapse" data-target="#new2">Add Comment</button>
            <div id="new2" class="collapse">
                <form name=new-post method="POST" action="./php/SaveComment.php/" >
                    <p>
                        <textarea name="post" id="post" style="width:500px; height:200px;"></textarea>
                    </p>   
                    <p>
                        <input id="sub" type="submit" value="Add"> 
                    </p>    
                </form>
            </div>
            <h3>3</h3>
            <p id="post3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <button type="button" class="btn" data-toggle="collapse" data-target="#c3">Comments</button>
            <div id="c3" class="collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <button type="button" class="btn" data-toggle="collapse" data-target="#new3">Add Comment</button>
            <div id="new3" class="collapse">
                <form name=new-post method="POST" action="./php/SaveComment.php/" >
                    <p>
                        <textarea name="post" id="post" style="width:500px; height:200px;"></textarea>
                    </p>   
                    <p>
                        <input id="sub" type="submit" value="Add"> 
                    </p>    
                </form>
            </div>
        </div>
        <!--End of posts-->
        
        <!--Adding a new post-->
        <!--Should be submited to database with php-->
        <?php
            if (isset($_SESSION['uname'])) {
                echo "<div id='add-post' class='col-md-4'>
                    <form name=new-post method='POST' action='./php/SavePost.php/' onsubmit='return validateForm()' >
                        <p style='font-size: large; font-weight: bold;'>Add Post</p>
                        <p>
                            <label>Title</label>
                            <input type='text' name='title' size='35' required>
                            <label>Category</label>
                            <select name='category'>
                                <option value='Skiing'>Skiing</option>
                                <option value='Climbing'>Climbing</option>
                                <option value='Biking'>Biking</option> 
                                <option value='Kayaking'>Kayaking</option>
                            <select>
                            <textarea name='post' id='post' style='width:300px; height:300px;'>
                            </textarea>
                        </p>   
                        <p>
                            <input id='sub' type='submit' value='Add'> 
                        </p>    
                    </form>
            </div>"; 
            }    
        ?>
    </div>          
</body>

</html>