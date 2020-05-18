<?php 
    namespace App;
    use App\Permissao;

    class Permissao
    {
        private static $pdo;        
        
        function __construct() {
            self::$pdo = Conexao::connection();             
        }

        function insert($id_empresa, $descricao, $newFuncionario, $viewFuncionario, $editFuncionario, $delFuncionario, $newConfig, $viewConfig, $editConfig, $delConfig)
        {
            try {
                (String) $sql = "INSERT INTO permissoes
                (id_empresa, descricao, new_funcionario, view_funcionario, edit_funcionario, del_funcionario, new_config, view_config, edit_config, del_config) VALUES
                (:id_empresa, :descricao, :newFuncionario, :viewFuncionario, :editFuncionario, :delFuncionario, :newConfig, :viewConfig, :editConfig, :delConfig)                
                ";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);
                $stmt->bindValue(":descricao", $descricao, \PDO::PARAM_STR);                
                $stmt->bindValue(":newFuncionario", $newFuncionario, \PDO::PARAM_INT);                
                $stmt->bindValue(":viewFuncionario", $viewFuncionario, \PDO::PARAM_INT);                
                $stmt->bindValue(":editFuncionario", $editFuncionario, \PDO::PARAM_INT);                
                $stmt->bindValue(":delFuncionario", $delFuncionario, \PDO::PARAM_INT);                
                $stmt->bindValue(":newConfig", $newConfig, \PDO::PARAM_INT);                
                $stmt->bindValue(":viewConfig", $viewConfig, \PDO::PARAM_INT);                
                $stmt->bindValue(":editConfig", $editConfig, \PDO::PARAM_INT);                
                $stmt->bindValue(":delConfig", $delConfig, \PDO::PARAM_INT);                
                                             
                $rs = $stmt->execute();                
                return $rs;
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function select(string $descricao, int $id_empresa, int $id = 0) {
            try {
                if($id > 0){
                    (String) $sql = "SELECT * FROM permissoes WHERE descricao=:descricao AND id_empresa=:id_empresa AND id_status =:id_status AND id!=:id";
                }else{
                    (String) $sql = "SELECT * FROM permissoes WHERE descricao=:descricao AND id_empresa=:id_empresa AND id_status =:id_status";
                }
                
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":descricao", $descricao, \PDO::PARAM_STR);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);
                $stmt->bindValue(":id_status", '1', \PDO::PARAM_INT);
                if($id > 0){
                    $stmt->bindValue(":id", $id, \PDO::PARAM_INT);
                }
                $stmt->execute();

                $rs = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $rs;            

            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function selectKey(int $id_empresa, $coluna, $valor) {
            try {
                
                (String) $sql = "SELECT * FROM permissoes WHERE $coluna=:valor AND id_empresa=:id_empresa";             
                
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":valor", $valor, \PDO::PARAM_STR);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);
                $stmt->execute();

                $rs = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $rs;            

            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function selectAll($id_empresa) {
            try {
                (String) $sql = "SELECT * FROM permissoes WHERE id_empresa=:id_empresa AND id_status=:id_status";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);
                $stmt->bindValue(":id_status", '1', \PDO::PARAM_INT);
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
                (String) $sql = "UPDATE permissoes SET id_status=:id_status, id_user_del=:id_user_del, date_delete=:date_delete
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

        function update($coluna, $valor, $id_empresa, $id){
            
            try {
                (String) $sql = "UPDATE permissoes SET $coluna=:valor WHERE id_empresa=:id_empresa AND id=:id";
                
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":valor", $valor, \PDO::PARAM_STR);                               
                $stmt->bindValue(":id_empresa", $id_empresa, \PDO::PARAM_INT);                               
                $stmt->bindValue(":id", $id, \PDO::PARAM_INT);                               
                $rs =  $stmt->execute();

                return $rs;      
            } catch (PDOException $ex) {
                throw $ex;
            }
        }
    }