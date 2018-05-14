<?php 
include "head.php";

if (!isset($_SESSION['u_id'])) {
    die("Please login or <a class='link-black' href='signup.php'>sign up</a> to view this profile.");
}
?>
<div class="container-fluid col-sm-12 text-left">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h6><b><?php echo htmlspecialchars($_GET['user']); ?> FAVORITES</b></h6>
            <?php Draw::listFavorites(htmlspecialchars($_GET['user'])) ?>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
        <h5 class="text-center"><b>USER INFO</b></h5><hr>
            <?php Draw::userInfo(htmlspecialchars($_GET['user'])) ?>
        </div>
        <div class="col-sm-4">
        <h5 class="text-center"><b>USER PORN SITE RATINGS</b></h5><hr>
            <?php Draw::userPornRatings(htmlspecialchars($_GET['user'])) ?>
        </div>
        <div class="col-sm-4">
        <h5 class="text-center"><b>USER PORN SITE REVIEWS</b></h5><hr>
            <?php Draw::showUsersReviews(htmlspecialchars($_GET['user'])); ?>
        </div>
    </div>
</div>
<?php 
include "footer.php";
?>