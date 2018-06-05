<?php
namespace Model;

use Controller\Connect as Connect;
use \PDO as PDO;

class MLocacao extends Connect {

    private $id;
    private $veiculo;
    private $dtinicio;
    private $dtfim;

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

    //private function vefs
    private function vefLocacao( $veiculo, $dtinicio, $dtfim ){
        //$sql = "SELECT * FROM locacao WHERE id_veiculo='".$veiculo".' AND data_
    }

    protected function actionCreate(){

        $sql = 'INSERT INTO locacao (id_veiculo,data_inicio,data_fim) VALUES (:veiculo, :dtinicio, :dtfim)';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":veiculo", $this->veiculo, PDO::PARAM_INT );
        $query->bindParam( ":dtinicio", $this->dtinicio, PDO::PARAM_STR );
        $query->bindParam( ":dtfim", $this->dtfim, PDO::PARAM_STR );

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