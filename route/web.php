<?php

$getControllerName = $_GET['c'] ?? 'auth';
// default controller is LoginController
$getMethodName = $_GET['m'] ?? 'index';
// default is method index;

$controllerName = ucfirst($getControllerName).'Controller';
/* use ucfirst to change first word is uppercase. 
 * default name of controller is ControllerName.
*/

$controllerNamespace = "app\\controllers\\".$controllerName;
// for to require file controller.php, use namespace to call is better for app

  //  try {
        $obj = new $controllerNamespace();
        // declare object follow controller getted
        $obj->$getMethodName();
        // call to method getted
    // } catch (\Throwable $e) {
    //     require "./app/views/error/404.php";
    // }