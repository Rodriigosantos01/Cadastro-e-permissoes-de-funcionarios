<?php 
    session_start();
    require "../../autoload.php";

    use App\Funcionario;
    use App\Enviandoemail;
    
    if(isset($_POST)){
        $erro=0;
        $id_empresa = $_SESSION['id_empresa'];
        $id_permissao = $_POST['id_permissao'];
        $nome = $_POST["nome"];        
        $email = $_POST["email"];                
        $senha = 'GerarSenhaAoEviarEmail';
        $cpf_cnpj = $_POST["cpf_cnpj"];        
        $cep = $_POST["cep"];        
        $endereco = $_POST["endereco"];        
        $numero = $_POST["numero"];        
        $complemento = $_POST["complemento"];        
        $bairro = $_POST["bairro"];        
        $cidade = $_POST["cidade"];        
        $estado = $_POST["uf"];                  

        $funcionario = new Funcionario();
        $select = $funcionario->select('email', $email, $id_empresa);
        
        if(!$select){
            $select = $funcionario->select('cpf_cnpj', $cpf_cnpj, $id_empresa);
            if(!$select){
                $rs = $funcionario->insert($id_empresa, $id_permissao, $nome, $email, $senha, $cpf_cnpj, $cep,
                $endereco, $numero, $complemento, $bairro, $cidade, $estado);

                if($rs){
                    $msg = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Woohoo!</strong> funcionário cadastrado com sucesso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    ';
                    
                    $EnviarEmail = new Enviandoemail();
                    $tipo = 1;//Cadastro
                    $rsEmail = $EnviarEmail->insert($email, $tipo);                    
                }else{
                    $msg = '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Opss!</strong> Erro ao cadastrar funcionário!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    ';
                    $erro++;
                }

            }else{
                $msg = '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Opss!</strong> CPF/CNPJ já cadastrado!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    ';
                $erro++;
            }
        }else{
            $msg = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Opss!</strong> E-mail já cadastrado!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                ';
            $erro++;
        }

        
        echo json_encode(['msg'=>$msg, 'erro'=>$erro]);
    }else{
        echo json_encode(['msg'=>'Não foi enviado post', 'erro'=>1]);
    }