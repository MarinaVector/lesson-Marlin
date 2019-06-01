<?php


include 'functions.php';
$db = include 'dataBase/start.php';

//$post = $db->getOne('posts', 1);
//dd($_POST);

 $db->update('posts', [
     'title' => $_POST['title'],
], $_GET['id']);

 header('Location: /index.php');

