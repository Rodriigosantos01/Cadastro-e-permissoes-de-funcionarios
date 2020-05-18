<?php 
    namespace App;
    use App\Conexao;

    class Login
    {
        private static $pdo;        
        
        function __construct() {
            self::$pdo = Conexao::connection();             
        }

        function login(string $email, string $senha) {
            try {
                (String) $sql = "SELECT * FROM usuarios WHERE email=:email";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":email", $email, \PDO::PARAM_STR);
                $stmt->execute();

                $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
                
                if($rs){                    
                    if (password_verify($senha, $rs['senha'])) {
                        session_start();
                        $_SESSION['login'] =        true;
                        $_SESSION['nome'] =         $rs['nome'];
                        $_SESSION['id'] =           $rs['id'];
                        $_SESSION['id_empresa'] =   $rs['id_empresa'];
                        $_SESSION['id_permissao'] = $rs['id_permissao'];
                        $_SESSION['id_nivel'] =     $rs['id_nivel'];
                        
                        return ["login" => true, "msg"=>
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Login realizado com sucesso!</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'];         
                    }
                    return ["login" => false, "msg"=>
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Ops!!!</strong> senha inválida
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'];                    
                }
                return ["login" => false, "msg"=>
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Ops!!!</strong> Dados não encontrados!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'];               

            } catch (PDOException $ex) {
                throw $ex;
            }
        }
    }