<?php 
    @session_start();
    if($_SESSION['login'] == false){
        header('location: /');
	}

	$idUser = $_SESSION['id'];    
	$idEmpresa = $_SESSION['id_empresa']; 
	$idNivel = $_SESSION['id_nivel'];

	require AUTOLOAD;
	
	use App\User;	
	$user = User::select();	
?>
<!doctype html>
<html lang="en">
<head>
	<title><?= NAME_SISTEMA ?></title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../assets/img/favicon.ico"/>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />	
	<link href="../assets/framework/font-awesome/css/all.min.css" rel="stylesheet"/>	
	<link href="../assets/framework/bootstrap.min.css" rel="stylesheet"/>
	<link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet"/>
	<link href="../assets/css/style.css" rel="stylesheet"/>
</head>
<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active col-md-2">
			<div class="pt-2" style="padding-top: 1.7rem!important;">
				<span class="navbar-brand mb-0 h1">
					<img class="img-fluid" src="../assets/img/logo2.png" alt="">					
				</span>
				<hr class="border">
				<ul class="list-unstyled components mb-5">
					<li class="nav-item">
						<a class="nav-link" href="/home">
							<i class="fas fa-home"></i>
							<span>Home</span>
						</a>					
					</li>
					<li class="nav-item">
						<a href="#subMenuPerfil" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
							<i class="fas fa-user"></i>
							<span>Perfil</span>
						</a>
						<ul class="collapse list-unstyled" id="subMenuPerfil">
							<li>
								<a href="/profile">Editar perfil</a>
							</li>
							<li>
								<a href="/profile/senha.php">Alterar senha</a>
							</li>
						</ul>
					</li>
					<?php if($idNivel == 1 OR ($user['view_funcionario'] OR $user['new_funcionario'])):?>
					<li class="nav-item">
						<a href="#subMenuUser" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
							<i class="fas fa-users"></i>
							<span>Usuarios</span>
						</a>
						<ul class="collapse list-unstyled" id="subMenuUser">
							<li>
								<a href="/employee">Funcionários</a>
							</li>
						</ul>
					</li>
					<?php endif;?>
					<?php if($idNivel == 1 OR ($user['view_config'] OR $user['new_config'])):?>
					<li class="nav-item">
						<a href="#subMenuPermission" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
							<i class="fas fa-users-cog"></i>
							<span>Permissões</span>
						</a>
						<ul class="collapse list-unstyled" id="subMenuPermission">
							<li>
								<a href="/permission">Permissão de funcionários</a>
							</li>							
						</ul>
					</li>
					<?php endif;?>
					<li class="nav-item mb-5"  style="bottom: 0; position: absolute;">
						<a class="nav-link sair" href="/inc/logout.php">
							<i class="fas fa-sign-out-alt"></i>
							<span>Sair</span>
						</a>
					</li>					
				</ul>
				<div class="footer" style="bottom: 0; position: absolute;">
					<p>Copyright &copy; <?= NAME_SISTEMA?></p></p>
				</div>
			</div>
		</nav> 
		<div id="content" class="col-md-12">
			<nav class="navbar" style="padding: 6px 0 0 6px;">
				<button type="button" id="sidebarCollapse" class="btn btn-light">
				<!-- <button type="button" id="sidebarCollapse" class="btn btn-light d-block d-sm-none d-none d-sm-block d-md-none d-none d-md-block d-lg-none"> -->
					<i class="fa fa-bars"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</nav>  
			<div class="col-md-12">     