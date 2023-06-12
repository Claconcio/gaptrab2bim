<br/><br/>
<form id="cadastro_vendas" action="actions/cadastro/venda.php" method="post">
    <div class="row">
        <div class="form-group" style="text-align: left">
            <label for="cliente">Cliente</label>
            <select name="cliente" class="form-control" id="cliente" form="cadastro_vendas">
                <?php

                if (!isset($_SESSION['cliente'])){
                    $_SESSION['qtd_cliente'] = 1;
                }

                $qtd_cliente = $_SESSION['qtd_cliente'];

                for ($i = 1; $i < $qtd_cliente; $i++){
                    $id_cliente = $_SESSION['cliente'][$i]['id'];
                    $nome_cliente = $_SESSION['cliente'][$i]['nome'];

                    echo "<option value=$id_cliente>$nome_cliente</option>";
                }
                ?>
            </select>
        </div>
        <br/>

        <div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Medida</th>
                    <th scope="col">Quantidade</th>
                </tr>
                </thead>
                <tbody>
                <?php

                if (!isset($_SESSION['produto'])){
                    $_SESSION['qtd_produto'] = 1;
                }

                $qtd_produto = $_SESSION['qtd_produto'];

                for ($i = 1; $i < $qtd_produto; $i++){
                    if (!isset($_SESSION['produto'][$i])){
                        continue;
                    }

                    echo "<tr>";

                    $id_produto = $_SESSION['produto'][$i]['id'];
                    $nome_produto = $_SESSION['produto'][$i]['nome'];
                    $marca_produto = $_SESSION['produto'][$i]['marca'];
                    $preco_produto = $_SESSION['produto'][$i]['preco'];
                    $medida_produto = $_SESSION['produto'][$i]['medida'];

                    echo "<th scope='row'>$id_produto</th>";
                    echo "<td>$nome_produto</td>";
                    echo "<td>$marca_produto</td>";
                    echo "<td>$preco_produto</td>";
                    echo "<td>$medida_produto</td>";
                    echo "<td><div class='row'><div class='col-1'><input type='checkbox' id='$id_produto' name='$id_produto'></div><div class='col-11'><input type='number' id='qtd_produto_$id_produto' name='qtd_produto_$id_produto' class='form-control' placeholder='Insira a quantidade' disabled></div></div></td>";

                    echo "</tr>";
                }

                ?>
                <tbody>
            </table>
        </div>
    </div>
    <br/>
    <center>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>
    </center>
    <?php
    if(isset($_SESSION['venda_cadastrada'])):
        ?>
        <br/><br/>
        <div class="alert alert-success" role="alert">
            Venda <b>cadastrada</b> com sucesso!
        </div>
    <?php
    endif;
    unset($_SESSION['venda_cadastrada']);

    if (isset($_SESSION['venda_excluida'])):
        ?>
        <br/><br/>
        <div class="alert alert-danger" role="alert">
            Venda <b>excluída</b> com sucesso!
        </div>
    <?php
    endif;
    unset($_SESSION['venda_excluida']);
    ?>
</form>
<script>
    <?php

    for ($i = 1; $i < $qtd_produto; $i++){
        if (!isset($_SESSION['produto'][$i])){
            continue;
        }

        $id_produto = $_SESSION['produto'][$i]['id'];
        $nome_produto = $_SESSION['produto'][$i]['nome'];
        $marca_produto = $_SESSION['produto'][$i]['marca'];
        $preco_produto = $_SESSION['produto'][$i]['preco'];

        echo "document.getElementById('$id_produto').onchange = function() {
              document.getElementById('qtd_produto_$id_produto').disabled = !this.checked;

              if (document.getElementById('qtd_produto_$id_produto').disabled) {
                document.getElementById('qtd_produto_$id_produto').value = '';
              } else {
                document.getElementById('qtd_produto_$id_produto').value = 1;
              }
            };";
    }

    ?>
</script>
</div>
</center>

<br/><br/>

<?php

require("actions/gerenciamento/venda.php");

?>