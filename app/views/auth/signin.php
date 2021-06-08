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
        .fail {
            text-align: center;
            color: #dc3545;
            text-decoration: underline;
            text-transform: uppercase;
        }
        .success {
            text-align: center;
            color: #28a745ab;
            text-decoration: underline;
            text-transform: uppercase;
        }
        </style>
    </head>
    <body>

    <div id="main">
    <h2 id="intro">SIGNIN LEARNING ENGLISH SYSTEM</h2>
    <div class="container">
    <?php if (isset($data) && !empty($data)):?>
    <p class="fail"><?= $data["mess"]; ?></p>
    <?php endif; ?>
    <?php if (isset($_GET['state']) && !empty($_GET['state'])):?>
    <p class="success">Signup Success!</p>
    <?php endif; ?>
    <form action="index.php?c=auth&m=handleSignin" method="post" enctype="multipart/form-data">
    <div class="form-group p-5">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        <button class="mt-2 btn btn-primary btn-sm" type="submit">Sign in</button> 
        Haven't account? <a href="index.php?c=auth&m=signup">Register</a>
    </div>
    </form>
    </div>


    </div>

    </body>
</html>