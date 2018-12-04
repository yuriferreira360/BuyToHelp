<?php include "inc/header.php"; ?>
  <body>
    <div class="col-lg-6 mb-4" style="background-color: #E9ECEF;color: black">
      <!-- <h2>Section Heading</h2> -->
      <br>
      <form method="post" action="">
        <!--
        <div class="form-group">
          <label for="exampleFormControlInput1">Nome</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="inNome" value="<?= $nome ?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Sobrenome</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="inSobrenome" value="<?= $sobrenome ?>">
        </div>

        <div class="form-group">
          <label for="descricao">Descricao:</label>
          <textarea class="form-control" rows="5" id="" name="inDescriaco"><?= $descricao ?></textarea>
        </div>
        -->
        <div class="form-group">
          <label for="exampleFormControlInput1">CPF</label>
          <input type="text" class="form-control" id="cpf" name="inCpf" value="<?= $cpf ?>">
        </div>
        <!--
        <div class="form-group">
          <label for="exampleFormControlInput1">CEP</label>
          <input type="text" class="form-control" id="cep" name="inCep" value="<?= $cep ?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="inBairro" value="<?= $bairro ?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Rua</label>
          <input type="text" class="form-control" id="rua" name="inRua" value="<?= $rua ?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Numero</label>
          <input type="text" class="form-control" id="" name="inNumero" value="<?= $numero ?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Complemento</label>
          <input type="text" class="form-control" id="" name="inComplemento" value="<?= $complemento ?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Estado</label>
          <input type="text" class="form-control" id="uf" name="inUf" value="<?= $uf ?>">
        </div>

        <div class="form-group">
          <label for="exampleFormControlInput1">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="inCidade" value="<?= $cidade ?>">
        </div>
        -->
        <input type="submit" name="btSalvar" value="Salvar" class="btn btn-primary"style="width: 20%">

      </form>
      <br>
    </div>
  </div>
  </body>
  <script>
    $(document).ready(function(){
      $("#cpf").mask("999.999.999-99");
    });
  </script>
</html>
