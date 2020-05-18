
<?php     
    @session_start();
    $idEmpresa = $_SESSION['id_empresa'];
    $idNivel = $_SESSION['id_nivel'];

    require_once $_SERVER['DOCUMENT_ROOT'] . '/autoload.php';    
    
    use App\Permissao;
    use App\User;

	$permission = new Permissao();
    $rs = $permission->selectAll($idEmpresa);

    $user = User::select();	

    if($idNivel == 1 OR $user['edit_config']){
        $disabled = '';
    }else{
        $disabled = 'disabled';
    }
?>
<div class="accordion" id="accordionExample">
    <?php foreach ($rs as $perm):?>		
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne<?= $perm['id']?>" aria-expanded="true" aria-controls="collapseOne">
                    <b><?= $perm['descricao']?></b> 
                </button>     
                <span class=" float-right">
                <?php if($idNivel == 1 OR $user['edit_config']):?> 
                    <button class="btn btn-warning" onclick="editPermission(<?= $perm['id']?>, '<?= $perm['descricao']?>')" type="button">
                        <i class="fas fa-edit"></i>
                    </button> 
                <?php endif;?>
                <?php if($idNivel == 1 OR $user['del_config']):?>      
                    <button class="btn btn-danger" onclick="deletePermission(<?= $perm['id']?>)" type="button">
                        <i class="fas fa-trash-alt"></i>
                    </button> 
                <?php endif;?>               
                </span>   
            </h5>
        </div>

        <div id="collapseOne<?= $perm['id']?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-center">Funcionários</h4>
                    <hr>
                    <div class="col-md-12 mb-1">
                        <label class="align-middle">Ver lista de funcionário</label>
                        <label class="switch"> 
                            <input name="view_funcionario" type="checkbox" <?= $disabled?>
                            <?= ($perm['view_funcionario'] == 1)? 'checked' : '';?>
                            class="inputCheck" colum='view_funcionario' data-id="<?= $perm['id']?>">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="col-md-12 mb-1">
                        <label class="align-middle">Cadastrar funcionário</label>
                        <label class="switch"> 
                            <input name="new_funcionario" type="checkbox" <?= $disabled?>
                            <?= ($perm['new_funcionario'] == 1)? 'checked' : '';?>
                            class="inputCheck" colum='new_funcionario' data-id="<?= $perm['id']?>">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="col-md-12 mb-1" data-placement="right" data-toggle="popover" data-content="Pra habilitar a opção 'Editar' precisa estar habilitar a opção 'Ver lista de funcionário'">
                        <label class="align-middle">Editar funcionário</label>
                        <label class="switch"> 
                            <input name="edit_funcionario" type="checkbox" <?= $disabled?>
                            <?= ($perm['edit_funcionario'] == 1)? 'checked' : '';?>
                            class="inputCheck" colum='edit_funcionario' data-id="<?= $perm['id']?>">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="col-md-12 mb-1" data-placement="right" data-toggle="popover" data-content="Pra habilitar a opção 'Deletar' precisa estar habilitar a opção 'Ver lista de funcionário'">
                        <label class="align-middle">Deletar funcionário</label>
                        <label class="switch"> 
                            <input name="del_funcionario" type="checkbox" <?= $disabled?>
                            <?= ($perm['del_funcionario'] == 1)? 'checked' : '';?>
                            class="inputCheck" colum='del_funcionario' data-id="<?= $perm['id']?>">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>  
                <div class="col-md-6">
                    <h4 class="text-center">Configurações</h4>
                    <hr>
                    <div class="col-md-12 mb-1">
                        <label class="align-middle">Ver de configurações</label>
                        <label class="switch"> 
                            <input name="view_config" type="checkbox" <?= $disabled?>
                            <?= ($perm['view_config'] == 1)? 'checked' : '';?>
                            class="inputCheck" colum='view_config' data-id="<?= $perm['id']?>">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="col-md-12 mb-1">
                        <label class="align-middle">Cadastrar configurações</label>
                        <label class="switch"> 
                            <input name="new_config" type="checkbox" <?= $disabled?>
                            <?= ($perm['new_config'] == 1)? 'checked' : '';?>
                            class="inputCheck" colum='new_config' data-id="<?= $perm['id']?>">
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <div class="col-md-12 mb-1" data-placement="right" data-toggle="popover" data-content="Pra habilitar a opção 'Editar' precisa estar habilitar a opção 'Ver de configurações'">
                        <label class="align-middle">Editar configurações</label>
                        <label class="switch"> 
                            <input name="edit_config" type="checkbox" <?= $disabled?>
                            <?= ($perm['edit_config'] == 1)? 'checked' : '';?>
                            class="inputCheck" colum='edit_config' data-id="<?= $perm['id']?>">
                            <span class="slider round"></span>
                        </label>
                    </div>				
                    <div class="col-md-12 mb-1" data-placement="right" data-toggle="popover" data-content="Pra habilitar a opção 'Deletar' precisa estar habilitar a opção 'Ver de configurações'">
                        <label class="align-middle">Deletar configurações</label>
                        <label class="switch"> 
                            <input name="del_config" type="checkbox" <?= $disabled?>
                            <?= ($perm['del_config'] == 1)? 'checked' : '';?>
                            class="inputCheck" colum='del_config' data-id="<?= $perm['id']?>">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>    
            </div>
            </div>
        </div>
    </div> 
    <?php endforeach;?>
</div>