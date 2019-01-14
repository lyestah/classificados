<?php require 'Pages/header.php';
require 'classes/Anuncios.php';
$a=new Anuncios;

if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
	$titulo=addslashes($_POST['titulo']);
  $categoria=addslashes($_POST['categoria']);
  $preco=addslashes($_POST['preco']);
  $descricao=addslashes($_POST['descricao']);
	$estado=addslashes($_POST['estado']);
	
   $a->addAnuncio($titulo,$categoria,$preco,$descricao,$estado);
   ?>
    <div class="alert">Produto adicionado com sucesso</div>
   <?php
			
	}



 ?>

<h1>Adicionar Anuncio</h1>
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
            <option value="<?php echo $cat['id'];?>"><?php echo utf8_encode($cat['nome']);?></option>
          <?php endforeach;?>
          </select>
        </div>

        <div class="input-field col s6">
    <select name="estado">
      <option value="" disabled selected>Estado do Objeto</option>
      <option value="0">Ruim</option>
      <option value="1">Bom</option>
      <option value="2">Ótimo</option>
    </select>
    <!-- <label>Materialize Select</label> -->
 
      </div>
        <div class="input-field col s12">
          <input name="titulo" id="titulo" type="text" class="validate">
          <label for="titulo">titulo</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col s4">
          <input name="preco" id="preco" type="text" class="validate">
          <label for="preco">preco</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="descricao">descricao</label>
          <textarea name="descricao" id="descricao" ></textarea>
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