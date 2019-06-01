<?php
include 'functions.php';
$db = include 'dataBase/start.php';

$id = $_GET['id'];
$db->delete('posts', $id);
//dd($post);

header('Location: /index.php');


