<?php

include 'functions.php';
$db = include 'dataBase/start.php';
 
 $db->create('posts',
     ['title' => $_POST['title'],]);



header ('Location:/index.php'); //после выполнения кода go на главную

