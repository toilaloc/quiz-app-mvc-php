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
            color: #000000;
            text-decoration: underline;
            text-transform: uppercase;
        }
        </style>
    </head>
    <body>

    <div id="main">
    <h2 id="intro">LIST QUIZ</h2>
    <div class="container">
    <div class="col-lg-12">
        <ul style="list-style-type: none">
        <?php foreach($data as $quiz): ?>
        <li class="m-1"><?= $quiz["question"]; ?> <button class="btn btn-sm btn-warning" onclick="window.location.href = 'index.php?c=quiz&m=edit&id=<?= $quiz['id']; ?>'">Edit</button> <button class="btn btn-danger btn-sm btn-delete" data-id="<?= $quiz['id']; ?>">Delete</button></li>
        <?php endforeach; ?>
        </ul>
    </div>
    </div>
    </form>
    </div>


    </div>
    <script>
    $('.btn-delete').on('click', function(){
        let id = $(this).data('id');
        $.ajax({
            url: `index.php?c=quiz&m=destroy&id=${id}`,
            data: {id: id},
            type: "POST",
            success: function(res){
                location.reload();
            }
        });
    });
    </script>
    </body>
</html>