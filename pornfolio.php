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
    <?php 
    if (Check::ifAdmin($_SESSION['u_id']) == 1){
        echo "<a href='administration.php'><button type='submit' class='btn btn-success' name='admin'>ADMINISTRATION</button></a>";
    }
    ?>
</div>
<hr>
<div class="container-fluid col-sm-12 text-left">
    <div class="row">
        <div class="col-sm-4">
            <h5 class="text-center"><b>YOUR INFO</b></h5><hr>
            <?php 
            Draw::userInfo($_SESSION['u_id'])
            ?>
            <hr>
        </div>
        <div class="col-sm-4">
            <h5 class="text-center"><b>YOUR PORN SITE RATINGS</b></h5><hr>
            <?php Draw::userPornRatings() ?>
        </div>
        <div class="col-sm-4">
            <h5 class="text-center"><b>YOUR PORN SITE REVIEWS</b></h5><hr>
            <?php Draw::showUsersReviews($_SESSION['u_id']); ?>
        </div>
    </div>
</div>
<?php 
include "footer.php";
?>