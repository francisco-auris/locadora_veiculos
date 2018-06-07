<?php
namespace Model;

use Controller\Connect as Connect;
use \PDO as PDO;

class MLocacao extends Connect {

    private $id;
    private $cliente;
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
    public function vefLocacao( $veiculo, $dtini, $dtfim ){
        
        $sql = "SELECT verifica_locacao(".$veiculo.", '".$dtini."','".$dtfim."') as valor";
        $query = $this->conn->query( $sql );
        if( $query and $query->rowCount() > 0 ){
            return $query->fetch(PDO::FETCH_ASSOC)['valor'];
        }else {
            false;
        }
    }

    protected function actionCreate(){

        $sql = 'INSERT INTO locacao (id_veiculo,id_cliente,data_inicio,data_fim) VALUES (:veiculo, :cliente, :dtinicio, :dtfim)';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":veiculo", $this->veiculo, PDO::PARAM_INT );
        $query->bindParam( ":cliente", $this->cliente, PDO::PARAM_INT );
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

    public function listaLocacoes(){

        $sql = "SELECT * FROM locacao L INNER JOIN veiculo V ON L.id_veiculo = V.id_veiculo INNER JOIN clientes C ON L.id_cliente = C.id_cliente";
        $consulta = $this->conn->query( $sql );

        if( $consulta and $consulta->rowCount() > 0 ){
            $objeto = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objeto;
        }
        else {
            return false;
        }

    }


}