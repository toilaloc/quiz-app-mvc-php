<?php 

require "vendor/autoload.php";
require "app/config/Session.php";

if (file_exists('route/web.php')) {
    define('ROOT_PATH','index.php');
    require 'route/web.php';
} else {
    die("Maintain");
} 