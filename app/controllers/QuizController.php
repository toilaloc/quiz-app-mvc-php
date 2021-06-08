<?php 

namespace app\controllers;
use app\controllers\BaseController;
use app\models\Category;
use app\models\Quiz;
use Exception;

class QuizController extends BaseController
{
    public $categoryModel;
    public $quizModel;

    public function __construct()
    {
        $this->categoryModel = new Category;
        $this->quizModel = new Quiz;
    }
    public function create()
    {
        $category = $this->categoryModel->getAll();
        $data = [
            ["categoryData" => $category],
        ];
        $this->loadView('admin/quiz/create_quiz', $data);
    }
    public function store()
    {
        $question = strip_tags($_POST['question']);
        $anser_a = strip_tags($_POST['wrong_answer_a']);
        $anser_b = strip_tags($_POST['wrong_answer_b']);
        $anser_c = strip_tags($_POST['wrong_answer_c']);
        $anser_other = strip_tags($_POST['other_wrong_answer']);
        $right_anser = strip_tags($_POST['right_answer']);
        $user_id = $_SESSION['id'];
        $category_id = strip_tags($_POST['category_id']);

        $createQuiz = $this->quizModel->store($question, $anser_a, $anser_b, $anser_c, $anser_other, $right_anser, $user_id, $category_id);
        if ($createQuiz) {
            $this->message("Create success");
            $this->loadView('admin/quiz/create_quiz', $this->data);
        }
    }

    public function show()
    {
        $id = $_GET['id'];
        $data["id"] = $id;
        $cate_id = $_GET['cate_id'];
        $category = $this->categoryModel->getCategory($cate_id);
        $data["category"] = $category[0]['name'];
        $data["quiz"] = $this->quizModel->getQuiz($id);
        $this->loadView('admin/quiz/take_quiz', $data);
    }

    public function takeQuiz()
    {

    }

    public function message($textMessage)
    {
        $this->mess = $textMessage;
        $this->data["mess"] = $this->mess;
    }
}