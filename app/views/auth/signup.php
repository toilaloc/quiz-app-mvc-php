<?php 
    if (isset($_SESSION['username'])) {
        header("Location: index.php?c=general&m=index");
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>My Page Title</title>
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <script src="public/js/jquery-3.6.0.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <style>
        body {
            display: flex;
            justify-content: center;
        }
        #main {
            margin-top: 5rem;
            border-radius: 10px;
            width: 900px;
            background-color: #e9ecef;
        }
        h2#intro {
            padding-top: 2rem;
            text-align: center;
        }
        </style>
    </head>
    <body>

    <div id="main">
    <h2 id="intro">SIGN UP LEARNING ENGLISH SYSTEM</h2>
    <div class="container">
    <form action="index.php?c=auth&m=handleSignup" method="post" enctype="multipart/form-data">
    <div class="form-group p-5">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        <label for="username">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        <label for="username">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
        <label for="username">Avatar</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
        <button class="mt-2 btn btn-primary btn-sm" type="submit">Sign up</button>
        Has account? <a href="index.php?c=auth&m=index">Login</a>
    </div>
    </form>
    </div>


    </div>

    </body>
</html>