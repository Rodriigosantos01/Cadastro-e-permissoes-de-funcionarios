<?php 
    session_start();
    require "../../autoload.php";

    use App\Permissao;
    
    if(isset($_POST)){
        $erro=0;
        $id_empresa = $_SESSION['id_empresa'];
        $idUser = $_SESSION['id'];
        $id = $_POST['idEditPermissao'];
        $descricao = $_POST['DescricaoEditPermissao'];

        $permission = new Permissao();
        $rs = $permission->select($descricao, $id_empresa, $id);

        if(!$rs){
            $rs = $permission->update('descricao', $descricao, $id_empresa, $id);
            if($rs){
                $msg = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Woohoo!</strong> Descricao alterado com sucesso!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                ';
            }else{
                $msg = '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Opss!</strong> Erro ao alterar descricao!
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
                <strong>Opss!</strong> Já existe uma permissão com esse descricao!
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

    
