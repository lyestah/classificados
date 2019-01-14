<?php 
require 'Pages/header.php';
require 'classes/Anuncios.php';
require 'classes/Usuarios.php';
$a=new Anuncios();
$u=new Usuarios();
if(isset($_GET['id']) && !empty($_GET['id'])){
	$id=addslashes($_GET['id']);
}

$info=$a->getAnuncio($id);
?> 
<div class="row">
      <div class="col s5">
      	<!-- CORRUSEL -->
      	 <div class="carousel carousel-slider">
	    <?php foreach ($info['fotos'] as $chave => $foto): ?>
	    	<a class="carousel-item" href="#"><img src="assets/images/anuncios/<?php echo $foto['url'];?> " alt=""></a>
	    	
	    <?php endforeach ?>
	  </div>
      	<!-- FIMCORRUOUSEL -->
      </div>
      <div class="col s7">
		<h1><?php echo $info['titulo'];?></h1>
		<span><?php echo $info['categoria'];?></span>
		<p><?php echo $info['descricao'];?></p>
		<h3>R$ <?php echo number_format($info['preco'],2); ?></h3>
		<h4><?php echo $info['telefone'];?></h4>
      </div>
  </div>

  

  <?php require 'Pages/footer.php' ?>
