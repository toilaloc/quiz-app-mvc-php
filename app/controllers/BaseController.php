<?php 

namespace app\controllers;

class BaseController
{
    
    public $pathView = 'app/views/';

    public function loadView($file, $data = [])
    {
        extract($data);
        require $this->pathView.$file.'.php';
    }

    public function __call($method, $args)
    {
        $this->loadView('error/404');
    }

}