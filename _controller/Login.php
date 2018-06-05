<?php
namespace Controller;

use Model\MUsuario as Usuario;
use Controller\Html as Html;
use Controller\Message as Message;

class Login extends Usuario {
    
    private $action = ['entrar','sair'];

    function __construct(){
        
        $action = ( isset($_GET['action']) and strlen($_GET['action']) > 0 ) ? $_GET['action'] : null;
        //vef action
        if( $action != null and in_array( $action, $this->action ) ){

            parent::__construct();

            $this->$action();

        }
        
        $this->mountWindow(); //monta tela

    }

    private function mountWindow(){

        Html::getHeader( 'Login' );

        Html::incView( 'login' );

        Html::getFooter();

    }

    public function entrar()
    {
        //action entrar
        $login = ( isset($_POST['app_login']) and strlen(str_replace(" ","",$_POST['app_login'])) > 0 ) ? $_POST['app_login'] : null;
        $senha = ( isset($_POST['app_senha']) and strlen(str_replace(" ","",$_POST['app_senha'])) > 0 ) ? $_POST['app_senha'] : null;

        if( $login == null or $senha == null )
        {
            Message::setMessage( ['warning', 'Verifique campos de usuário e senha', 'Login'] );
           
        }
        else {
            
            //verifica usuario no banco
            $vef_usr = $this->searchLogin( $login, $senha );
            if( $vef_usr === false ){

                Message::setMessage( ['danger', 'Usuário ou senha incorreta(s).', 'Login'] );

            }
            else {
                //cria session de usuario
                $_SESSION[SS_LOGIN] = $vef_usr['user_login'];
                $_SESSION[SS_NAME] = $vef_usr['func_nomecompleto'];
                $_SESSION[SS_ID] = base64_encode($vef_usr['id_user']);

                header('Location: .');

            }

        }
    }

    public function sair(){

        if( isset($_SESSION[SS_LOGIN]) ){
            
            unset( $_SESSION[SS_LOGIN] );
            unset( $_SESSION[SS_NAME] );
            unset( $_SESSION[SS_ID] );

            header('Location: .');
        }

    }

}