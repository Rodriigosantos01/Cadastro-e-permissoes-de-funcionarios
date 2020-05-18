<?php require dirname(dirname(__FILE__)).'/config.php'; ?>
<?php require AUTOLOAD;?>
<?php 
	@session_start();
	$idNivel = $_SESSION['id_nivel'];

	use App\Funcionario;
	use App\Permissao;
	use App\User;	
	$user = User::select();
	if($idNivel != 1 AND (!$user['new_funcionario'] AND !$user['view_funcionario'])){
		header("location: ../home");
	}
?>
<?php require MENU;?>
<?php require "inc/modal.php";?>
<?php 
	

	$funcionarios = new Funcionario();
	$func = $funcionarios->selectAll($idEmpresa);
?>
	<div class="col-md-12">
		<header class="text-right mr-4">
			<strong>Funcionários</strong>
		</header>
		<hr>		
		<div class="row">
			<div class="col-md-12  text-right">
				<?php if($user['new_funcionario'] OR $idNivel == 1):?>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewFuncionário">
					Novo funcionário
				</button>
				<?php endif;?>
			</div>
			<div class="col-md-12" id="msgFuncionario">				
			</div>
			<?php if($user['view_funcionario'] OR $idNivel == 1):?>
				<div class="col-md-12 table-responsive" id="funcionarios">
					<?php include("inc/employee.php");?>
				</div>
			<?php endif;?>
			</div>
		</div>	
	</div>
<?php require RODAPE;?>
<script src="/assets/js/viacep.js"></script>
<script src="js/script.js"></script>