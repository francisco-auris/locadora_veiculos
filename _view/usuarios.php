<br>
<h6>Usuários</h6>
<a href="?window=usuario&p=novo" class="btn btn-primary btn-sm float-right mb-3">+ Adicionar</a>
<br>
<table class="table table-striped table-bordered table-sm">
    <thead>
        <td>ID</td>
        <td>Nome</td>
        <td>Login</td>
    </thead>
</table>
<?php
if( $dados != false ){

    print_r($dados);

}
else {
    echo '<center>Nenhum usuário cadastrado</center>';
}