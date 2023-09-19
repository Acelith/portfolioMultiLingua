<?php 
require_once CLASS_PATH . "db.class.php";

class Language{

    static function getKey($key){
        $languageDb = new ManagerDb();
        # Implementare sistema a parametri per Query
        $query= "SELECT text FROM key WHERE key= '". $key . "' and language= '". $_COOKIE["lang"] . "'";

        $retArr= $languageDb->selectRow($query);

        return $retArr["text"];
    }
} 