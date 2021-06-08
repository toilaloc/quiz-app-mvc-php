<?php 

namespace app\controllers;
use app\controllers\BaseController;
use app\models\User;
class AuthController extends BaseController
{
    public $userModel;
    public $mess;
    public $data = [];

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index() 
    {
        $this->loadView('auth/signin');
    }

    public function handleSignin()
    {
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);

        $currentUserData = $this->userModel->checkLogin($username, $password); 
        
        if ($currentUserData) {
            
            // get info user logining and save to session 
            $user = $currentUserData[0];
            $_SESSION["id"] = $user["id"];
            $_SESSION['username'] = $user["username"];
            $_SESSION['email'] = $user["email"];
            $_SESSION['avatar'] = $user["avatar"];
            $_SESSION['address'] = $user["address"];

            // return to general page
            header("Location: index.php");

        } else {

            // return to login page and message
            $this->message("Login fail!");
            $this->loadView('auth/signin', $this->data);
        }
    }

    public function signup()
    {
        $this->loadView('auth/signup');
    }

    public function handleSignup()
    {
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        $email = strip_tags($_POST['email']);
        $address = strip_tags($_POST['address']);
        $avatar = $_FILES['avatar'];

        $checkUserExist = $this->userModel->checkUserExist($username, $email);

        if ($checkUserExist) {
            $this->message("Username or Email has exist");
            $this->loadView('auth/signin', $this->data);
        } else {
           $userSignup = $this->userModel->handleSignup($username, $password, $email, $address, $avatar);
           
           if ($userSignup) {
               header("Location: index.php?c=auth&m=index&state=200");
           }
        }
    }

    public function message($textMessage)
    {
        $this->mess = $textMessage;
        $this->data["mess"] = $this->mess;
    }
}