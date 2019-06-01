<?php
include 'functions.php';

$db = include 'dataBase/start.php';
$post = $db -> getOne('posts', 1);

$posts = $db->getAll('posts');



include 'index.view.php';


define('ROOT' , getcwd() . '/');
define('PAGE' , ROOT . 'page/');
if($_GET['page'] == "") $_GET['page'] = "home";
//echo $_GET['page'];

$page = $_GET['page'];

$routes = require(ROOT . 'route.php');

$check = false;

foreach ($routes as $route => $file) {

    if ($route == $page) {
        $check = true;
        require_once(PAGE . $file . ".php");
    }
}

if ($check == false) require_once(PAGE . '404.php');
