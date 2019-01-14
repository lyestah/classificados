<?php require 'Pages/header.php';
require 'classes/Usuarios.php';
$u=new Usuarios;

if(isset($_POST['email']) && !empty($_POST['senha'])){
	
	$email=addslashes($_POST['email']);
	$senha=$_POST['senha'];

  if($u->login($email,$senha)){
    ?>
    <script type="text/javascript">
      window.location.href="./"
    </script>
    <?php

  }else{
    echo "Usuario ou senha errado";
  }

}


 ?>


  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input name="email" id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
          <input name="senha" id="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
        
      </div>
     
     
      <div class="row">
      	<div class="input-field col s12">
      		<input class="waves-effects waves-light btn" type="submit" name="" value="CADASTRAR">
      	</div>	
      </div>
    </form>
  </div>
        

<?php require 'Pages/footer.php' ?>