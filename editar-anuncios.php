<?php require 'Pages/header.php';
require 'classes/Anuncios.php';
$a=new Anuncios;

if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
	$titulo=addslashes($_POST['titulo']);
  $categoria=addslashes($_POST['categoria']);
  $preco=addslashes($_POST['preco']);
  $descricao=addslashes($_POST['descricao']);
	$estado=addslashes($_POST['estado']);
  if(isset($_FILES['fotos'])){
    $fotos=$_FILES['fotos'];
  }else{
    $fotos=array();
  }
  
	
   $a->editAnuncio($titulo,$categoria,$preco,$descricao,$estado,$fotos,$_GET['id']);
   ?>
    <div class="alert">Produto editado com sucesso</div>
   <?php
			header("Location: meusanuncios.php");
	}


if(isset($_GET['id']) && !empty($_GET['id'])){
$info=$a->getAnuncio($_GET['id']);

}else{
  ?>
<script type="text/javascript">window.location.href="meusanuncios.php"; </script>
  <?php
  exit;
}
 ?>



<h1>Editar Anuncio</h1>
  <div class="row">
    <form method="POST" enctype="multipart/form-data" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <label for="Categoria">Categoria</label>
          <select name="categoria" id="categoria">
            <option value="" disabled selected>Categoria</option>
            <?php 
            require 'classes/Categorias.php';
            $c=new Categorias;
            $cats=$c->getLista();
            foreach($cats as $cat) :?>
            <option value="<?php echo $cat['id'];?>"<?php echo($info['id_categoria']==$cat['id'])?'selected="selected"':'';?>><?php echo utf8_encode($cat['nome']);?></option>
          <?php endforeach;?>
          </select>
        </div>

        <div class="input-field col s6">
    <select name="estado">
      <option value="" disabled selected>Estado do Objeto</option>
      <option value="0" <?php echo($info['estado']=='0')?'selected="selected"':'';?> >Ruim</option>
      <option value="1"<?php echo($info['estado']=='1')?'selected="selected"':'';?>>Bom</option>
      <option value="2"<?php echo($info['estado']=='2')?'selected="selected"':'';?>>Ótimo</option>
    </select>
    <!-- <label>Materialize Select</label> -->
 
      </div>
        <div class="input-field col s12">
          <input name="titulo" id="titulo" type="text" value="<?php echo $info['titulo'];?>" class="validate">
          <label for="titulo">titulo</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col s4">
          <input name="preco" id="preco" type="text" value="<?php echo $info['preco'];?>" class="validate">
          <label for="preco">preco</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="descricao">descricao</label>
          <textarea name="descricao" id="descricao"><?php echo $info['descricao'];?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="add_foto">Fotos do Anuncio</label>
          <input type="file" name="fotos[]" multiple >
          <div class=" card-content teal">
            <?php 
            foreach($info['fotos'] as $foto):?>
              <div class="foto_item">
               <img src="assets/images/anuncios/<?php echo $foto['url'];?>" height="100" width="100" border="0" alt="">
               <a class="btn" href="excluir-foto.php?id=<?php echo $foto['id'];?>">Excluir Foto</a>
              </div>

             <?php endforeach;?>
          </div>
        </div>
      </div>
     
      <div class="row">
      	<div class="input-field col s12">
      		<input class="waves-effects waves-light btn" type="submit" name="" value="Adicionar">
      	</div>	
      </div>
    </form>
  </div>
        

<?php require 'Pages/footer.php' ?>