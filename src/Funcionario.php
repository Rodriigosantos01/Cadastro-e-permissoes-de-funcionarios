<?php 
    namespace App;

    class Funcionario
    {
        private static $pdo; 
        private $id_nivel = 2;  
        
        function __construct() {
            self::$pdo = Conexao::connection();             
        }

        function update($id_permissao, $nome, $email, $cpf_cnpj, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado, $id)
        {
            try {
                (String) $sql = "UPDATE usuarios SET id_permissao=:id_permissao, nome=:nome, email=:email, cpf_cnpj=:cpf_cnpj,
                cep=:cep, endereco=:endereco, numero=:numero, complemento=:complemento, bairro=:bairro, cidade=:cidade, estado=:estado
                WHERE id=:id";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":id_permissao", $id_permissao, \PDO::PARAM_INT);
                $stmt->bindValue(":nome", $nome, \PDO::PARAM_STR);                
                $stmt->bindValue(":email", $email, \PDO::PARAM_STR);                                               
                $stmt->bindValue(":cpf_cnpj", $cpf_cnpj, \PDO::PARAM_STR);                
                $stmt->bindValue(":cep", $cep, \PDO::PARAM_STR);                
                $stmt->bindValue(":endereco", $endereco, \PDO::PARAM_STR);                
                $stmt->bindValue(":numero", $numero, \PDO::PARAM_STR);                
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

        function insert($id_empresa, $id_permissao, $nome, $email, $senha, $cpf_cnpj, $cep, $endereco, $numero, $complemento, $bairro, $cidade, $estado)
        {
            try {
                (String) $sql = "INSERT INTO usuarios
                (id_empresa, id_nivel, id_permissao, nome, email, senha, cpf_cnpj, cep, endereco, numero, complemento, bairro, cidade, estado) VALUES
                (:id_empresa, :id_nivel, :id_permissao, :nome, :email, :senha, :cpf_cnpj, :cep, :endereco, :numero, :complemento, :bairro, :cidade, :estado)                
                ";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);
                $stmt->bindValue(":id_nivel", $this->id_nivel, \PDO::PARAM_INT);
                $stmt->bindValue(":id_permissao", $id_permissao, \PDO::PARAM_INT);
                $stmt->bindValue(":nome", $nome, \PDO::PARAM_STR);                
                $stmt->bindValue(":email", $email, \PDO::PARAM_STR);                
                $stmt->bindValue(":senha", $senha, \PDO::PARAM_STR);                
                $stmt->bindValue(":cpf_cnpj", $cpf_cnpj, \PDO::PARAM_STR);                
                $stmt->bindValue(":cep", $cep, \PDO::PARAM_STR);                
                $stmt->bindValue(":endereco", $endereco, \PDO::PARAM_STR);                
                $stmt->bindValue(":numero", $numero, \PDO::PARAM_STR);                
                $stmt->bindValue(":complemento", $complemento, \PDO::PARAM_STR);                
                $stmt->bindValue(":bairro", $bairro, \PDO::PARAM_STR);                
                $stmt->bindValue(":cidade", $cidade, \PDO::PARAM_STR);                
                $stmt->bindValue(":estado", $estado, \PDO::PARAM_STR);                                             
                                             
                $rs = $stmt->execute();                
                return $rs;
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function select($coluna, $valor, $id_empresa)
        {
            try {
                (String) $sql = "SELECT * FROM usuarios WHERE $coluna=:valor AND id_empresa=:id_empresa AND id_status=:id_status";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":valor", $valor, \PDO::PARAM_STR);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);   
                $stmt->bindValue(":id_status", '1', \PDO::PARAM_INT);   
                $stmt->execute();                                                    
                                             
                $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $rs;  
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function validar($coluna, $valor, $id_empresa, $id)
        {
            try {
                (String) $sql = "SELECT * FROM usuarios WHERE $coluna=:valor AND id_empresa=:id_empresa AND
                id_status=:id_status AND id!=:id";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":valor", $valor, \PDO::PARAM_STR);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);   
                $stmt->bindValue(":id_status", '1', \PDO::PARAM_INT);   
                $stmt->bindValue(":id", $id, \PDO::PARAM_INT);   
                $stmt->execute();                                                    
                                             
                $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $rs;  
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function selectAll($id_empresa)
        {
            try {
                (String) $sql = "SELECT * FROM usuarios WHERE id_empresa=:id_empresa AND id_status=:id_status AND id_nivel=:id_nivel";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);
                $stmt->bindValue(":id_status", '1', \PDO::PARAM_INT);
                $stmt->bindValue(":id_nivel", $this->id_nivel, \PDO::PARAM_INT);
                $stmt->execute();

                $rs = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $rs;      
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function delete($id_empresa, $id, $idUser){
            $date = date('Y-m-d H:i:s');
            try {
                (String) $sql = "UPDATE usuarios SET id_status=:id_status, id_user_del=:id_user_del, date_delete=:date_delete
                WHERE id_empresa=:id_empresa AND id=:id";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":id_status", '3', \PDO::PARAM_INT);
                $stmt->bindValue(":id_user_del", $idUser, \PDO::PARAM_INT);
                $stmt->bindValue(":date_delete", $date, \PDO::PARAM_STR);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);
                $stmt->bindValue(":id", $id, \PDO::PARAM_INT);                
                $rs =  $stmt->execute();

                return $rs;      
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function updateSenha(string $senha, string $email)
        {
            try {
                $newSenha = password_hash($senha, PASSWORD_BCRYPT);
                (String) $sql = "UPDATE usuarios set senha=:senha WHERE email=:email";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":senha", $newSenha, \PDO::PARAM_STR);                
                $stmt->bindValue(":email", $email, \PDO::PARAM_INT);
                $stmt->execute();                
                return $stmt;
            } catch (PDOException $ex) {
                throw $ex;
            }
        }
    }

