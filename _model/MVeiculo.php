<?php
namespace Model;

use Controller\Connect as Connect;
use \PDO as PDO;

class MVeiculo extends Connect {

    private $id;
    private $idcat;
    private $desc;
    private $placa;
    private $cor;
    private $ano;

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

        $sql = 'INSERT INTO veiculo (id_cat,veiculo_descricao,veiculo_placa,veiculo_cor,veiculo_ano) VALUES (:idcat, :desc, :placa, :cor, :ano)';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":idcat", $this->idcat, PDO::PARAM_INT );
        $query->bindParam( ":desc", $this->desc, PDO::PARAM_STR );
        $query->bindParam( ":placa", $this->placa, PDO::PARAM_STR );
        $query->bindParam( ":cor", $this->cor, PDO::PARAM_STR );
        $query->bindParam( ":ano", $this->ano, PDO::PARAM_INT );

        try {

            $query->Execute();
            return true;

        }
        catch( PDOException $e ){
            return $e->getMessage();
        }

    }

    protected function actionUpdate(){

        $sql = 'UPDATE funcionarios SET func_nomecompleto= :nome,func_cargo= :cargo,func_salario= :salario WHERE id_func= :id';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":nome", $this->nome, PDO::PARAM_STR );
        $query->bindParam( ":cargo", $this->cargo, PDO::PARAM_STR );
        $query->bindParam( ":salario", $this->salario, PDO::PARAM_STR );
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

        $sql = 'DELETE FROM funcionarios WHERE id_func= :id';

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

    public function listaVeiculos(){

        $sql = "SELECT * FROM veiculo V INNER JOIN cat_veiculo C ON V.id_cat = C.id_cat";
        $consulta = $this->conn->query( $sql );

        if( $consulta and $consulta->rowCount() > 0 ){
            $objeto = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objeto;
        }
        else {
            return false;
        }

    }

    public function listaCategorias(){

        $sql = "SELECT * FROM cat_veiculo";
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