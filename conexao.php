<?php
 /*************************************************************************************************************  
 * @author William F. Leite                                                                                   *                                                                                             *  
 * Descrição: Classe elaborada com o objetivo de auxlilar nas operações CRUDs em diversos SGBDS, possui       *  
 * funcionalidades para construir instruções de INSERT, UPDATE E DELETE onde as mesmas podem ser executadas   *  
 * nos principais SGBDs, exemplo SQL Server, MySQL e Firebird. Instruções SELECT são recebidas integralmente  *  
 * via parâmetro.                                                                                             *  
 *************************************************************************************************************/  
 
/*
 * Constantes de parâmetros para configuração da conexão
 */
define('SGBD', 'mysql');
define('HOST', 'localhost');
define('DBNAME', 'db_blog');//nome do banco de dados
define('CHARSET', 'utf8');
define('USER', 'root'); //usuário do mysql
define('PASSWORD', ' '); //senha do mysql
 
class conexao {
    
    /*
     * Atributo estático de conexão
     */
    private static $pdo;
 
    /*
     * Escondendo o construtor da classe
     */
    private function __construct() {
        //
    }
 
/*  
    * Método estático para retornar uma conexão válida  
    * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão  
    */  
 
     public static function getInstance() {  
     if (!isset(self::$pdo)) {  
       try {  
         $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);  
         self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);  
       } catch (PDOException $e) {  
         print "Erro: " . $e->getMessage();  
       }  
     }  
     return self::$pdo;  
   }  


}
?>