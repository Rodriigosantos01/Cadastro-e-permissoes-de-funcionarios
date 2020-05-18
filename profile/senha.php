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
			<strong>Alterar senha</strong>
		</header>
		<hr>
		<form id="formEditSenha">
			<div class="row">
				<label class="col-md-4">Senha atual:
					<input class="form-control" type="password" name="password" required>
				</label>
			</div>
			<div class="row">
				<label class="col-md-4">Nova senha:
					<input class="form-control" type="password" name="newPassword" required>
				</label>
				<label class="col-md-4">Confirmar nova senha:
					<input class="form-control" type="password" name="newPasswordConfirm" required>
				</label>
			</div>
			<div class="row">
				<div class="col-md-12" id="msgEditSenha">
					<!-- Msg de alteração -->
				</div>
			</div>	
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-success btn-block">Salvar</button>
				</div>
			</div>									
		</form>
	</div>
<?php require RODAPE;?>
<script src="/assets/js/viacep.js"></script>
<script src="js/script.js"></script>