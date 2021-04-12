<?php
include ('header.php');
session_start();

use Source\Model\Vote;

$voteObject = new Vote();
$vote = $voteObject->voteDeposit($_POST['token'],  $_SESSION['election_id'], $_SESSION['elector_id'], $_SESSION['candidate_id']);

if($vote){
?>
<p class="alert alert-success"><strong>Thank You! Your vote is deposited!</strong></p>
<a href="index.php" class="btn btn-primary mt-5">Back!</a>
<?php
}
else{
?>
<p class="alert alert-danger"><strong>Sorry! An Error occurred! Try again later.</strong></p>
<a href="index.php" class="btn btn-primary mt-5">Back!</a>
<?php
}

include ('footer.php');
?>