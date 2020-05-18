<?php
    session_start();
    require "../../autoload.php";
    use App\User;
    $user = new User();

    $id=$_SESSION['id'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['uf'];

    $rs = $user->update($cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado, $id);
    if($rs){
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Woohoo!</strong> Dados alterados com sucesso!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
        ';
    }else{
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ops!</strong> Erro ao alterar dados!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
        ';
    }