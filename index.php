<?php 
    session_start();
    if(isset($_SESSION['login'])){
        header('location: /home');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/framework/bootstrap.min.css">
    <link href="./assets/framework/font-awesome/css/all.min.css" rel="stylesheet">
    <title>Home</title> 
    <style>
        .modal-header, .modal-body, .modal-footer {
            background: #1f283e;
        }    
    </style>   
</head>
<body style="background: #1f283e; color: white;">
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-6">
                <div class="row p-3">
                    <div class="col-md-12 text-center">
                        <img class="img-fluid" src="assets/img/logo2.png" alt="">
                    </div>
                    <div class="col-md-12 border">
                        
                        <form id="formLogin">
                            <h2 class="text-center">Login</h2>
                            <label for="email">E-mail</label>
                            <input class="form-control" type="email" name="email" id="email" required> 

                            <label for="senha">Senha</label>
                            <input class="form-control" type="password" name="senha" id="senha" required>
                            <div class="text-right">
                                <a href="#" class="small" data-toggle="modal" data-target="#modalRecuperarSenha">
                                    Esqueci minha senha
                                </a>
                            </div>
                            <div class="mt-4" id="msgLogin"></div> 

                            <button class="btn btn-primary btn-block mt-3 mb-3">Continuar</button>
                        </form>
                    </div>
                    <!-- <div class="col-md-6 border">
                        <form action="">   
                            <h2 class="text-center">Cadastrar</h2>
                            
                            <label for="nome" class="col-md-12">Nome
                                <input class="form-control" type="text" name="nome" id="nome"> 
                            </label>

                            <label for="email"  class="col-md-12">E-mail
                                <input class="form-control" type="email" name="email" id="email">
                            </label>

                            <label for="cep"  class="col-md-12">CEP
                                <input class="form-control" type="text" name="cep" id="cep"> 
                            </label>

                            <label for="endereco"  class="col-md-8">Endereço
                                <input class="form-control" type="text" name="endereco" id="endereco">
                            </label>

                            <label for="n"  class="col-md-3">Nº
                                <input class="form-control" type="text" name="n" id="n">
                            </label>

                            <label for="complemento"  class="col-md-12">Complemento
                                <input class="form-control" type="text" name="complemento" id="complemento">
                            </label>

                            <label for="bairro"  class="col-md-4">Bairro
                                <input class="form-control" type="text" name="bairro" id="bairro">
                            </label>

                            <label for="cidade"  class="col-md-4">Cidade
                                <input class="form-control" type="text" name="cidade" id="cidade">
                            </label>

                            <label for="estado"  class="col-md-4">Estado
                                <input class="form-control" type="text" name="estado" id="estado"> 
                            </label>

                            <label for="senha"  class="col-md-12">Senha
                                <input class="form-control" type="password" name="senha" id="senha"> 
                            </label>

                            <button class="btn btn-primary btn-block mt-3 mb-3">Cadastrar</button>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>
    </div>   
    <!-- Modal para recuperar senha -->
    <div class="modal fade" id="modalRecuperarSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">
                        Recuperar senha
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formRecuperarSenha">
                    <div class="modal-body">
                        <label class="col-md-12" id="msgEditDescricaoPermissaoModal">
                        </label>
                        E-mail:
                        <input class="form-control" type="email" name="email" required>                        
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                        <button class="btn btn-primary">Sim</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <script src="./assets/framework/jquery-3.5.1.min.js"></script>    
    <script src="./assets/framework/bootstrap.min.js"></script>
    <script src="./assets/js/script.js"></script>
</body>
</html>