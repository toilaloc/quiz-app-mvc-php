<?php 
namespace app\controllers;
use app\controllers\BaseController;
use app\models\Category;
class CategoryController extends BaseController
{
    public $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new Category();
    }

    public function create()
    {
        $this->loadView('admin/category/create_category');
    }

    public function store()
    {
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);

        $createCategory = $this->categoryModel->store($name, $description);

        if ($createCategory) {
            $this->message("Create success");
            $this->loadView('admin/category/create_category', $this->data);
        }
    }

    public function message($textMessage)
    {
        $this->mess = $textMessage;
        $this->data["mess"] = $this->mess;
    }
}