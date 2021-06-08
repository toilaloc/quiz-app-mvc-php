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

    public function index()
    {
        $data = $this->categoryModel->getAll();
        $this->loadView('admin/category/list_category', $data);
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

    public function edit()
    {
        $id = $_GET['id'];
        $data = $this->categoryModel->getCategory($id);
        $this->loadView('admin/category/edit_category', $data);
    }

    public function update()
    {
        $id = $_GET["id"];
        $name = strip_tags($_POST['name']);
        $description = strip_tags($_POST['description']);

        $updateCategory = $this->categoryModel->update($id, $name, $description);        
        if ($updateCategory) {
           //$this->message("update success");
           header("Location: index.php?c=category&m=edit&id=$id&state=200");
        } 
    }

    public function destroy()
    {
        $id = $_REQUEST['id'];
        $this->categoryModel->destroy($id);
    }

    public function message($textMessage)
    {
        $this->mess = $textMessage;
        $this->data["mess"] = $this->mess;
    }
}