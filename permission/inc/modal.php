<!-- Modal para deletar permissão -->
<div class="modal fade" id="modalEditPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Editar descricao da permissão
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editDescricaoPermissao">
                <div class="modal-body">
                <label class="col-md-12" id="msgEditDescricaoPermissaoModal">
                </label>
                    <input type="hidden" name="idEditPermissao" id="idEditPermissao">
                    Descricao:
                    <input class="form-control" type="text" name="DescricaoEditPermissao" id="DescricaoEditPermissao">                
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                    <button class="btn btn-primary">Sim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para deletar permissão -->
<div class="modal fade" id="modalDelPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Deletar permissão
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="delPermissao">
            <div class="modal-body text-center">
            <label class="col-md-12" id="msgDelPermissaoModal">
            </label>
                <input type="hidden" name="idDelPermissao" id="idDelPermissao">
                Deseja realmente deletar essa permissão ?
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                <button class="btn btn-primary">Sim</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para adicionar nova permissão -->
<div class="modal fade" id="modalNewPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Adicionar nova permissão
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="newPermissao">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-md-12" id="msgPermissaoModal">
                        </label>
                        <label class="col-md-12">Descricao:
                            <input class="form-control" type="text" name="descricao" required>
                        </label>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">Funcionários</h4>
                                <hr>
                                <div class="col-md-12 mb-1">
                                    <label class="align-middle">Ver lista de funcionário</label>
                                    <label class="switch"> 
                                        <input name="viewFuncionario" value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <label class="align-middle">Cadastrar funcionário</label>
                                    <label class="switch"> 
                                        <input name="newFuncionario" value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <label class="align-middle">Editar funcionário</label>
                                    <label class="switch"> 
                                        <input name="editFuncionario" value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <label class="align-middle">Deletar funcionário</label>
                                    <label class="switch"> 
                                        <input name="delFuncionario" value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>  
                            <div class="col-md-6">
                                <h4 class="text-center">Configurações</h4>
                                <hr>
                                <div class="col-md-12 mb-1">
                                    <label class="align-middle">Ver configurações</label>
                                    <label class="switch"> 
                                        <input name="viewConfig" value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <label class="align-middle">Cadastrar configurações</label>
                                    <label class="switch"> 
                                        <input name="newConfig" value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <label class="align-middle">Editar configurações</label>
                                    <label class="switch"> 
                                        <input name="editConfig" value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>				
                                <div class="col-md-12 mb-1">
                                    <label class="align-middle">Deletar configurações</label>
                                    <label class="switch"> 
                                        <input name="delConfig" value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>    
                        </div>                  
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                <button class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>