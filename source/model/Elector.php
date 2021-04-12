<?php

namespace Source\Model;

use Source\Utils\Connect;
use PDO;

Class Elector
{
    public function checkElector($document)
    {
        $connect = new Connect();
        $conn = $connect->connect();
        $stmt = $conn->prepare("SELECT * FROM electors WHERE document=:document LIMIT 1");
        $stmt->bindParam(':document', $document);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function checkElectorToken($token)
    {
        $connect = new Connect();
        $conn = $connect->connect();
        $stmt = $conn->prepare("SELECT * FROM electors WHERE token=:token LIMIT 1");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if(!empty($stmt->fetchAll())){
            return true;
        }
        else{
            return false;
        }
    }
}