<br>
<h6>Clientes</h6>
<a href="?window=funcionario&p=novo" class="btn btn-primary btn-sm float-right mb-3">+ Adicionar</a>
<br>
<table class="table table-striped table-bordered table-sm">
    <thead>
        <td>ID</td>
        <td>Nome</td>
        <td>Data Nascimento</td>
        <td>CPF</td>
    </thead>
<?php
if( $dados != false ){

    echo '<tbody>';
    //print_r($dados);
    for( $i=0; $i < count($dados); $i++ ){

        echo '<tr>';
            echo '<td>'.$dados[$i]->id_cliente.'</td>';
            echo '<td>'.utf8_encode($dados[$i]->cli_nome).'</td>';
            echo '<td>'.utf8_encode($dados[$i]->cli_datanascimento).'</td>';
            echo '<td>'.$dados[$i]->cpf_cliente.'</td>';
        echo '</tr>';

    }

    echo '</tbody>';

}
else {
    echo '<center>Nenhum usuário cadastrado</center>';
}
?>
</table>