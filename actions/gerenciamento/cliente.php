<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if (!isset($_SESSION['cliente'])){
                $_SESSION['qtd_cliente'] = 1;
            }

            $qtd_cliente = $_SESSION['qtd_cliente']; 

            for ($i = 1; $i < $qtd_cliente; $i++){
                if (!isset($_SESSION['cliente'][$i])){
                    continue;
                }

                echo "<tr>";

                $id_cliente = $_SESSION['cliente'][$i]['id'];
                $nome_cliente = $_SESSION['cliente'][$i]['nome'];
                $email_cliente = $_SESSION['cliente'][$i]['email'];
                $telefone_cliente = $_SESSION['cliente'][$i]['telefone'];
                $cidade_cliente = $_SESSION['cliente'][$i]['cidade'];
                $estado_cliente = $_SESSION['cliente'][$i]['estado'];

                echo "<th scope='row'>$id_cliente</th>";
                echo "<td>$nome_cliente</td>";
                echo "<td>$email_cliente</td>";
                echo "<td>$telefone_cliente</td>";
                echo "<td>$cidade_cliente</td>";
                echo "<td>$estado_cliente</td>";
                echo "<td><a href='/editar/cliente?id=$id_cliente'><button type='button' class='btn btn-warning'>Editar</button></a>&nbsp;&nbsp;<a href='/actions/exclusao/cliente.php?id=$id_cliente'><button type='button' class='btn btn-danger'>Excluir</button></a></td></td>";

                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>