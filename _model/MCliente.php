<?php
namespace Model;

use Controller\Connect as Connect;
use \PDO as PDO;

class MCliente extends Connect {

    private $id;
    private $nome;
    private $dtnascimento;
    private $cpf;

    function __set( $atb, $vl ){
        $this->$atb = $vl;
    }
    function __get( $atb ){
        return $this->$atb;
    }

    private $conn;

    function __construct(){

        //mount var connection
        $this->conn = $this->connLocal();

    }

    protected function actionCreate(){

        $sql = 'INSERT INTO clientes (cli_nome,cli_datanascimento,cpf_cliente) VALUES (:nome, :data, :cpf)';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":nome", $this->nome, PDO::PARAM_STR );
        $query->bindParam( ":data", $this->dtnascimento, PDO::PARAM_STR );
        $query->bindParam( ":cpf", $this->cpf, PDO::PARAM_STR );

        try {

            $query->Execute();
            return true;

        }
        catch( PDOException $e ){
            return $e->getMessage();
        }

    }

    protected function actionUpdate(){

        $sql = 'UPDATE clientes SET cli_nome= :nome,cli_datanascimento= :data,cpf_cliente= :cpf WHERE id_func= :id';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":nome", $this->nome, PDO::PARAM_STR );
        $query->bindParam( ":data", $this->dtnascimento, PDO::PARAM_STR );
        $query->bindParam( ":cpf", $this->cpf, PDO::PARAM_STR );
        $query->bindParam( ":id", $this->id, PDO::PARAM_INT);

        try {

            $query->Execute();
            return true;

        }
        catch( PDOException $e ){
            return $e->getMessage();
        }

    }

    protected function actionDelete(){

        $sql = 'DELETE FROM clientes WHERE id_cliente= :id';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":id", $this->id, PDO::PARAM_INT);

        try {

            $query->Execute();
            return true;

        }
        catch( PDOException $e ){
            return $e->getMessage();
        }

    }


}