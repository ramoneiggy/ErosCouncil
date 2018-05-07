<?php 
include "head.php";
include "classes.php";
?>

<?php
if (!isset($_SESSION['u_id'])) {
    die("You are not welcome here, go away!!!");
}
?>

<div class="container-fluid text-left">
    <h4>Welcome to your <b>PORNFOLIO</b> <?php echo $_SESSION['u_uid']; ?>!</h4>
</div>
<hr>
<div class="container-fluid col-sm-12 text-left">
    <div class="row">
        <div class="col-sm-4">
        <h5 class="text-center"><b>YOUR PORN SITE RATINGS</b></h5><hr>
        <?php Draw::userPornRatings() ?>
        </div>
        <div class="col-sm-4">EMPTY</div>
        <div class="col-sm-4">EMPTY</div>
    </div>
</div>












<?php 
include "footer.php";
?>