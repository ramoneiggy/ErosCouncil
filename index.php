<?php 
include "head.php";
include "classes.php";
?>

<div class="container-fluid text-left">
    <h4>Welcome home <?php if (isset($_SESSION['u_id'])){echo $_SESSION['u_uid']."! How's it hangin'?";}else{echo "- please login or <a class='link-black' href='signup.php'>sign up</a>.";}?></h4>
    <?php
        if (array_key_exists("signup", $_GET) && $_GET["signup"] == "success"){
            echo "<p>Congratulations, you have successfully signed up, now please login.</p>";
        }
    ?>
</div>
<hr>


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h5 class="text-center"><b>STAFF FAVORITES</b></h5><hr>
            <?php                
                Draw::drawListFeaturedSites();
            ?>
        </div>
        <div class="col-sm-6">
            <h5 class="text-center"><b>USER RECOMENDED SITES</b></h5>
            <form class="text-center ratingSys" name="sortBy" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">SORT BY:
                <button type="submit" name="sort" class="btn btn-warning" value="average DESC">BEST</button>
                <button type="submit" name="sort" class="btn btn-warning" value="average ASC">WORST</button>
                <button type="submit" name="sort" class="btn btn-warning" value="name ASC">NAME ASC</button>
                <button type="submit" name="sort" class="btn btn-warning" value="name DESC">NAME DESC</button>
            </form>
            <hr>
            <?php
                Draw::drawListUserRecomendedSites($_POST['sort']);
            ?>
        </div>
    </div>
</div>




<?php 
include "footer.php";
?>