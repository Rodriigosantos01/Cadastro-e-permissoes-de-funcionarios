<?php 
    namespace App;

    class Enviandoemail
    {
        private static $pdo;         
        
        function __construct() {
            self::$pdo = Conexao::connection();             
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
    }