<?php
include 'functions.php';
$db = include 'dataBase/start.php';

$id = $_GET['id'];
$post = $db->getOne('posts', $id);
//dd($post);
?>

<h2><?php
echo $post ['title'] . "<div>Запись поста получена!</div>";
?></h2>