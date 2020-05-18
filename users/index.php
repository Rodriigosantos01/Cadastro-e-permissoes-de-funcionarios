<?php require dirname(dirname(__FILE__)).'/config.php'; ?>
<?php require MENU;?>
<?php require AUTOLOAD;?>
<?php 
	use App\User;
	$user = new User();
	$rs = $user->select($idUser);	
?>
	<div class="col-md-12">
		<header class="text-right mr-4">
			<strong>Usuários</strong>
		</header>
		<hr>
	</div>
<?php require RODAPE;?>
<script src="/assets/js/viacep.js"></script>
<script src="js/script.js"></script>