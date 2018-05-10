<?php

class QueryBuilder
{

    protected $pdo;
    
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($table, $params)
    {

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            $table,
            implode(', ', array_keys($params)),
            implode(', ', array_map(
                    function ($param){
                        return ":{$param}";
                    }, array_keys($params)
                )
            )
        );

        try{
            $statement = $this->pdo->prepare($sql);
            $statement->execute($params);
        }catch (Exception $e){
            die(var_dump($e->getMessage()));
        }        

    }

}

