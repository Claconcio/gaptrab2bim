<br/><br/>
<form action="actions/cadastro/cliente.php" method="post">
    <div class="row">
        <div class="col">
            <div class="form-group" style="text-align: left">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nome" placeholder="Digite o nome do cliente" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Digite o e-mail do cliente" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" aria-describedby="cep" placeholder="Digite o CEP do cliente" maxlength="9" onkeyup="handleZipCode(event);" onblur="buscaCep()" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="numero">Número</label>
                <input type="number" class="form-control" id="numero" name="numero" aria-describedby="numero" placeholder="Digite o número do cliente" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" aria-describedby="cidade" placeholder="Digite a cidade do cliente" required>
            </div>
            <br/>
        </div>
        <div class="col">
            <div class="form-group" style="text-align: left">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="cpf" placeholder="Digite o CPF do cliente"  maxlength="14" onkeydown="javascript: fMasc( this, mCPF );" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="telefone">Telefone</label>
                <input type="tel" class="form-control" id="telefone" name="telefone" aria-describedby="telefone" placeholder="Digite o telefone do cliente" onkeyup="handlePhone(event)" maxlength="15" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="endereco">Logradouro</label>
                <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="endereco" placeholder="Digite o logradouro do cliente" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" aria-describedby="bairro" placeholder="Digite o bairro do cliente" required>
            </div>
            <br/>
            <div class="form-group" style="text-align: left">
                <label for="estado">Estado</label>
                <select id="estado" name="estado" class="form-control">
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                    <option value="EX">Estrangeiro</option>
                </select>
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
    if(isset($_SESSION['usuario_existe'])):
  ?>
    <br/><br/>
    <div class="alert alert-warning" role="alert">
      ALERTA! Não foi possível cadastrar! Este cliente <b>já está cadastrado</b>!
    </div>
  <?php 
    endif;
    unset($_SESSION['usuario_existe']);

    if(isset($_SESSION['cadastrado'])):
  ?>
    <br/><br/>
    <div class="alert alert-success" role="alert">
      Cliente <b>cadastrado</b> com sucesso!
    </div>
  <?php
    endif;
    unset($_SESSION['cadastrado']);

    if (isset($_SESSION['cliente_excluido'])):
  ?>
  <br/><br/>
  <div class="alert alert-danger" role="alert">
      Cliente <b>excluído</b> com sucesso!
  </div>
  <?php
    endif;
    unset($_SESSION['cliente_excluido']);
    if (isset($_SESSION['cliente_editado'])):
  ?>
      <br/><br/>
      <div class="alert alert-success" role="alert">
          Cliente <b>editado</b> com sucesso!
      </div>
  <?php
      endif;
      unset($_SESSION['cliente_editado'])
  ?>
</form>
</div>
<script>
    // Máscara para telefone
    const handlePhone = (event) => {
        let input = event.target
        input.value = phoneMask(input.value)
    }

    const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{2})(\d)/,"($1) $2")
        value = value.replace(/(\d)(\d{4})$/,"$1-$2")
        return value
    }

    // Máscara para CEP
    const handleZipCode = (event) => {
        let input = event.target
        input.value = zipCodeMask(input.value)
    }

    const zipCodeMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{5})(\d)/,'$1-$2')
        return value
    }

    // Máscara para CPF
    function ValidaCPF(){	
        var RegraValida=document.getElementById("cpf").value; 
        var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;	 
        /*if (cpfValido.test(RegraValida) == true)	{ 
            console.log("CPF Válido");	
            //alert("CPF é válido!");
        } else {	 
            console.log("CPF Inválido");	
            //alert("CPF é inválido!");
        }*/
    }

    function fMasc(objeto,mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
    }

    function fMascEx() {
        obj.value=masc(obj.value)
    }

    function mCPF(cpf){
        cpf=cpf.replace(/\D/g,"")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return cpf
    }

</script>
<script type="text/javascript" src="components/js/cep.js"></script>
</center>

<br/><br/>

<?php 

    require("actions/gerenciamento/cliente.php");

?>