<?php require 'Pages/header.php';
if(empty($_SESSION['cLogin'])){
	?>
	<script type="text/javascript">window.location.href="login.php"; </script>
	<?php
	exit;
}

?>

<h1>Meus Anuncios</h1>
<a href="add-adicionar.php" class="btn">Adicionar Anuncio</a>

      <table class="responsive-table" >
        <thead>
          <tr>
              <th>Foto</th>
              <th>Titulo</th>
              <th>Valor</th>
              <th>Ações</th>
          </tr>
        </thead>
<?php 
require 'classes/Anuncios.php';
		$a=new Anuncios;
		$anuncios=$a->getAnuncios();
		foreach($anuncios as $anuncio) :?>
        <tbody>
          <tr>
            <td>
				<?php if(!empty($anuncio['url'])):?>
            	<img src="assets/images/anuncios/<?php echo $anuncio['url'];?>" height="100" width="100" border="0" alt="">
				<?php else: ?>
				      <img src="assets/images/anuncios/default.png" height="100" width="100" border="0" alt="">
				<?php endif;?>
            </td>
            <td><?php echo $anuncio['titulo']; ?></td>
            <td><?php echo number_format($anuncio['preco'],2); ?></td>
            <td>
             <a href="editar-anuncios.php?id=<?php echo $anuncio['id'];?>" class="btn orange darken-1">Editar</a> 
             <a href="excluir-anuncio.php?id=<?php echo $anuncio['id'];?>" class="btn pink darken-3">Excluir</a> 
         </td>
          </tr>
          
        </tbody>
        <?php endforeach;?>
      </table>
            



 <?php require 'Pages/footer.php';?>