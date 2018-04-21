<?php include "head.php";?>

<h2>WELCOME HOME</h2>

<?php
    if (isset($_SESSION['u_id'])){
        echo $_SESSION['u_uid'].", you are logged in!";

    }
?>

</body>

</html>