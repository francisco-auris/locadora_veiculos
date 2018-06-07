<a href="?window=carro" class="btn btn-link btn-sm icon-sm pr-0"><i class="material-icons icon-sm float-left mt-1 mr-2">keyboard_backspace</i> Voltar</a>
<br>
Cadastro de Veiculo
<br>
<br>
<form method="post" action="?window=carro&p=novo&act=salvar">
<div class="jumbotron pt-3 pb-3">

    <div class="row">

        <div class="col-4">
            <label>Categoria: <sup class="text-danger">*</sup></label>
            <select class="form-control form-control-sm" name="categoria">
            <?php
            if( $categorias == false ){
                Message::setMessage( ['info', 'Nenhuma categoria cadastrada', 'Carro'] );
            }
            else {
                echo '<option value="">-- Selecione --</option>';
                for( $i=0; $i < count($categorias); $i++ ){
                    echo '<option value="'.$categorias[$i]->id_cat.'">'.utf8_encode($categorias[$i]->cat_descricao).'</option>';
                }
            }
            ?>
                
            </select>
        </div>
        <div class="col-8">
            <label>Nome: <sup class="text-danger">*</sup></label>
            <input type="text" name="nome" class="form-control form-control-sm" placeholder="Digite o nome" maxlength="100" required>
        </div>
        <div class="col-4">
            <label>Placa: <sup class="text-danger">*</sup></label>
            <input type="text" name="placa" class="form-control form-control-sm" placeholder="AAA0000" maxlength="7" required>
        </div>
        <div class="col-4">
            <label>Cor: <sup class="text-danger">*</sup></label>
            <input type="text" name="cor" class="form-control form-control-sm" placeholder="Cor do veiculo" maxlength="20" required>
        </div>
        <div class="col-4">
            <label>Ano: <sup class="text-danger">*</sup></label>
            <input type="number" name="ano" min=0 class="form-control form-control-sm" placeholder="2018" required>
        </div>
        <div class="col-12">
            <br><br>
            <?php Controller\Message::getMessage( 'Carro' ); ?>
        </div>
    </div>

</div>

<button type="submit" class="btn btn-success btn-sm"><i class="material-icons float-left icon-sm mr-1 mt-1">save</i> Salvar</button>
</form>