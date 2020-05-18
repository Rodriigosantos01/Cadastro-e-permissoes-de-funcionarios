<?php require dirname(dirname(__FILE__)).'/config.php'; ?>
<?php require AUTOLOAD;?>
<?php 
	@session_start();
	$idNivel = $_SESSION['id_nivel'];
	use App\User;
	$user = User::select();
	if($idNivel != 1 AND (!$user['new_config'] AND !$user['view_config'])){
		header("location: ../home");
	}
?>
<?php require MENU;?>
<?php require "inc/modal.php";?>
	<div class="col-md-12">
		<header class="text-right mr-4">
			<strong>Permissão de Clientes</strong>
		</header>
		<hr>
		<form id="permissionEmplyeer">
			<div class="row">
				<div class="col-md-12  text-right">
				<?php if($idNivel == 1 OR $user['new_config']):?>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewPermission">
						Nova permissão
					</button>
				<?php endif;?>
				</div>
				<div class="col-md-12" id="msgPermissao">
					
				</div>
				<?php if($idNivel == 1 OR $user['view_config']):?>
				<div class="col-md-12" id="permission">
					<?php include('inc/permission.php');?>
				</div>
				<?php endif;?>
			</div>
			
		</form>
	</div>
<?php require RODAPE;?>
<script src="/assets/js/viacep.js"></script>
<script src="js/script.js"></script>