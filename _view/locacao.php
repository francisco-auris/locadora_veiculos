<br>
<h6>Aluguel de Veiculos</h6>
<a href="?window=aluguel&p=novo" class="btn btn-primary btn-sm float-right mb-3">+ Adicionar</a>
<br>
<table class="table table-striped table-bordered table-sm">
    <thead>
        <td>ID</td>
        <td>Veiculo</td>
        <td>Placa</td>
        <td>Cliente</td>   
        <td colspan="2" align="center">Período de Locação</td>
    </thead>
<?php
if( $dados != false ){

    echo '<tbody>';
    //print_r($dados);
    for( $i=0; $i < count($dados); $i++ ){

        echo '<tr>';
            echo '<td>'.$dados[$i]->id_locacao.'</td>';
            echo '<td>'.utf8_encode($dados[$i]->veiculo_descricao).'</td>';
            echo '<td>'.utf8_encode($dados[$i]->veiculo_placa).'</td>';
            echo '<td>'.$dados[$i]->cli_nome.'</td>';
            echo '<td align="center">'.date('d/m/Y', strtotime($dados[$i]->data_inicio)).'</td>';
            echo '<td align="center">'.date('d/m/Y', strtotime($dados[$i]->data_fim)).'</td>';
        echo '</tr>';

    }

    echo '</tbody>';

}
else {
    echo '<tr><td colspan="6"><center>Nenhuma locação cadastrada</center></td></tr>';
}
?>
</table>