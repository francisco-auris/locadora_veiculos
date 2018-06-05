<?php
namespace Model;

use Controller\Connect as Connect;
use \PDO as PDO;

class MFuncionario extends Connect {

    private $id;
    private $nome;
    private $cargo;
    private $salario;

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

        $sql = 'INSERT INTO funcionarios (func_nomecompleto,func_cargo,func_salario) VALUES (:nome, :cargo, :salario)';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":nome", $this->nome, PDO::PARAM_STR );
        $query->bindParam( ":cargo", $this->cargo, PDO::PARAM_STR );
        $query->bindParam( ":salario", $this->salario, PDO::PARAM_STR );

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

    public function listaFuncionarios(){

        $sql = "SELECT * FROM funcionarios";
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