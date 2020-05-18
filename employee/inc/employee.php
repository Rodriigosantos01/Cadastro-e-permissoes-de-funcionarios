
<?php     
    @session_start();
    $idEmpresa = $_SESSION['id_empresa'];
    $idNivel = $_SESSION['id_nivel'];

    require_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';    
    
    use App\Funcionario;
    use App\Permissao;
    use App\User;

    $user = User::select();	
	$funcionario = new Funcionario();
	$func = $funcionario->selectAll($idEmpresa);
?>
<?php if($func):?>
    <table class="table table-striped table-bordered" id="table-funcionario">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Permissão</th>
                <th>Data Cadastrado</th>
                <th>Status</th>
                <?php if(($user['edit_funcionario'] OR $user['del_funcionario']) OR $idNivel == 1):?>	
                <th>Ações</th>
                <?php endif;?>   
            </tr>
        </thead>
        <tbody>
        <?php foreach($func as $rs):?>
            <?php 							
                $permissao = new Permissao();	
                $rsPerm = $permissao->selectKey($idEmpresa, 'id', $rs['id_permissao']);
            ?>
            <tr>
                <td><?= $rs['nome']?></td>
                <td><?= $rs['email']?></td>
                <td><?= $rsPerm['descricao']?></td>
                <td><?= $rs['date_create']?></td>
                <td><?= ($rs['id_status'] == 1)? 'Ativo':'Inativo';?></td>
                <?php if(($user['edit_funcionario'] OR $user['del_funcionario']) OR $idNivel == 1):?>	
                <td class="text-center">
                    <?php if($user['edit_funcionario'] OR $idNivel == 1):?>								
                        <button onclick="editFuncionario(<?= $rs['id']?>)" class="btn btn-warning" data-toggle="modal" data-target="#modalEditFuncionário" type="button">
                            <i class="fas fa-edit"></i>
                        </button>  
                    <?php endif;?>  
                    <?php if($user['del_funcionario'] OR $idNivel == 1):?>	   
                        <button class="btn btn-danger" onclick="delFuncionario(<?= $rs['id']?>)" data-toggle="modal" data-target="#modalDelFuncionário" type="button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    <?php endif;?>   
                </td>
                <?php endif;?>  
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<?php endif;?>