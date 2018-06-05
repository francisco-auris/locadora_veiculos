<br>
<h6>Funcionários</h6>
<a href="?window=funcionario&p=novo" class="btn btn-primary btn-sm float-right mb-3">+ Adicionar</a>
<br>
<table class="table table-striped table-bordered table-sm">
    <thead>
        <td>ID</td>
        <td>Nome</td>
        <td>Cargo</td>
        <td>Salario</td>
    </thead>
<?php
if( $dados != false ){

    echo '<tbody>';
    //print_r($dados);
    for( $i=0; $i < count($dados); $i++ ){

        echo '<tr>';
            echo '<td>'.$dados[$i]->id_func.'</td>';
            echo '<td>'.utf8_encode($dados[$i]->func_nomecompleto).'</td>';
            echo '<td>'.utf8_encode($dados[$i]->func_cargo).'</td>';
            echo '<td>'.$dados[$i]->func_salario.'</td>';
        echo '</tr>';

    }

    echo '</tbody>';

}
else {
    echo '<center>Nenhum usuário cadastrado</center>';
}
?>
</table>