<?php

class Database {

    public function getConnection()
    {
        try {
            $pdo = new PDO("mysql:dbname=test_nuvemShop;host=localhost", "root", "");
            return $pdo;

        } catch(PDOException $err){
            echo $err;
        }
    }
}