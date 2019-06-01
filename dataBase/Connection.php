<?php
 
class Connection {


public static function make($config) {

		return new PDO("{$config['connection']};dbname={$config['database']};{$config['charset']}", $config['username'], $config['password']);

}
}

//var_dump($config['charset']);


