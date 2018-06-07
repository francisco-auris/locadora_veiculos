<?php
namespace Controller;

use Model\MVeiculo as MVeiculo;

class Carro extends MVeiculo {

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
        $categorias = $this->listaCategorias();

        require_once '_view/carro.form.php';

        if( isset($_GET['act']) AND $_GET['act'] == 'salvar' ){
            $this->actNovoVeiculo();
            //print_r($_POST);
        }
    }

    private function zoneInit()
    {
        $dados = $this->listaVeiculos();

        require_once '_view/carros.php';
    }

    //actions
    private function actNovoVeiculo(){

        //vars
        $categoria = (isset($_POST['categoria']) and strlen($_POST['categoria']) > 0) ? $_POST['categoria'] : null;
        $nome = (isset($_POST['nome']) and strlen($_POST['nome']) > 0) ? $_POST['nome'] : null;
        $placa = (isset($_POST['placa']) and strlen($_POST['placa']) > 0) ? $_POST['placa'] : null;
        $cor = (isset($_POST['cor']) and strlen($_POST['cor']) > 0) ? $_POST['cor'] : null;
        $ano = (isset($_POST['ano']) and strlen($_POST['ano']) > 0) ? $_POST['ano'] : null;

        if( $categoria == null OR $nome == null OR $placa == null OR $cor == null OR $ano == null ){
            Message::setMessage( ['warning', 'Verifique o preenchimento dos campos.', 'Carro'] );
        }
        else {

            //enviar para modelagem no banco
            $this->idcat  = $categoria;
            $this->desc   = $nome;
            $this->placa  = $placa;
            $this->cor    = $cor;
            $this->ano    = $ano;

            //action exec
            $act = $this->actionCreate();

            if( $act == true ){
                Message::setMessage( ['success', 'Veiculo cadastrado', 'Carro'] );
                echo '<script>window.location.href="?window=carro&p=novo";</script>';
            }
            else {
                Message::setMessage( ['danger', 'Error: '.$act, 'Carro'] );
            }

        }

    }

}