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
    <h2 id="intro">EDIT QUIZ</h2>
    <form action="index.php?c=quiz&m=update&id=<?= $data["quiz"][0]["id"]; ?>" method="post" enctype="multipart/form-data">
    <div class="form-group p-5">
        <label for="name">Question</label>
        <input type="text" class="form-control" id="question" name="question" value="<?= $data["quiz"][0]["question"]; ?>">	
        <label for="name">Answer A</label>
        <input type="text" class="form-control" id="wrong_answer_a" name="wrong_answer_a" value="<?= $data["quiz"][0]["wrong_answer_a"]; ?>">
        <label for="name">Answer B</label>
        <input type="text" class="form-control" id="wrong_answer_b" name="wrong_answer_b" value="<?= $data["quiz"][0]["wrong_answer_b"]; ?>">
        <label for="name">Answer C</label>
        <input type="text" class="form-control" id="wrong_answer_c" name="wrong_answer_c" value="<?= $data["quiz"][0]["wrong_answer_c"]; ?>">
        <label for="name">Right Answer</label>
        <input type="text" class="form-control" id="right_answer" name="right_answer" value="<?= $data["quiz"][0]["right_answer"]; ?>">
        <label for="name">Other Answer (Not require)</label>
        <input type="text" class="form-control" id="other_wrong_answer" name="other_wrong_answer" value="<?= $data["quiz"][0]["other_wrong_answer"]; ?>">
        <label for="description">Choose Category</label>
        <select name="category_id" class="form-control">
            <?php foreach($data["categoryData"] as $category): ?>
            <option value="<?= $category["id"]; ?>"><?= $category["name"]; ?></option>
            <?php endforeach; ?>
        </select>
        <button class="mt-2 btn btn-primary btn-sm" type="submit">Create</button> 
    </div>
    </form>
    </div>


    </div>

    </body>
</html>