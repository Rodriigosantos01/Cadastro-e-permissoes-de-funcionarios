<?php 
    session_start();
    require "../../autoload.php";

    use App\Permissao;
    
    if(isset($_POST)){
        $erro=0;
        $id_empresa = $_SESSION['id_empresa'];
        $descricao = $_POST['descricao'];
        $newFuncionario = isset($_POST['newFuncionario'])?? 0;
        $viewFuncionario = isset($_POST['viewFuncionario'])?? 0;
        $editFuncionario = isset($_POST['editFuncionario'])?? 0;
        $delFuncionario = isset($_POST['delFuncionario'])?? 0;
        $newConfig = isset($_POST['newConfig'])?? 0;
        $viewConfig = isset($_POST['viewConfig'])?? 0;
        $editConfig = isset($_POST['editConfig'])?? 0;
        $delConfig = isset($_POST['delConfig'])?? 0;

        $permission = new Permissao();
        $select = $permission->select($descricao, $id_empresa);

        if(!$select){
            $rs = $permission->insert($id_empresa, $descricao, $newFuncionario, $viewFuncionario, $editFuncionario, $delFuncionario, $newConfig, $viewConfig, $editConfig, $delConfig);
            if($rs){
                $msg = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Woohoo!</strong> Permissão cadastrada com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                ';
            }else{
                $msg = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Opss!</strong> Erro ao cadastrar permissão!
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
                    <strong>Opss!</strong> Já existe uma permissão com essa descricao!
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

    
