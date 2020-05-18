<?php

    require dirname(dirname(__FILE__)).'/autoload.php';
    use App\login;

    if($_POST){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        
        $login = new Login();
        $rs = $login->login($email, $senha);
        echo json_encode($rs);

    }else{
        echo "Informe os dados para login";
    }
    

