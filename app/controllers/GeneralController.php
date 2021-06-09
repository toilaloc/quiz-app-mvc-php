<?php 

namespace app\controllers;
use app\controllers\BaseController;
use app\models\Category;
use app\models\Quiz;

class GeneralController extends BaseController 
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
        $getCategory = $this->categoryModel->getCategoryGeneral();
        $getQuiz = $this->quizModel->getQuizGeneral();
        $data["quiz"] = $getQuiz;
        $data["category"] = $getCategory;
        $this->loadView('general/index', $data);
    }


}