<br/><br/>
<form action="actions/cadastro/produto.php" method="post">
    <div class="row">
        <div class="col">
            <div class="form-group" style="text-align: left">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Digite o nome do produto" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" id="preco" name="preco" aria-describedby="preco" placeholder="Digite o preço do produto" required>
            </div>
            <br/>
        </div>
        <div class="col">
            <div class="form-group" style="text-align: left">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" aria-describedby="marca" placeholder="Digite a marca do produto" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="medida">Medida</label>
                <input type="tel" class="form-control" id="medida" name="medida" aria-describedby="medida" placeholder="Digite a medida do produto" required>
            </div>
            <br/>
        </div>
    </div>
  <br/>
  <center>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      <button type="reset" class="btn btn-warning">Limpar</button>
  </center>
  <?php 
    if(isset($_SESSION['produto_existe'])):
  ?>
    <br/><br/>
    <div class="alert alert-warning" role="alert">
      ALERTA! Não foi possível cadastrar! Este produto <b>já está cadastrado</b>!
    </div>
  <?php 
    endif;
    unset($_SESSION['produto_existe']);

    if(isset($_SESSION['produto_cadastrado'])):
  ?>
    <br/><br/>
    <div class="alert alert-success" role="alert">
      Produto <b>cadastrado</b> com sucesso!
    </div>
  <?php
    endif;
    unset($_SESSION['produto_cadastrado']);

    if (isset($_SESSION['produto_excluido'])):
  ?>
  <br/><br/>
  <div class="alert alert-danger" role="alert">
      Produto <b>excluído</b> com sucesso!
  </div>
  <?php
    endif;
    unset($_SESSION['produto_excluido']);
    if (isset($_SESSION['produto_editado'])):
  ?>
      <br/><br/>
      <div class="alert alert-success" role="alert">
          Produto <b>editado</b> com sucesso!
      </div>
  <?php
      endif;
      unset($_SESSION['produto_editado'])
  ?>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script>
    $('#preco').mask('#####0,0', {reverse: true});

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

<?php 

    require("actions/gerenciamento/produto.php");

?>