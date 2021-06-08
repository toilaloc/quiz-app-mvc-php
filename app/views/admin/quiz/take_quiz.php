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
    <p class="p-3 text-center">All Quiz: <span id="count-quiz"><?= count($data["quiz"]); ?></span> | Score: <span id="score">?</span> / <?= 10 ?> | Category: <?= $data["category"]; ?></p>
    <?php foreach($data["quiz"] as $quiz): ?>
    <div class="quiz-list p-3">
    <p id="quiz-id" data-id="<?= $quiz["id"] ?>"><?= $quiz["question"]; ?></p>

    <input type="radio" class="quiz" name="quiz" value="<?= $quiz["wrong_answer_a"]; ?>"> <?= $quiz["wrong_answer_a"]; ?><br>
    <input type="radio" class="quiz" name="quiz" value="<?= $quiz["wrong_answer_b"]; ?>"> <?= $quiz["wrong_answer_b"]; ?><br>
    <input type="radio" class="quiz" name="quiz" value="<?= $quiz["wrong_answer_c"]; ?>"> <?= $quiz["wrong_answer_c"]; ?><br>
    <input type="radio" class="quiz" name="quiz" value="<?= $quiz["right_answer"]; ?>"> <?= $quiz["right_answer"]; ?><br>
    <?php if (!empty($quiz["wrong_answer_d"])): ?>
        <input type="checkbox" id="quiz" value="<?= $quiz["other_wrong_answer_"]; ?>"> <?= $quiz["other_wrong_answer_"]; ?>
    <?php endif; ?>
    <span id="message"></span>
    <button class="btn btn-success btn-quiz btn-sm">Submit</button> <button class="btn btn-success btn-remake btn-sm">Remake?</button>
    </div>
    <?php endforeach; ?>
    </div>
    <script>

    let countQuestion = $("#count-quiz").text();
    let score;
    let answer;
    let id;
    $('.btn-remake').hide();
    $('.btn-quiz').on("click", function(){
        answer = $('input[name=quiz]:checked').val();
        if ($.trim(answer) == '') 
        {
            alert("Please answer this question!!!!");
        } else {
            $(".quiz").prop("disabled", true);
            if (countQuestion == 1) {
                id = $('#quiz-id').data("id");
                $.ajax({
                    url: 'index.php?c=ajax&m=checkQuiz',
                    type: "GET",
                    data: {id: id, answer: answer},
                    success: function(res){
                        if (res == 0) {
                            $('.btn-quiz').hide();
                            $(".btn-remake").show();
                            $("#score").text("0");
                            alert("Wrong answer! Fail!");
                        } else {
                            $('.btn-quiz').hide();
                            $("#score").text("10");
                            alert("Right answer");
                            $("#message").html("You are complete the quiz perfect away!!! <a href='index.php'>back to home</a>");
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            }
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