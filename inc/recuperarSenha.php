<?php

    require dirname(dirname(__FILE__)).'/autoload.php';
    use App\Enviandoemail;

    if($_POST){
        $email = $_POST['email'];
        $EnviarEmail = new Enviandoemail();
        $tipo = 2;//Recuperar senha
        $rsEmail = $EnviarEmail->insert($email, $tipo);  

        if($rsEmail){
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Woohoo!!!</strong> Em breve vc receberar uma nova senha no seu email.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>            
            ';
        }else{
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Ops!!!</strong> Tivemos um probleminha ao gerar nova senha, tente novamente mais tarde.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>            
            ';

        }
    }else{
        echo "Informe os dados para login";
    }
    

