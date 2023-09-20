<?php
class ManagerDb extends SQLite3
{
    private $dbToSelect;
    private $dbPath;
    private $dbConnection;
    function __construct($dbToSelect = "language")
    {
        $this->dbToSelect = $dbToSelect;
        $this->dbPath = "db" . SEPARATOR . $this->dbToSelect . ".db";

        $this->findDb();
    }

    private function findDb()
    {
        if (!file_exists($this->dbPath)) {
            throw new Exception('Database not found: ' . $this->dbToSelect);
        }
    }

    function connectDb()
    {
        $this->dbConnection = new SQLite3($this->dbPath);

        if (!$this->dbConnection) {
            echo $this->dbConnection->lastErrorMsg();
            throw new Exception('Cant open DB: ' . $this->dbToSelect . 'Err: ' . $this->lastErrorMsg());
        }
    }

    function insertRow($table, $arrayWithData)
    {
        if (!is_array($arrayWithData)) {
            throw new Exception('function insertRow: Not an array! ');
        }

        $query = "INSERT INTO " . $table . "(";

        $values = "VALUES (";
        foreach ($arrayWithData as $key => $value) {
            $query .= $key;
            $values .= $value;
        }
        $values .= ") ";
        $query .= ") " . $values;

        $ret = $this->dbConnection->exec($query);

        if (!$ret) {
            throw new Exception('Error inserting row! Err: ' . $this->dbConnection->lastErrorMsg());
        }
        $this->dbConnection->close();
    }

    function selectRow($query, $parArray = null)
    {
        $db = new SQLite3($this->dbPath);
        $ret = $db->prepare($query);

        if(!is_null($parArray)){
            foreach ($parArray as $key => $value) {
                $ret->bindValue(':' . $key, $value, SQLITE3_TEXT);
            }
        }
        $returnArray = $ret->execute();

        return $returnArray->fetchArray();
    }
}