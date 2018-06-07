<?php
namespace Controller;

use Model\MUsuario as MUsuario;

class Usuario extends MUsuario {

    private $zones = ['novo','deletar'];

    function __construct()
    {

        parent::__construct();
        
        //navigator form
        if( isset($_GET['p']) and strlen(str_replace(" ","",$_GET['p'])) > 0){
            if( in_array( $_GET['p'], $this->zones ) ){
            
                $_p = $_GET['p'];
                switch ($_p) {
                    case 'novo':
                        $this->zoneNovo();
                        break;
                    case 'deletar':
                        $this->zoneDeleta();
                        break;
                    default:
                        # code...
                        break;
                }

            }
            else {
                Controller\Message::setMessage( ['info','Página não encontrada.','*'] );
            }

        }
        else {

            $this->zoneInit();

        }

    }

    //zonas de forma da tela
    private function zoneNovo()
    {
        //code ...
        $inst = new \Model\MFuncionario;
        $func = $inst->listaFuncionarios(); //captura lista de funcionarios

        require_once '_view/usuario.form.php';

        if( isset($_GET['act']) AND $_GET['act'] == 'salvar' ){
            $this->actNovoUsuario();
            //print_r($_POST);
        }
    }

    private function zoneInit()
    {
        $dados = $this->listaUsuarios();

        require_once '_view/usuarios.php';
    }

    //actions
    private function actNovoUsuario(){

        //vars
        $funcionario = (isset($_POST['funcionario']) and strlen($_POST['funcionario']) > 0) ? $_POST['funcionario'] : null;
        $login = (isset($_POST['login']) and strlen($_POST['login']) > 2) ? $_POST['login'] : null;
        $senha = (isset($_POST['senha']) and strlen($_POST['senha']) > 0) ? $_POST['senha'] : null;

        if( $funcionario == null OR $login == null OR $senha == null ){
            Message::setMessage( ['warning', 'Verifique o preenchimento dos campos.', 'Usuario'] );
        }
        else {

            //enviar para modelagem no banco
            $this->idfunc = $funcionario;
            $this->login  = $login;
            $this->senha  = $senha;

            //action exec
            $act = $this->actionCreate();

            if( $act == true ){
                Message::setMessage( ['success', 'Usuário cadastrado', 'Usuario'] );
                echo '<script>window.location.href="?window=usuario&p=novo";</script>';
            }
            else {
                Message::setMessage( ['danger', 'Error: '.$act, 'Usuario'] );
            }

        }

    }

}