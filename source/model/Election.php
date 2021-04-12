<?php
namespace Source\Model;

use Source\Utils\Connect;
use PDO;

Class Election
{
    public function getElectionByID($id)
    {
        $connect = new Connect();
        $conn = $connect->connect();
        $stmt = $conn->prepare("SELECT * FROM elections WHERE id=:id LIMIT 1");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}