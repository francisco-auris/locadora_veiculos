<?php
namespace Controller;

use Model\MLocacao as MLocacao;

class Aluguel extends MLocacao {

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
        $inst = new \Model\MCliente;
        $clientes = $inst->listaClientes();

        $inst2 = new \Model\MVeiculo;
        $veiculos = $inst2->listaVeiculos();

        require_once '_view/locacao.form.php';

        if( isset($_GET['act']) AND $_GET['act'] == 'salvar' ){
            $this->actNovoVeiculo();
            //print_r($_POST);
        }
    }

    private function zoneInit()
    {
        $dados = $this->listaLocacoes();

        require_once '_view/locacao.php';
    }

    //actions
    private function actNovoVeiculo(){

        //vars
        $veiculo = (isset($_POST['veiculo']) and strlen($_POST['veiculo']) > 0) ? $_POST['veiculo'] : null;
        $cliente = (isset($_POST['cliente']) and strlen($_POST['cliente']) > 0) ? $_POST['cliente'] : null;
        $datainicio = (isset($_POST['datainicio']) and strlen($_POST['datainicio']) > 0) ? $_POST['datainicio'] : null;
        $datafim = (isset($_POST['datafim']) and strlen($_POST['datafim']) > 0) ? $_POST['datafim'] : null;

        if( $veiculo == null OR $cliente == null OR $datafim == null OR $datainicio == null ){
            Message::setMessage( ['warning', 'Verifique o preenchimento dos campos.', 'Aluguel'] );
        }
        else {

            //enviar para modelagem no banco
            $this->veiculo  = $veiculo;
            $this->cliente   = $cliente;
            $this->dtinicio  = $datainicio;
            $this->dtfim    = $datafim;

            //action exec
            //verifica locacao
            $vefdata = $this->vefLocacao( $veiculo, $datainicio, $datafim );

            if( $vefdata > 0 ){
                Message::setMessage( ['warning', 'Este veiculo ja está alugado neste periodo de tempo', 'Aluguel'] );
                echo '<script>window.location.href="?window=aluguel&p=novo";</script>';
                exit;
            }
            else if( $dataFimVef == 0 AND $dataIniVef == 0 ){

                $act = $this->actionCreate();

                if( $act == true ){
                    Message::setMessage( ['success', 'Aluguel cadastrado', 'Aluguel'] );
                    echo '<script>window.location.href="?window=aluguel&p=novo";</script>';
                }
                else {
                    Message::setMessage( ['danger', 'Error: '.$act, 'Aluguel'] );
                }

            }
            

        }

    }

}