<?php 
    session_start();
    require "../../autoload.php";

    use App\Funcionario;
    
    $id = $_POST['id'];
    $idEmpresa = $_SESSION['id_empresa'];
    $idUser = $_SESSION['id'];

    $funcionario = new Funcionario();
    $rs = $funcionario->delete($idEmpresa, $id, $idUser);

    if($rs){
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Woohoo!</strong> Funcionário deletado com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        ';
    }else{
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Opss!</strong> Erro ao deletar funcionário!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        ';
    }