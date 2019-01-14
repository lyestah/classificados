<?php 
require 'Pages/header.php';
require 'classes/Anuncios.php';
require 'classes/Usuarios.php';
$a=new Anuncios();
$u=new Usuarios();
$totalAnuncio=$a->getTotalAnuncio();
$totalUsuarios=$u->getTotalUsuarios();
$p=1;
if(isset($_GET['p']) && !empty($_GET['p'])){
	$p=addslashes($_GET['p']);
}
$por_pagina=2;
$total_pagina=ceil($totalAnuncio/$por_pagina);
$anuncios=$a->getUltimosAnuncios($p,$por_pagina);
 ?>
  <?php if(isset($_SESSION['cLogin'])) :?>    
  <!-- <h1 >Olá, <?php //echo $_SESSION['cEmail'];?>!</h1> -->
  <?php else: ?>
  	<!-- <h1 >Olá, Usuário!</h1> -->
  <?php endif;?>
  
  <div class="row">
  	<div class="col s12 ">
  		<div class="nummembro">
  			<center>
			<h2> Hoje nós temos mais de <?php echo $totalAnuncio;?> anuncios</h2>
  			<h3>E mais de <?php echo $totalUsuarios;?>  usuários cadastrados</h3>
  		</center>
  				</div>
	</div>
      <div class="col s3">
        <!-- Grey navigation panel -->
        <h4>Pesquisa Avançada</h4>
      </div>

      <div class="col s9">
        <!-- Teal page content  -->
        <h4>Últimos Anuncios</h4>
        <table  >
        	<?php foreach ($anuncios as $anuncio): ?>
        		<tbody>
        			<tr>
        			<td>
				<?php if(!empty($anuncio['url'])):?>
            	<img src="assets/images/anuncios/<?php echo $anuncio['url'];?>" height="100" width="100" border="0" alt="">
				<?php else: ?>
				      <img src="assets/images/anuncios/default.png" height="100" width="100" border="0" alt="">
				<?php endif;?></td>
				<td> <a href="produto.php?id=<?php echo $anuncio['id'];?>"><?php echo $anuncio['titulo']; ?></a> <br> <?php echo utf8_encode($anuncio['categoria']);?></td>
            	<td><?php echo number_format($anuncio['preco'],2); ?></td>
            	</tr>
        		
        	<?php endforeach ?>
        	</tbody>
        </table>
			<ul class="pagination">
				<?php for($q=1;$q<=$total_pagina;$q++):?>
				<li class="<?php echo ($p==$q)?'active':'';?>" > <a href="index.php?p=<?php echo $q;?>"><?php echo $q;?></a> </li>
				<?php endfor;?>
			</ul>

      </div>
  


   <?php require 'Pages/footer.php' ?>