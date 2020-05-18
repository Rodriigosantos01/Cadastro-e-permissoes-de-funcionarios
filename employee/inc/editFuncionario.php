<?php 
    session_start();
    require "../../autoload.php";

    use App\Permissao;
    use App\Funcionario;
    
    $id = $_GET['id'];
    $idEmpresa = $_SESSION['id_empresa'];
    $funcionario = new Funcionario();
    $rsF = $funcionario->select('id', $id, $idEmpresa);    
?>
<div class="row">
    <label class="col-md-6">
        Nome:
        <input class="form-control" type="text" name="nome" value="<?= $rsF['nome']?>" required>
        <input type="hidden" name="id" value="<?= $rsF['id']?>">
    </label>

    <label class="col-md-6">
        E-mail:
        <input class="form-control" type="email" name="email" value="<?= $rsF['email']?>" required>
    </label>
</div>
<div class="row">
    <label class="col-md-6">
        CPF/CNPJ:
        <input class="form-control" type="text" name="cpf_cnpj" value="<?= $rsF['cpf_cnpj']?>" required>
    </label>

    <label class="col-md-6">
        <?php 
            $permissao = new Permissao();
            $rs = $permissao->selectAll($idEmpresa);		
        ?>
        <?php if($rs):?>
        Permissão:
        <select class="form-control" name="id_permissao">                                
                <?php foreach($rs as $perm): ?>
                    <option <?= ($rsF['id_permissao'] == $perm['id']? 'selected': '') ?> value="<?= $perm['id']?>"><?= $perm['nome']?></option>
                <?php endforeach;?>
        </select>  
        <?php else:?>
            <p class="mt-4">
                <a class="text-danger" href="../permission">Cadastre uma permissão para continuar</a>
            </p>
        <?php endif;?>                          
    </label>
</div>
<div class="row">
    <label class="col-md-3">CEP:
        <input class="form-control" type="text" name="cep" id="cep" value="<?= $rsF['cep']?>" required>
    </label>

    <label class="col-md-7">Endereço:
        <input class="form-control" type="text" name="endereco" value="<?= $rsF['endereco']?>" id="rua" required>
    </label>

    <label class="col-md-2">Nº:
        <input class="form-control" type="text" name="numero" value="<?= $rsF['numero']?>" id="numero" required>
    </label>
</div>
<div class="row">
    <label class="col-md-4">Complemento:
        <input class="form-control" type="text" name="complemento" value="<?= $rsF['complemento']?>">
    </label>

    <label class="col-md-3">Bairro:
        <input class="form-control" type="text" name="bairro" id="bairro" value="<?= $rsF['bairro']?>" required>
    </label>

    <label class="col-md-3">Cidade:
        <input class="form-control" type="text" name="cidade" id="cidade" value="<?= $rsF['cidade']?>" required>
    </label>

    <label class="col-md-2">UF:
        <input class="form-control" type="text" name="uf" id="uf" value="<?= $rsF['estado']?>" required>
    </label>
</div> 