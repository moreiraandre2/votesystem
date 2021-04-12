<?php

namespace Source\Model;

use Source\Utils\Connect;
use PDO;

Class Candidate
{
    public function getCandidates()
    {
        $connect = new Connect();
        $conn = $connect->connect();
        $stmt = $conn->prepare("SELECT * FROM candidates");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function getCandidateById($id)
    {
        $connect = new Connect();
        $conn = $connect->connect();
        $stmt = $conn->prepare("SELECT * FROM candidates WHERE id = :id LIMIT 1");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}