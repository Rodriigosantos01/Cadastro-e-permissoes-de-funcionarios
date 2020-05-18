<?php require dirname(dirname(__FILE__)).'/config.php'; ?>
<?php require MENU;?>
<?php require AUTOLOAD;?>
<?php 
	use App\User;	
	$rs = User::select();	
?>
	<div class="col-md-12">
		<header class="text-right mr-4">
			<strong>Editar perfil</strong>
		</header>
		<hr>
		<form id="formEditPerfil">
			<div class="row">
				<label class="col-md-4">Nome:
					<input class="form-control" type="text" name="nome" value="<?= $rs['nome'] ?>" readonly>
				</label>
				<label class="col-md-4">E-mail:
					<input class="form-control" type="text" name="email" value="<?= $rs['email'] ?>" readonly>
				</label>
				<label class="col-md-4">CPF-CNPJ:
					<input class="form-control" type="text" name="cpf_cnpj" value="<?= $rs['cpf_cnpj'] ?>" readonly>
				</label>
			</div>
			<div class="row">
				<label class="col-md-3">CEP:
					<input class="form-control" type="text" name="cep" id="cep" value="<?= $rs['cep'] ?>" required>
				</label>
				<label class="col-md-7">Endereço:
					<input class="form-control" type="text" name="endereco" id="rua" value="<?= $rs['endereco'] ?>" required>
				</label>
				<label class="col-md-2">Nº:
					<input class="form-control" type="text" name="numero" id="numero" value="<?= $rs['numero'] ?>" required>
				</label>
			</div>
			<div class="row">
				<label class="col-md-4">Complemento:
					<input class="form-control" type="text" name="complemento" value="<?= $rs['complemento'] ?>">
				</label>
				<label class="col-md-3">Bairro:
					<input class="form-control" type="text" name="bairro" value="<?= $rs['bairro'] ?>" id="bairro" required>
				</label>
				<label class="col-md-3">Cidade:
					<input class="form-control" type="text" name="cidade" value="<?= $rs['cidade'] ?>" id="cidade" required>
				</label>
				<label class="col-md-2">UF:
					<input class="form-control" type="text" name="uf" value="<?= $rs['estado'] ?>" id="uf" required>
				</label>
			</div>
			<div class="row">
				<div class="col-md-12" id="msgEditPerfil">
					<!-- Msg de alteração -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<button class="btn btn-success btn-block">Salvar</button>
				</div>
			</div>
			<br>									
		</form>
	</div>	
<?php require RODAPE;?>
<script src="/assets/js/viacep.js"></script>
<script src="js/script.js"></script>