<?php
include ('header.php');
session_start();

use Source\Model\Candidate;

$candidateObject = new Candidate();
$candidate = $candidateObject->getCandidateById($_POST['candidate']);
$_SESSION['candidate_id'] = $candidate[0]['id'];

?>
<h4>Your choose is <strong class="text-info"><?php echo  $candidate[0]['name']; ?></strong></h4>
<h5 class="mt-5">To confirm insert your token.</h5>
<form action="deposit.php" method="post">
    <input class="form-control" type="text" name="token" id="token" placeholder="Type your token">
    <button type="submit" class="btn btn-success mt-5">Confirm</button>
</form>
<?php
include ('footer.php');
?>