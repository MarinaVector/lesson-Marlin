<?php
$config = include 'config.php';
include 'QueryBuilder.php';
include 'Connection.php';

//$pdo = Connection::make();

//$db = new QueryBuilder($pdo);


//var_dump($config['database']);exit;
//$connection = new Connection;
//$pdo = $connection->make();


return new Querybuilder(Connection::make($config['database'])
);



