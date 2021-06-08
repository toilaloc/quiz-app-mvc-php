<?php 

if (!isset($_SESSION['username'])) {
    header("Location: index.php?c=auth&m=index");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Page Quiz</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/jquery-3.6.0.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
</head>
<body>
  
  <main class="mt-3">
        <div class="container">
                <div class="row">
                    <div class="col-md-6 p-3" style="border: 1px solid #28a738;">
                    <h4>List Category: <button class="btn btn-sm" onclick="window.location.href = 'index.php?c=category&m=show&m=create'">ADD</button> <button class="btn btn-sm" onclick="window.location.href = 'index.php?c=category&m=index'">LIST</button></h4> 
                    <ul>
                    <?php foreach($data["category"] as $category): ?>
                    <li class="m-2"><?= $category["name"]; ?> <button class="btn btn-sm btn-success" id="<?= $category["id"]; ?>">Take a Quiz</button></li>
                    <?php endforeach; ?>
                    </ul>
                    <h4>List Quiz: <button class="btn btn-sm" onclick="window.location.href = 'index.php?c=quiz&m=show&m=create'">ADD</button> <button class="btn btn-sm" onclick="window.location.href = 'index.php?c=quiz&m=all'">LIST</button></h4>
                    <?php foreach($data["quiz"] as $quiz): ?>
                    <li class="m-2"><?= $quiz["question"]; ?> <button class="btn btn-sm btn-success" onclick="window.location.href = 'index.php?c=quiz&m=show&m=show&id=<?= $quiz['id']; ?>&cate_id=<?= $quiz['category_id']; ?>' ">Fast Quiz</button></li>
                    <?php endforeach; ?>
                    </div>
                    <div class="col-md-6 p-3" style="background-color: #e9ecef;">
                    <h4>Profile</h4>
                    <ul style="list-style-type: none;">
                    <li>Username: <?= $_SESSION['username']; ?></li>
                    <li>Email: <?= $_SESSION['email']; ?></li>
                    <li><img class="img-thumbnail" src="<?= $_SESSION['avatar']; ?>"/></li>
                    <li>Address: <?= $_SESSION['address']; ?></li>
                    <button class="btn btn-danger btn-sm btn-logout">Logout</button>
                    </ul>
                    </div>
                </div>
        </div>
  </main>

   <script>
   $('.btn-logout').on("click", function() {
       $.ajax({
           url: "index.php?c=ajax&m=logout",
           type: "GET",
           success: function(res) {
            window.location="index.php";
           },
           error: function(res) {
           }
       });
   });
   </script>
</body>
</html>