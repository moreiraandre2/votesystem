<?php

include ('header.php');

use Source\Model\Candidate;
use Source\Model\Elector;
use Source\Model\Election;

$electionObject = new Election();
$election = $electionObject->getElectionByID(1);

$candidateObject = new Candidate();
$candidates = $candidateObject->getCandidates();

$electorObject = new Elector();

if(!isset($_POST['doc'])){
    header('Location:index.php');
}

$elector = $electorObject->checkElector($_POST['doc']);

if(!empty($elector)){ 
    session_start();
    $_SESSION['elector_id'] = $elector[0]['id'];
    $_SESSION['election_id'] = $election[0]['id'];
?>
<p class="alert alert-info"><strong>You are participating the election <?php echo $election[0]['name']; ?></strong></p>
<form action="confirm.php" method="post">
<h4>Choose your candidate:</h4>
<?php
foreach($candidates as $candidate){

?>
<div class="form-check mt-2">
  <input class="form-check-input" type="radio" name="candidate" id="candidate" value="<?php echo $candidate['id'] ?>">
  <label class="form-check-label" for="flexRadioDefault1">
    <?php echo $candidate['name']; ?>
  </label>
</div>
<?php
}
?>
<button type="submit" class="btn btn-primary btn-md mt-5">Choose</button>
</form>
<?php
}
include ('footer.php');
?>