<?php require 'Pages/header.php';
require 'classes/Usuarios.php';
$u=new Usuarios;

if(isset($_POST['nome']) && !empty($_POST['nome'])){
	$nome=addslashes($_POST['nome']);
	$email=addslashes($_POST['email']);
	$senha=$_POST['senha'];
	$telefone=addslashes($_POST['telefone']);

	if(!empty($nome) && !empty($email) && !empty($senha)){
		if($u->Cadastrar($nome,$email,$senha,$telefone)){
			echo "Cadastrado com sucesso";
		}else{
			echo "Usuario ja cadastrado!";
		}
	}else{
		?>
			<!-- ALERTA SE NAO TIVER PREENCHIDO -->
			  <div class="row">
    <div class="col s12 m12">
      <div class="card yellow lighten-3">
        
        <div class="card-action">
          Preencha todos os campos
        </div>
      </div>
    </div>
  </div>
  <!-- FIM DO ALERTA -->
		<?php
	}
}


 ?>


  <div class="row">
    <form method="POST" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input  name="nome" id="nome" type="text" class="validate">
          <label for="nome">Nome</label>
        </div>
        <div class="input-field col s6">
          <input name="email" id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
     
      <div class="row">
        <div class="input-field col s12">
          <input name="senha" id="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input name="telefone" id="telefone" type="text" class="validate">
          <label for="telefone">Telefone</label>
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