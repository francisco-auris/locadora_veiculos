<a href="?window=usuario" class="btn btn-link btn-sm icon-sm pr-0"><i class="material-icons icon-sm float-left mt-1 mr-2">keyboard_backspace</i> Voltar</a>
<br>
Cadastro de usuário
<br>
<br>
<form method="post" action="?window=usuario&p=novo&act=salvar">
<div class="jumbotron pt-3">

    <div class="row">

        <div class="col-12">
            <label>Nome:</label>
            <input type="text" class="form-control form-control-sm" placeholder="Digite o nome" maxlength="100" required>
        </div>
        <div class="col-6">
            <label>Login:</label>
            <input type="text" class="form-control form-control-sm" placeholder="Digite o nome" maxlength="100" required>
        </div>
        <div class="col-6">
            <label>Senha:</label>
            <input type="text" class="form-control form-control-sm" placeholder="Digite um login" maxlength="100" required>
        </div>
        <div class="col-6 ml-md-auto">
            <input type="text" class="form-control form-control-sm mt-2" placeholder="Confirme senha" maxlength="100" required>
        </div>
    </div>

</div>

<button type="submit" class="btn btn-success btn-sm"><i class="material-icons float-left icon-sm mr-1 mt-1">save</i> Salvar</button>
</form>