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
    <h2 id="intro">TAKE QUIZ</h2>
    <p class="p-3 text-center">All Quiz: <span id="count-quiz"><?= count($data); ?></span> | Score: <span id="score">?</span> / <?= 10 ?> | Category: <?php //$data["category"]; ?></p>
    <?php foreach($data as $quiz): ?>
    <div class="quiz-list p-3 border" data-class="quiz-<?= $quiz["id"] ?>" data-id="<?= $quiz["id"] ?>">
    <p id="quiz-id"><?= $quiz["question"]; ?></p>
    <input type="radio" class="quiz-<?= $quiz["id"] ?>" name="quiz" value="<?= $quiz["wrong_answer_a"]; ?>"> <?= $quiz["wrong_answer_a"]; ?><br>
    <input type="radio" class="quiz-<?= $quiz["id"] ?>" name="quiz" value="<?= $quiz["wrong_answer_b"]; ?>"> <?= $quiz["wrong_answer_b"]; ?><br>
    <input type="radio" class="quiz-<?= $quiz["id"] ?>" name="quiz" value="<?= $quiz["wrong_answer_c"]; ?>"> <?= $quiz["wrong_answer_c"]; ?><br>
    <input type="radio" class="quiz-<?= $quiz["id"] ?>" name="quiz" value="<?= $quiz["right_answer"]; ?>"> <?= $quiz["right_answer"]; ?><br>
    <?php if (!empty($quiz["wrong_answer_d"])): ?>
        <input type="checkbox" id="quiz" value="<?= $quiz["other_wrong_answer_"]; ?>"> <?= $quiz["other_wrong_answer_"]; ?>
    <?php endif; ?>
    <span id="message"></span>
    <button class="btn btn-success btn-quiz btn-sm" id="submit-<?= $quiz["id"] ?>">Submit</button> <button class="btn btn-success btn-remake btn-sm" id="remake-<?= $quiz['id'] ?>">Remake?</button>
    </div>
    <?php endforeach; ?>
    </div>
    <script>

    let countQuestion = $("#count-quiz").text();
    let score = 0;
    let answer;
    let id;
    let className;
    $('.btn-remake').hide();
    $('.btn-quiz').on("click", function(){
        answer = $('input[name=quiz]:checked').val();
        className = $(this).closest(".quiz-list").data("class");
        if ($.trim(answer) == '') 
        {
            alert("Please answer this question!!!!");
        } else {
            $("."+className).prop("disabled", true);
                id = $(this).closest(".quiz-list").data("id");
                $.ajax({
                    url: 'index.php?c=ajax&m=checkQuiz',
                    type: "GET",
                    data: {id: id, answer: answer},
                    success: function(res){
                        if (res == 0) {
                            $('.btn-quiz').hide();
                            $(".btn-remake").show();
                            $("#score").text(score);
                            alert("Wrong answer! Fail!");
                        } else {
                            $('#submit-'+id).hide();
                            score += 1;
                            $("#score").text(score);
                            alert("Right answer");
                            //$("#message").html("You are complete the quiz perfect away!!! <a href='index.php'>back to home</a>");
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            
        }
        
    });

    $('.btn-remake').on('click', function(){
        $(".quiz").prop("disabled", false);
        $('.btn-remake').hide();
        $('.btn-quiz').show();
    });
    </script>
    </body>
</html>