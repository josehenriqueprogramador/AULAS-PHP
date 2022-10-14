<?php
class Sql {
    private $pdo;
    private $query;

    public function __construct()
    {
        try {
            $this->pdo = new PDO(DNS,MYSQL_USER,MYSQL_PASSWORD);
        } catch (PDOException $e) {
            WSError("Erro: ".utf8_encode($e->getMessage()),WS_ERROR,TRUE);
        }
    }

    public function query($rawQuery, $params = array())
    {
        //Prepara a Query Bruta $rawQuery
        $stmt = $this->pdo->prepare($rawQuery);
        //Faz a substituição dos parametros da query
        $this->setParams($stmt, $params);
        //Executa a query
        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = array())
    {
        $stmt = $this->query($rawQuery,$params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function setParams($statement, $parameters = array())
    {
        foreach($parameters as $key => $value){
            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $campo, $valor)
    {
        $statement->bindParam($campo, $valor);
    }
}
