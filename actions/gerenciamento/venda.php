<br/><br/>
<center><h1>Gerencia de Vendas</h1></center>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Comprador</th>
        <th scope="col">Valor</th>
        <th scope="col">Ação</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if (!isset($_SESSION['qtd_venda'])){
        $_SESSION['qtd_venda'] = 1;
    }

    $qtd_venda = $_SESSION['qtd_venda'];
    $totalizador = 0;

    for ($j = 1; $j < $qtd_venda; $j++){
        $valor_final = 0;

        if (!isset($_SESSION['venda'][$j]['id'])){
            continue;
        }

        $id_venda = $_SESSION['venda'][$j]['id'];
        $id_cliente = $_SESSION['venda'][$j]['cliente'];
        $nome_cliente = $_SESSION['cliente'][$id_cliente]['nome'];

        $qtd_produto_venda = $_SESSION['qtd_produto_venda'];

        for ($w = 1; $w < $qtd_produto_venda; $w++){
            if ($_SESSION['produto_venda'][$w]['id_venda'] != $id_venda){
                continue;
            }

            $id_prod = $_SESSION['produto_venda'][$w]['id_produto'];
            $preco = (int)str_replace(",", "", $_SESSION['produto'][$id_prod]['preco']);
            $qtd = $_SESSION['produto_venda'][$w]['quantidade'];
            $valor_final += $qtd * $preco;
            $totalizador += $qtd * $preco;
        }

        $valorFinal = substr_replace($valor_final, ',', -2, 0);

        echo "<tr>";
        echo "<th scope='row'>$id_venda</th>";
        echo "<td>$nome_cliente</td>";
        echo "<td> R$ $valorFinal</td>";
        echo "<td><a href='/actions/exclusao/venda.php?id=$id_venda'><button type='button' class='btn btn-danger'>Excluir</button></a></td></td>";
        echo "</tr>";
    }

    if ($totalizador != 0){
        $totalizador = substr_replace($totalizador, ',', -2, 0);
    }

    echo "<tr>";
    echo "<th scope='row'>TOTAL</th>";
    echo "<td></td>";
    echo "<th scope='row'> R$ $totalizador</th>";
    echo "</tr>";
    ?>
    <tbody>
</table>