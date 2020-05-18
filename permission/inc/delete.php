<?php 
    session_start();
    require "../../autoload.php";

    use App\Permissao;
    use App\Funcionario;
    
    if(isset($_POST)){
        $erro=0;
        $id_empresa = $_SESSION['id_empresa'];
        $idUser = $_SESSION['id'];
        $id = $_POST['idDelPermissao'];
        
        $funcionario = new Funcionario();
        $rsF = $funcionario->select('id_permissao', $id, $id_empresa);

        if(!$rsF){        
            $permission = new Permissao();
            $rs = $permission->delete($id_empresa, $id, $idUser);
            
            if($rs){
                $msg = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Woohoo!</strong> Permissão deletada com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                ';
            }else{
                $msg = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Opss!</strong> Erro ao deletar permissão!
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
                <strong>Opss!</strong> Essa permissão está sendo usada e não pode ser deletada!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            ';
        }
       
        
        echo json_encode(['msg'=>$msg, 'erro'=>$erro]);
    }else{
        echo json_encode(['msg'=>'Não foi enviado post', 'erro'=>1]);
    }

    
