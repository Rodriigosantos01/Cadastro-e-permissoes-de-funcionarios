<!-- Modal para cadastrar funcionário -->
<div class="modal fade" id="modalNewFuncionário" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Cadastrar funcionário
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="forNewFuncionario">
                <div class="modal-body">
                    <label class="col-md-12" id="msgNewFuncionario">
                    </label>
                    <div class="row">
                        <label class="col-md-6">
                            Nome:
                            <input class="form-control" type="text" name="nome" required>
                        </label>

                        <label class="col-md-6">
                            E-mail:
                            <input class="form-control" type="email" name="email" required>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-6">
                            CPF/CNPJ:
                            <input class="form-control" type="text" name="cpf_cnpj" required>
                        </label>

                        <label class="col-md-6">
                            <?php 
                                use App\Permissao;
                                $permissao = new Permissao();
                                $rs = $permissao->selectAll($idEmpresa);		
                            ?>
                            <?php if($rs):?>
                                Permissão:
                                <select class="form-control" name="id_permissao">                                
                                        <?php foreach($rs as $perm): ?>
                                            <option value="<?= $perm['id']?>"><?= $perm['descricao']?></option>
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
                            <input class="form-control" type="text" name="cep" id="cep" required>
                        </label>

                        <label class="col-md-7">Endereço:
                            <input class="form-control" type="text" name="endereco" id="rua" required>
                        </label>

                        <label class="col-md-2">Nº:
                            <input class="form-control" type="text" name="numero" id="numero" required>
                        </label>
                    </div>
                    <div class="row">
                        <label class="col-md-4">Complemento:
                            <input class="form-control" type="text" name="complemento">
                        </label>

                        <label class="col-md-3">Bairro:
                            <input class="form-control" type="text" name="bairro" id="bairro" required>
                        </label>

                        <label class="col-md-3">Cidade:
                            <input class="form-control" type="text" name="cidade" id="cidade" required>
                        </label>

                        <label class="col-md-2">UF:
                            <input class="form-control" type="text" name="uf" id="uf" required>
                        </label>
                    </div>        
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                    <?php if($rs):?>
                        <button class="btn btn-primary">Sim</button>
                    <?php endif;?>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar funcionário -->
<div class="modal fade" id="modalEditFuncionário" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Editar funcionário
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="forEdiFuncionario">
                <label class="col-md-12" id="msgEditFuncionario">
                </label>
                <div class="modal-body" id="editFuncionario">
                           
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                    <button class="btn btn-primary">Sim</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para deletar funcionário -->
<div class="modal fade" id="modalDelFuncionário" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                   Deletar funcionário
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDelFuncionario">                
                <div class="modal-body text-center">
                    <br>
                    <input type="hidden" name="id" id="idDel">
                    Deseja mesmo deletar esse funcionário?     
                    <br> <br>       
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                    <button class="btn btn-primary">Sim</button>                    
                </div>
            </form>
        </div>
    </div>
</div>

