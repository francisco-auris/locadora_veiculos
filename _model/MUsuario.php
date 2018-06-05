<?php
namespace Model;

use Controller\Connect as Connect;
use \PDO as PDO;

class MUsuario extends Connect {
    
    private $id;
    private $nome;
    private $login;
    private $senha;
    private $conn;

    function __construct(){

        //mount var connection
        $this->conn = $this->connLocal();

    }
    //privates/protecteds functions

    protected function actionCreate(){

        $sql = 'INSERT INTO usuario (nome,login,senha) VALUES (:nome, :login, :senha)';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":nome", $this->nome, PDO::PARAM_STR );
        $query->bindParam( ":login", $this->login, PDO::PARAM_STR );
        $query->bindParam( ":senha", $this->senha, PDO::PARAM_STR );

        try {

            $query->Execute();
            return true;

        }
        catch( PDOException $e ){
            return $e->getMessage();
        }

    }

    //public function
    public function searchLogin( $login, $senha ){

        $sql = 'SELECT * FROM usuarios WHERE user_login= :login AND user_senha= :senha';
        $consulta = $this->conn->prepare( $sql );

        $consulta->bindParam(":login", $login, PDO::PARAM_STR);
        $consulta->bindParam(":senha", $senha, PDO::PARAM_STR);

        if( $consulta->execute() and $consulta->rowCount() > 0 ){

            $obj = $consulta->fetch(PDO::FETCH_ASSOC);
            return $obj;

        }
        else {

            return false;

        }

    }

    public function listaUsuarios(){

        $sql = "SELECT * FROM usuarios";
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