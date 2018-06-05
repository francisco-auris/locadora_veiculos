<br>
<h6>Carros</h6>
<a href="?window=carro&p=novo" class="btn btn-primary btn-sm float-right mb-3">+ Adicionar</a>
<br>
<table class="table table-striped table-bordered table-sm">
    <thead>
        <td>ID</td>
        <td>Veiculo</td>
        <td>Cat.</td>
        <td>Placa</td>
        <td>Cor</td>
        <td>Ano</td>
    </thead>
<?php
if( $dados != false ){

    echo '<tbody>';
    //print_r($dados);
    for( $i=0; $i < count($dados); $i++ ){

        echo '<tr>';
            echo '<td>'.$dados[$i]->id_veiculo.'</td>';
            echo '<td>'.utf8_encode($dados[$i]->veiculo_descricao).'</td>';
            echo '<td>'.utf8_encode($dados[$i]->cat_descricao).'</td>';
            echo '<td>'.$dados[$i]->veiculo_placa.'</td>';
            echo '<td>'.$dados[$i]->veiculo_cor.'</td>';
            echo '<td>'.$dados[$i]->veiculo_ano.'</td>';
            echo '<td width="5%"><i class="material-icons text-danger float-left">delete</i></td>';
        echo '</tr>';

    }

    echo '</tbody>';

}
else {
    echo '<center>Nenhum usuário cadastrado</center>';
}
?>
</table>