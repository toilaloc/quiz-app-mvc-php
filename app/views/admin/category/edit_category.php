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
        .mess {
            text-align: center;
            color: #4c9343;
            text-decoration: underline;
            text-transform: uppercase;
        }
        </style>
    </head>
    <body>

    <div id="main">
    <h2 id="intro">EDIT CATEGORY</h2>
    <div class="container">
    <?php if (isset($_GET["state"]) && $_GET["state"] == 200):?>
    <p class="mess">Update success!</p>
    <?php endif; ?>

    <form action="index.php?c=category&m=update&id=<?= $data[0]["id"]; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group p-5">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $data[0]["name"]; ?>">
        <label for="description">Description</label>
        <textarea  class="form-control"  name="description"><?= $data[0]["description"]; ?></textarea>
        <button class="mt-2 btn btn-primary btn-sm" type="submit">Edit</button> 
    </div>
    </form>
    </div>


    </div>

    </body>
</html>