<?php 
require_once CLASS_PATH . "db.class.php";

class Language{

    static function getKey($key){
        $languageDb = new ManagerDb();
        $query= "SELECT text FROM key WHERE key= :key and language= :lang";
        $parArr= array(
            ":key" => $key,
            ":lang" => $_COOKIE["lang"]
        );

        $retArr= $languageDb->selectRow($query, $parArr);

        return $retArr[$key];
    }
} 