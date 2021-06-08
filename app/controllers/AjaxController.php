<?php 

namespace app\controllers;
use app\controllers\BaseController;
use app\models\Quiz;

class AjaxController extends BaseController
{
    public $quizModel;

    public function __construct()
    {
        $this->quizModel = new Quiz;
    }

    public function logout()
    {

        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['address']);
        unset($_SESSION['avatar']);

        header("Location: index.php");
    }

    public function checkQuiz()
    {
        $id = $_REQUEST["id"];
        $answer = $_REQUEST["answer"];
        $checkQuiz = $this->quizModel->checkQuiz($id, $answer);
        $result = count($checkQuiz);
        echo $result;
    }

}