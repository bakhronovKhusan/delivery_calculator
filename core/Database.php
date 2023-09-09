<?php
namespace Core;
class Database
{
    public $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new \PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, DB_LOGIN, DB_PASS);

        }catch (\Exception $exception){
            echo $exception->getMessage();
        }
    }
    public function query($sql)
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute(); //true || false
        $results = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $results;
    }
}
