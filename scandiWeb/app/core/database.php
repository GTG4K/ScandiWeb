<?php

class Database
{
    protected function connect()
    {

        try{
            
            $dsn = DB_TYPE.":host=". DB_HOST . ";dbname=" . DB_NAME . ";";
            $pdo = new PDO($dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;

        }catch(PDOException $e){
            die($e->getMessage());
        }
        
    }

    public function read($query, $data=[])
    {
        $db = $this->Connect();

        if(count($data)==0){
            $stm = $db->query($query);
            $check = 0;
            if($stm){
                $check = 1;
            }
        }else{
            $stm = $db->prepare($query);
            $check = $stm->execute($data);
        }

        if($check)
        {
            return $stm->fetchALL();
        }else{
            return false;
        }
    }

    public function write($query, $data=[])
    {
        $db = $this->Connect();

        if(count($data)==0){
            $stm = $db->query($query);
            $check = 0;
            if($stm){
                $check = 1;
            }
        }else{
            $stm = $db->prepare($query);
            $check = $stm->execute($data);
        }

        if($check)
        {
            return true;
        }else{
            return false;
        }
    }
}