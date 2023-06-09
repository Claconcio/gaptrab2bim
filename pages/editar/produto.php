<?php 

$id = $_GET['id'];

$qtd_produto = $_SESSION['qtd_produto']; 

for ($i = 1; $i < $qtd_produto; $i++){
    if ($i == $id){
        $id_produto = $_SESSION['produto'][$i]['id'];
        $nome_produto = $_SESSION['produto'][$i]['nome'];
        $marca_produto = $_SESSION['produto'][$i]['marca'];
        $preco_produto = $_SESSION['produto'][$i]['preco'];
        $medida_produto = $_SESSION['produto'][$i]['medida'];
    }
}

?>

<br/><br/>
<form action="../actions/edicao/produto.php" method="post">
    <input type="hidden" id="id_produto" name="id_produto" value="<?= $id_produto ?>">
    <div class="row">
        <div class="col">
            <div class="form-group" style="text-align: left">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Digite o nome do produto" value="<?= $nome_produto ?>" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" aria-describedby="preco" placeholder="Digite o preço do produto" value="<?= $preco_produto ?>" required>
            </div>
            <br/>
        </div>
        <div class="col">
            <div class="form-group" style="text-align: left">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" aria-describedby="marca" placeholder="Digite a marca do produto" value="<?= $marca_produto ?>" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="medida">Medida</label>
                <input type="tel" class="form-control" id="medida" name="medida" aria-describedby="medida" placeholder="Digite a medida do produto" value="<?= $medida_produto ?>" required>
            </div>
            <br/>
        </div>
    </div>
  <br/>
  <center>
      <button type="submit" class="btn btn-primary">Editar</button>
  </center>
  <?php
    if (isset($_SESSION['produto_existe'])):
  ?>
      <br/><br/>
      <div class="alert alert-warning" role="alert">
          Produto <b>existe</b>. Edição não pode ser realizada!
      </div>
  <?php
      endif;
      unset($_SESSION['produto_existe'])
  ?>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script>
    $('#preco').mask('#####0,00', {reverse: true});

    $('#preco').on('keyup', function() {
        if( $(this).val().length > 3 && $(this).val().length < 5) {
            mascara = '####00,00';
        } else if ($(this).val().length > 5) {
            mascara = '##.000,00';
        } else {
            mascara = '####0,00';
        }
        
        $('#preco').mask( mascara, { reverse: true});
    });
</script>
</center>

<br/><br/>