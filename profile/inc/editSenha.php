<?php
    session_start();
    require "../../autoload.php";
    use App\User;
    $user = new User();
    
    $id =               $_SESSION['id'];    
    $password =         $_POST['password'];
    $newPassword =      $_POST['newPassword'];
    $newPasswordConfirm=$_POST['newPasswordConfirm'];

    if($newPassword != $newPasswordConfirm){
        echo '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Ops!</strong> Senhas são diferentes!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>    
        ';
    }else{
        $rs = $user->select($id);
        if (password_verify($password, $rs['senha'])) {
            $rs = $user->updateSenha($newPassword, $id);

            if($rs){
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Woohoo!</strong> Senha alterada com sucesso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>    
                ';
            }else{
                echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Ops!</strong> Erro ao alterar senha!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>    
                ';
            }
        } else {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ops!</strong> Senha não confere!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>    
                ';
        }
    }