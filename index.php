<?php
include ('header.php');
?>
<p>You have received an e-mail with your document number and a token key, save them, you will need at the final.</p>
<p class="lead">
    <form action="voting.php" method="post">
        <input class="form-control m-2" type="text" name="doc" id="doc" placeholder="Your document number" style="width: 290px;">
        <button class="btn btn-primary btn-lg m-2" type="submit">Go!</button>
    </form>
    
</p>
<?php
include ('footer.php');
?>
       