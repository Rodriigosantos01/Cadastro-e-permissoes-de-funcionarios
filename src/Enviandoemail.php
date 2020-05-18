<?php 
    namespace App;

    class Enviandoemail
    {
        private static $pdo;         
        
        function __construct() {
            self::$pdo = Conexao::connection();   
            //echo "ENVIAR EMAIL OK AHAHAHAHAH <hr>";
        }

        function insert($email, $tipo)
        {
            try {
                (String) $sql = "INSERT INTO tbl_enviar_email (email, tipo) VALUES (:email, :tipo)";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":email", $email, \PDO::PARAM_STR);
                $stmt->bindValue(":tipo", $tipo, \PDO::PARAM_INT);                                                             
                                             
                $rs = $stmt->execute();                
                return $rs;
            } catch (PDOException $ex) {
                throw $ex;
            }
        }

        function select($qtd)
        {
            try {
                (String) $sql = "SELECT * FROM tbl_enviar_email WHERE data_enviado IS NULL LIMIT :qtd ";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":qtd", $qtd, \PDO::PARAM_INT);
                $stmt->execute();      

               $rs = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $rs; 
            } catch (PDOException $ex) {
                throw $ex;
            }
        }  
        
        function confimarEnvio($id)
        {
            try {
                $date = date('Y-m-d H:i:s');
                (String) $sql = "UPDATE tbl_enviar_email SET data_enviado=:data_enviado WHERE id=:id";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindValue(":data_enviado", $date, \PDO::PARAM_STR);
                $stmt->bindValue(":id", $id, \PDO::PARAM_INT);                                                             
                                             
                $rs = $stmt->execute();                
                return $rs;
            } catch (PDOException $ex) {
                throw $ex;
            }
        }
    }