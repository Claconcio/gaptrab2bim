<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Marca</th>
                <th scope="col">Preço</th>
                <th scope="col">Medida</th>
                <th scope="col">Ação</th>
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
                echo "<td><a href='/editar/produto?id=$id_produto'><button type='button' class='btn btn-warning'>Editar</button></a>&nbsp;&nbsp;<a href='/actions/exclusao/produto.php?id=$id_produto'><button type='button' class='btn btn-danger'>Excluir</button></a></td></td>";

                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>