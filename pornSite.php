<?php 
include "head.php";
include "classes.php";
$sitePage = $_GET['site'];
?>

<div class="container-fluid text-left">
    <h4>
        <?php 
        if (isset($_SESSION['u_id'])){
            echo $_SESSION['u_uid']."! Welcome to -".$sitePage. "- profile page.";
        } else {
        echo "Welcome to -".$sitePage. "- profile page.<br>Please login or <a href='signup.php'>sign up</a>.";
        }
        ?>
    </h4>

<!--CONTENT-->

<div class="row">
    <?php
    Draw::drawList();
    ?>
</div>










<!--FOOTER-->
<?php 
include "footer.php";
?>