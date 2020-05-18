<?php 
    namespace App;
    use App\Conexao;
    @session_start();

    class User
    {
        private static $pdo;  
        
        function __construct()
        {
            self::$pdo = Conexao::connection();   
        }

        static function select()
        {
            try {
                self::$pdo = Conexao::connection();
                (String) $sql = "SELECT a.nome, a.email, a.cpf_cnpj, a.cep, a.endereco, a.numero, a.complemento,
                a.bairro, a.cidade, a.estado, b.*
                                FROM usuarios as a
                                LEFT JOIN permissoes as b ON b.id = a.id_permissao                
                                WHERE a.id=:id";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":id", $_SESSION['id'], \PDO::PARAM_INT);
                $stmt->execute();

                $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $rs;

            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function update(string $cep, string $endereco, string $numero, string $complemento, string $bairro, string $cidade, string $estado,
        int $id)
        {
            try {
                (String) $sql = "UPDATE usuarios SET cep=:cep, endereco=:endereco, complemento=:complemento, bairro=:bairro, cidade=:cidade, estado=:estado WHERE id=:id";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":cep", $cep, \PDO::PARAM_STR);
                $stmt->bindValue(":endereco", $endereco, \PDO::PARAM_STR);
                $stmt->bindValue(":complemento", $complemento, \PDO::PARAM_STR);
                $stmt->bindValue(":bairro", $bairro, \PDO::PARAM_STR);
                $stmt->bindValue(":cidade", $cidade, \PDO::PARAM_STR);
                $stmt->bindValue(":estado", $estado, \PDO::PARAM_STR);
                $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
                $rs = $stmt->execute();                
                return $rs;
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function updateSenha(string $senha, int $id)
        {
            try {
                $newSenha = password_hash($senha, PASSWORD_BCRYPT);
                (String) $sql = "UPDATE usuarios set senha=:senha WHERE id=:id";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":senha", $newSenha, \PDO::PARAM_STR);                
                $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
                $stmt->execute();                
                return $stmt;
            } catch (PDOException $ex) {
                throw $ex;
            }
        }
    }