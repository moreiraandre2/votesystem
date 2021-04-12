<?php

namespace Source\Model;

use Source\Utils\Connect;
use Source\Model\Elector;
use PDO;
use PDOException;

Class Vote
{
    public function voteDeposit($token, $election, $elector, $candidate)
    {
        $electorObject = new Elector();
        $token = $electorObject->checkElectorToken($token);

        $checkVoteInElection = $this->checkVoteInElection($election, $elector);

        if($token && $checkVoteInElection){
            try{
                $connect = new Connect();
                $conn = $connect->connect();
                $stmt = $conn->prepare("INSERT INTO votes(elector_id, candidate_id, election_id) VALUES(:elector, :candidate, :election)");
                $stmt->bindParam(':elector', $elector);
                $stmt->bindParam(':election', $election);
                $stmt->bindParam(':candidate', $candidate);
                $stmt->execute();
                return true;
            }
            catch(PDOException $e){
                var_dump($e->getMessage());
            }
        }
        else{
            return false;
        }
        
    }

    public function checkVoteInElection($election, $elector)
    {
        $connect = new Connect();
        $conn = $connect->connect();
        $stmt = $conn->prepare("SELECT * FROM votes WHERE election_id = :election AND elector_id = :elector");
        $stmt->bindParam(':election', $election);
        $stmt->bindParam(':elector', $elector);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if(empty($result)){
            return true;
        }
        else{
            return false;
        }
    }

}