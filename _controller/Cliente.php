<?php
namespace Controller;

use Model\MCliente as MCliente;

class Cliente extends MCliente {

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
        require_once '_view/cliente.form.php';
    }

    private function zoneInit()
    {
        $dados = $this->listaClientes();

        require_once '_view/clientes.php';
    }

}