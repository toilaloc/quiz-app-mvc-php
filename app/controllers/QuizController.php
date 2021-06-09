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

    public function index()
    {
        $data = $this->quizModel->getAll();
        $this->loadView('admin/quiz/list_quiz', $data);
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

    public function edit()
    {
        $id = $_GET['id'];
        $category = $this->categoryModel->getAll();
        $data["categoryData"] = $category;
        $data["quiz"] = $this->quizModel->getQuiz($id);
        $this->loadView('admin/quiz/edit_quiz', $data);

    }


    public function update()
    {
        $id = $_GET["id"];
        $question = strip_tags($_POST['question']);
        $anser_a = strip_tags($_POST['wrong_answer_a']);
        $anser_b = strip_tags($_POST['wrong_answer_b']);
        $anser_c = strip_tags($_POST['wrong_answer_c']);
        $anser_other = strip_tags($_POST['other_wrong_answer']);
        $right_anser = strip_tags($_POST['right_answer']);
        $user_id = $_SESSION["id"];
        $category_id = strip_tags($_POST['category_id']);

        $updateQuiz = $this->quizModel->update($id, $question, $anser_a, $anser_b, $anser_c, $anser_other, $right_anser, $user_id, $category_id);    

        if ($updateQuiz) {
           //$this->message("update success");
           header("Location: index.php?c=quiz&m=edit&id=$id&state=200");
        } 
    }


    public function show()
    {
        if (!empty($_GET['id']) && !empty($_GET['cate_id'])) {
            $id = $_GET['id'];
            $data["id"] = $id;
            $cate_id = $_GET['cate_id'];
            $category = $this->categoryModel->getCategory($cate_id);
            $quiz = $this->quizModel->getQuiz($id);
            
            if (count($category) > 0 && count($quiz) > 0) {
                $data["category"] = $category[0]['name'];
                $data["quiz"] = $quiz;
                $this->loadView('admin/quiz/take_quiz', $data);
            } else {
                $this->loadView('error/404');
            }
        } else {
            $this->loadView('error/404');
        }
        
    }

    public function takeQuiz()
    {
        $categoryId = $_GET['category_id'];
        $getQuiz = $this->quizModel->getQuizForCategory($categoryId);
        if (count($getQuiz) != 0) {
            $this->loadView('admin/quiz/quiz_category', $getQuiz);
        } else {
            echo "No quiz";
        }
    }

    public function destroy()
    {
        $id = $_REQUEST['id'];
        $this->quizModel->destroy($id);
    }


    public function message($textMessage)
    {
        $this->mess = $textMessage;
        $this->data["mess"] = $this->mess;
    }
}