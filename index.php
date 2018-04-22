<?php 
include "head.php";
include "classes.php";
?>

<h2>WELCOME HOME</h2>

<?php
    if (isset($_SESSION['u_id'])){
        echo $_SESSION['u_uid'].", you are logged in!";

    }

    Draw::drawList();

?>
</body>

</html>