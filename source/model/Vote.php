<?php

namespace Source\Model;

use Source\Utils\Connect;
use Source\Model\Elector;
use PDO;

Class Vote
{
    public function voteDeposit($token, $election, $elector, $candidate)
    {
        $electorObject = new Elector();
        $elector = $electorObject->checkElectorToken($token);

        $checkVoteInElection = $this->checkVoteInElection($election, $elector);

        if($elector && $checkVoteInElection){
            $connect = new Connect();
            $conn = $connect->connect();
            $stmt = $conn->prepare("INSERT INTO votes(elector_id, candidate_id, election_id) VALUES(:elector, :candidate, :election)");
            $stmt->bindParam(':elector', $elector);
            $stmt->bindParam(':election', $election);
            $stmt->bindParam(':candidate', $candidate);

            if($stmt->execute()){
                return true;
            }
            else{
                return false;
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
        if(!$stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

}