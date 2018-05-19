<?php
include "head.php";
?>

<div class="container-fluid text-left">
    <h4>Welcome home <?php if($_SESSION['gender'] == 'male'){echo 'Councilman';}elseif($_SESSION['gender'] == 'female'){echo 'Councilwoman';}elseif($_SESSION['gender'] == 'other'){echo 'Councilperson';} ?> <?php if (isset($_SESSION['u_id'])){echo $_SESSION['u_uid']."! How's it hangin'?";}else{echo "- please login or <a class='link-black' href='signup.php'>sign up</a>.";}?></h4>
    <?php
        if (array_key_exists("signup", $_GET) && $_GET["signup"] == "success"){
            echo "<p>Congratulations, you have successfully signed up, now please login.</p>";
        }
    ?>
</div>
<hr>


<div class="container-fluid">
    <?php
    if (isset($_SESSION['u_id'])){
    ?>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h6><b>YOUR FAVORITES</b></h6>
            <?php Draw::listFavorites($_SESSION['u_uid']) ?>
            <hr>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-center"><b>COUNCIL FAVORITES</b></h3><hr>
            <?php
                Draw::drawListFeaturedSites();
            ?>
        </div>
        <div class="col-sm-6">
            <h3 class="text-center"><b>USER RECOMMENDED SITES</b></h3><hr>
            <form class="text-center text-dark-purple" name="sortBy" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">SORT BY<br>
                <button type="submit" name="sort" class="btn btn-dark-purple" value="average DESC">BEST</button>
                <button type="submit" name="sort" class="btn btn-dark-purple" value="average ASC">WORST</button>
                <button type="submit" name="sort" class="btn btn-dark-purple" value="name ASC">ASC</button>
                <button type="submit" name="sort" class="btn btn-dark-purple" value="name DESC">DESC</button>
            </form>
            <hr>
            <?php
                Draw::drawListUserRecommendedSites($_POST['sort']);
            ?>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>