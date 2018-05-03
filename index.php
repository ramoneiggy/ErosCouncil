<?php 
include "head.php";
include "classes.php";
?>

<div class="container-fluid text-left">
    <h4>Welcome home <?php if (isset($_SESSION['u_id'])){echo $_SESSION['u_uid']."! How's it hangin'?";}else{echo "- please login or <a href='signup.php'>sign up</a>.";}?></h4>
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
            <h5><b>STAFF FAVORITES:</b></h3><hr><!--  treba napraviti klasu za ovo -->
            <?php
                Draw::drawList();
            ?>
        </div>
        <div class="col-sm-6">
            <h5><b>USER RECOMENDED SITES:</b></h3><hr>
            <?php
                Draw::drawList();
            ?>
        </div>
    </div>
</div>




<?php 
include "footer.php";
?>