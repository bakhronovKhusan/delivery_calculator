<?php
namespace Core;

abstract class Model extends Database
{
    protected $table = '';
    public function all($table) /// posts , articles, tasks
    {
        $sql = "SELECT * FROM $table ORDER BY id DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute(); //true || false
        $results = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    public function distinsName($table,$rowName){
        $sql = "SELECT DISTINCT $rowName FROM $table ORDER BY id DESC";
        $statement = $this->pdo->prepare($sql); //�����������
        $statement->execute(); //true || false
        $results = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
    public function where($table,$role){
        $sql = "SELECT * FROM $table $role ORDER BY id DESC";
        $statement = $this->pdo->prepare($sql);
//        echo $sql;die();
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }
    public function joinLeft($table1,$table2,$key1,$key2){
        $sql = "SELECT $table1.*,$table2.*,$table1.id as id1 FROM $table1 LEFT JOIN $table2 on $table1.$key1 = $table2.$key2  ORDER BY $table1.id DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function joinLeftWithWhere($table1,$table2,$key1,$key2,$role){
        $sql = "SELECT $table1.*,$table2.*,$table1.id as id1 FROM $table1 LEFT JOIN $table2 on $table1.$key1 = $table2.$key2 $role  ORDER BY $table1.id DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function joinLeftOne($table1,$table2,$key1,$key2,$id){
        $sql = "SELECT $table1.*,$table2.*,$table1.id as id1 FROM $table1 LEFT JOIN $table2 on $table1.$key1 = $table2.$key2 WHERE $table1.id = $id ORDER BY $table1.id DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function wheres($table,$role){
        $sql = "SELECT * FROM $table $role ";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function getOne($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_OBJ);
        return $result;
    }
    public function existInfo($table,$data){

        $keys = array_keys($data);
        $stringOfKeys = implode(',', $keys);
        $placeholders = ":" . implode(', :', $keys);
        $sql = "SELECT * FROM $table WHERE $stringOfKeys=$placeholders";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
        $result = $statement->fetch(\PDO::FETCH_OBJ);
        if(empty($result)){
            $result=false;
        }
        return $result;
    }

    public function insert($table, $data)
    {

        $keys = array_keys($data);
        $stringOfKeys = implode(',', $keys);
        $placeholders = ":" . implode(', :', $keys);
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data); //true || false
        return $this->pdo->lastInsertId();
    }

    public function update($table, $data)
    {
        $fields = '';
        foreach($data as $key => $value)
        {
            if($key!="id")
                $fields .= $key . "=:" . $key . ",";
        }
        $fields = rtrim($fields, ',');
        $sql = "UPDATE $table SET $fields WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($data); // true || false
    }

    public function delete($table, $id)
    {
            $sql = "DELETE FROM $table WHERE id=:id";
            $statement = $this->pdo->prepare($sql);
            $statement->bindParam(":id", $id);
            return $statement->execute();
    }
}
