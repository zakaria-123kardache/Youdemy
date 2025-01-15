<?php 

namespace App\core;

use PDO;
use PDOException;

class Database {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $db = "youdemy";
    private static $connexion;
    private static $instance;
    public static $counter = 0;


    private function __construct(){
        if (!self::$connexion) {
            try {
                self::$connexion = new PDO(
                    "mysql:host=" . self::$servername . 
                    ";dbname=" . self::$db . 
                    ";charset=UTF8",
                    self::$username,
                    self::$password
                );
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        
    }

    public static function getInstance() {
        if(!self::$instance){
            self::$instance = new Database();
            self::$counter++;
        }
        
            return self::$instance ;

        }
        
        public function getConnection(){
            return self::$connexion;
        }

   
}