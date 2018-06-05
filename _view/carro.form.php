<a href="?window=usuario" class="btn btn-link btn-sm icon-sm pr-0"><i class="material-icons icon-sm float-left mt-1 mr-2">keyboard_backspace</i> Voltar</a>
<br>
Cadastro de Veiculo
<br>
<br>
<form method="post" action="?window=usuario&p=novo&act=salvar">
<div class="jumbotron pt-3">

    <div class="row">

        <div class="col-4">
            <label>Categorai:</label>
            <select class="form-control form-control-sm">
                <option value="">-- Selecione --</option>
            </select>
        </div>
        <div class="col-8">
            <label>Nome:</label>
            <input type="text" class="form-control form-control-sm" placeholder="Digite o nome" maxlength="100" required>
        </div>
        <div class="col-4">
            <label>Placa:</label>
            <input type="text" class="form-control form-control-sm" placeholder="AAA-0000" maxlength="8" required>
        </div>
        <div class="col-4">
            <label>Cor:</label>
            <input type="text" class="form-control form-control-sm" placeholder="Confirme senha" maxlength="20" required>
        </div>
        <div class="col-4">
            <label>Ano:</label>
            <input type="number" min=0 class="form-control form-control-sm"  required>
        </div>
    </div>

</div>

<button type="submit" class="btn btn-success btn-sm"><i class="material-icons float-left icon-sm mr-1 mt-1">save</i> Salvar</button>
</form>