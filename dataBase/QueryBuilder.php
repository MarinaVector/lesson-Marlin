<?php
 
class QueryBuilder {

protected $pdo;
	public function __construct($pdo)
	{
$this->pdo = $pdo;
	}

    public function getAll($table) {

        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        //return $results;
    }


public function getOne($table, $id) {
	//dd([$table, $id]);
	$sql = "SELECT * FROM posts WHERE id=:id";
	$statement = $this->pdo->prepare($sql);
	$statement->bindValue(':id' , $id);
	$statement->execute();
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	return $result;
}

public function create($table, $data)
 {
 	$keys = implode (',', array_keys($data));
   $tags = ":".implode (',:', array_keys($data));

	$sql = "INSERT INTO {$table} ({$keys})  VALUES ({$tags})";
	//$keys = array_keys($data);
	
	//dd($sql);
	 //$statement = $this->pdo->query($sql);
	$statement = $this->pdo->prepare($sql);
	 //$statement->bindValue(':title', 'qweqwe'); //привязать значение к метке тайтл
	 $statement->execute($data);
 //var_dump($statement);

 
}

public function update($table, $data, $id) {
	
	$keys = array_keys($data);
	$string = '';

	foreach ($keys as $key) {
		$string .= $key . '=:' . $key. ',';
		
	}
	$keys = rtrim($string, ',');
$data['id'] = $id;


	$sql = "UPDATE {$table} SET {$keys} WHERE id=:id";
	$statement = $this->pdo->prepare($sql);
	$statement->bindValue(':id', $id);
	$statement->execute($data);



}
public function delete($posts, $id) {
	//$sql = "DELETE * FROM {$table} WHERE id=:id";
    $sql =  "DELETE FROM `posts` WHERE `posts`.`id` = :id";
	$statement = $this->pdo->prepare($sql);
	//$statement->bindValue(':id' , $id);
	$statement->execute(['id' => $id]);
	
	
		
	}

}