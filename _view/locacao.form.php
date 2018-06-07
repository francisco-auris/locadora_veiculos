<a href="?window=aluguel" class="btn btn-link btn-sm icon-sm pr-0"><i class="material-icons icon-sm float-left mt-1 mr-2">keyboard_backspace</i> Voltar</a>
<br>
Cadastro de Locação de Veiculo
<br>
<br>
<form method="post" action="?window=aluguel&p=novo&act=salvar">
<div class="jumbotron pt-3 pb-3">

    <div class="row">

        <div class="col-12">
            <label>Cliente: <sup class="text-danger">*</sup></label>
            <select class="form-control form-control-sm" name="cliente">
            <?php
            if( $clientes == false ){
                Message::setMessage( ['info', 'Nenhuma categoria cadastrada', 'Aluguel'] );
            }
            else {
                echo '<option value="">-- Selecione --</option>';
                for( $i=0; $i < count($clientes); $i++ ){
                    echo '<option value="'.$clientes[$i]->id_cliente.'">'.utf8_encode($clientes[$i]->cli_nome).'</option>';
                }
            }
            ?>
                
            </select>
        </div>
        <div class="col-5">
            <label>Veiculo: <sup class="text-danger">*</sup></label>
            <select class="form-control form-control-sm" name="veiculo">
            <?php
            if( $veiculos == false ){
                Message::setMessage( ['info', 'Nenhuma categoria cadastrada', 'Aluguel'] );
            }
            else {
                echo '<option value="">-- Selecione --</option>';
                for( $i=0; $i < count($veiculos); $i++ ){
                    echo '<option value="'.$veiculos[$i]->id_veiculo.'">'.utf8_encode($veiculos[$i]->veiculo_descricao).'</option>';
                }
            }
            ?>
                
            </select>
        </div>
        <div class="col-3">
            <label>Data inicio: <sup class="text-danger">*</sup></label>
            <input type="date" name="datainicio" class="form-control form-control-sm" required>
        </div>
        <div class="col-3">
            <label>Data Fim: <sup class="text-danger">*</sup></label>
            <input type="date" name="datafim" class="form-control form-control-sm" required>
        </div>
        <div class="col-12">
            <br><br>
            <?php Controller\Message::getMessage( 'Aluguel' ); ?>
        </div>
    </div>

</div>

<button type="submit" class="btn btn-success btn-sm"><i class="material-icons float-left icon-sm mr-1 mt-1">save</i> Salvar</button>
</form>