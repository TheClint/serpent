<?php 
    class PdoFactory{

        private static $dbh;

        public static function init(){
            $user = "root";
            $pass = "";
            self::$dbh = new PDO('mysql:host=localhost;dbname=vivarium', $user, $pass);
        }

        public static function getDbh(){
            return self::$dbh;
        }
    }
?>