<div class="row">
<?php
$listaAvaliacoes = $dalinstituicao->listaAvaliacoes($id, 3);
//var_dump($resultado);
foreach ($listaAvaliacoes as $la => $value) {
  extract($value);
  //echo $nome.'<br>';
  ?>
  <div class="col-lg-4 mb-4">
    <div class="card h-100 text-center">
      <!--<img class="card-img-top" src="http://placehold.it/750x450" alt="">-->
      <img class="card-img-top" src="../storage/uploads/perfil_pessoa_fisica/<?= $foto ?>" alt="" height="340">

      <div class="card-body">
        <h4 class="card-title"><?= $nome ?> <?= $sobrenome ?></h4>
        <p class="card-text"><?= $comentario.'<br><a href="#">(Ver mais)</a>' ?></p>

      </div>
      <div class="card-footer">
        <span>
          <?php
            if($avaliacao == 1){
              echo "<b>Recomendou</b> essa instituição";
            }else{
              echo "<b>Negativou</b> essa instituição";
            }
          ?>
        </span>
        <!-- <a href="#">instituição</a> -->
      </div>
    </div>
  </div>
  <?php }
?>
</div>
<?php
if($existeSessao == 1){
if($id !== $_SESSION['credencial']['idSessao']){
    echo "<h4 style='text-align:center'><a href='avaliar-instituicao.php?id={$id_instituicao}&p_id={$_SESSION['credencial']['idSessao']}'>Avaliar essa instituição</a></h4>";
}}
?>

<br>
