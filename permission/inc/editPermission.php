<?php 
    session_start();
    require "../../autoload.php";

    use App\Permissao;
    
    if(isset($_POST)){
        $erro=0;
        $id_empresa = $_SESSION['id_empresa'];
        $idUser = $_SESSION['id'];
        $id = $_POST['id'];
        $coluna = $_POST['coluna'];
        $valor = $_POST['valor'];

        $permission = new Permissao();        
        $rs = $permission->update($coluna, $valor, $id_empresa, $id);        
    }