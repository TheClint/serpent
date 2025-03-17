<?php

require_once('PdoFactory.php');

abstract class Donnee{

    // initialisation de la connection avec la base de donnée si elle n'a jamais été faite
    public function __construct(){
        if(PdoFactory::getDbh() == null)
          PdoFactory::init();
    }

    // fonction ajouter commune à toutes les classes héritants de celle-ci
    public function add(){

        $tabInsert = "";
        $tabValue = "";
        $tabExecute = [];
        //mise en forme de la requête sql
        foreach(array_keys(get_class_vars(get_class($this))) as $var){
            if($var != "id"){
                $tabInsert = $tabInsert.$var.", ";
                $tabValue = $tabValue.":".$var.", ";
                $tabExecute[$var] = $this->$var;
            }
        }

        // suppression des deux derniers caractères ", " de la dernière ligne
        $tabInsert = substr($tabInsert, 0, strlen($tabInsert)-2);
        $tabValue = substr($tabValue, 0, strlen($tabValue)-2);

        $sql = "INSERT INTO ".get_class($this)." (
            ".$tabInsert."
            )
        VALUES (
            ".$tabValue."
        )";
        
        // envoie de la requête, execution, et récupération
        $sth = PdoFactory::getDbh()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute($tabExecute);
        $this->setId(PdoFactory::getDbh()->lastInsertId());
        $red = $sth->fetchAll();

    }

    public function update(){

        $tabUpdate = "";
        $tabExecute = [];
        foreach(array_keys(get_class_vars(get_class($this))) as $var){
            $tabUpdate = $tabUpdate.$var." = :".$var.", ";
            $tabExecute[$var] = $this->$var;
        }

        $tabUpdate = substr($tabUpdate, 0, strlen($tabUpdate)-2);

        $sql = "UPDATE ".get_class($this)." SET ".$tabUpdate." WHERE id = :id";
        
        $sth = PdoFactory::getDbh()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute($tabExecute);

        $red = $sth->fetchAll();  
    }

    // retourne l'instance de classe ayant l'id fournie
    public static function read(int $id){
        
        $sql = "SELECT * FROM ".get_called_class()."
        WHERE id = :id";

        

        $sth = PdoFactory::getDbh()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute([
            'id' => $id
        ]);
        $red = $sth->fetchAll();    
        
        $resultats = [];
        $index = 0;
        foreach(array_keys(get_class_vars(get_called_class())) as $key => $var){
            if($var != "id"){
                $resultats[$index] = $red[0][$var];
                $index++;
            }
        }

        $instance = new (get_called_class())($resultats);
        
        $instance->setId($red[0]['id']);

        return $instance;
    
    }

    // delete l'objet courant en base
    public function delete(){
        $sql = "DELETE FROM ".get_class($this)."
        WHERE id = :id";

        $sth = PdoFactory::getDbh()->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute([
            'id' => $this->id
        ]);
        $red = $sth->fetchAll();

    }
}