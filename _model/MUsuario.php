<?php
namespace Model;

use Controller\Connect as Connect;
use \PDO as PDO;

class MUsuario extends Connect {
    
    private $id;
    protected $idfunc;
    protected $login;
    protected $senha;
    private $conn;

    function __construct(){

        //mount var connection
        $this->conn = $this->connLocal();

    }
    //privates/protecteds functions

    protected function actionCreate(){

        $sql = 'INSERT INTO usuarios (id_func,user_login,user_senha) VALUES (:idfunc, :login, :senha)';

        $query = $this->conn->prepare( $sql );

        $query->bindParam( ":idfunc", $this->idfunc, PDO::PARAM_INT );
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

        $sql = 'SELECT * FROM usuarios U INNER JOIN funcionarios F ON U.id_func = F.id_func WHERE U.user_login= :login AND U.user_senha= :senha';
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

        $sql = "SELECT * FROM usuarios U INNER JOIN funcionarios F ON U.id_func = F.id_func";
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