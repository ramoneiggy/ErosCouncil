<?php
include "head.php";
?>

<div class="container-fluid text-left">
    <?php
        if (Check::ifAdmin(htmlspecialchars($_SESSION['u_id'])) == 1){
            echo "<h3>WELCOME MR. ADMINISTRATOR!<hr></h3>";
        }else{
            die("<h3>RESTRICTED, GO AWAY!!!<hr></h3>");
        }
    ?>
</div>

<div class="container-fluid">
    <div class="row">
         <!-- ADD PORN SITE TO DB -->
        <div class="col-sm-3">

            <h4 class="text-center">ADD PORN SITE TO DATABASE</h4><hr>

            <form class="form-control" action="submitSiteToDB.php" method="post">
                <?php
                    if (array_key_exists("site", $_GET) && $_GET["site"] == "alreadyExists"){
                        echo "<p class='text-center text-red'>ERROR: Site already exists in DB.</p>";
                    }if (array_key_exists("site", $_GET) && $_GET["site"] == "added"){
                        echo "<p class='text-center text-green'>Site added successfully to DB.<br><a href='pornSite.php?site=".$_GET['name']."'>Click HERE to give the site a rating so that it can be seen on the homepage.</a></p>";
                    }if (array_key_exists("site", $_GET) && $_GET["site"] == "nameError"){
                        echo "<p class='text-center text-red'>ERROR: Please read guidelines about proper name input.</p>";
                    }
                ?>
                <br>

                <label for="name">Porn site name*</label><br>
                <input class="form-control" type="text" name="name" required>
                <small class="form-text text-muted">Make sure site name doesn't have links, dots... Write just the name of the site.</small><br>

                <label for="url">Porn site url*</label><br>
                <input class="form-control" type="url" name="url" required>
                <small class="form-text text-muted">Url must be like http://www.example.com</small><br>

                <label for="description">Porn site description*</label><br>
                <textarea class="form-control" type="text" name="description" row="3" required></textarea><br>

                <label for="logo">Porn site logo*</label><br>
                <input class="form-control" type="url" name="logo" required>
                <small class="form-text text-muted">Url must be like http://www.example.com</small><br>

                <label for="images">Porn site image</label><br>
                <input class="form-control" type="url" name="images">
                <small class="form-text text-muted">Url must be like http://www.example.com</small><br>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="isFeatured">
                    <label class="form-check-label" for="defaultCheck1">Is porn site "STAFF FAVORITE"?</label>
                </div>

                <br>
                <p class="lead">When you submit the porn site you <b>MUST</b> give the site a rating for it to show on the home page.</p>

                <button type="submit" class="btn btn-dark-purple" name="submit">Add site</button>

                <small class="form-text text-muted text-right">* fields are required. Make sure you entered everything correctly!</small>

            </form>

        </div>

        <div class="col-sm-1">
            <h4 class="text-center">ALL USERS</h4><hr>
            <div class="user-info">
                <?php

                $conn = PDOConnect::getPDOInstance();
                $check = $conn->prepare("SELECT `user_uid` FROM users ORDER BY LOWER(user_uid)");
                $check->execute(array());
                $result = $check->fetchAll(PDO::FETCH_ASSOC);

                foreach($result as $user){
                    ?>
                    <a class ="link-black" href="profile.php?user=<?php echo $user['user_uid']; ?>"><?php echo $user['user_uid']; ?></a><br>
            <?php } ?>
            <br>
            </div>
        </div>
        <div class="col-sm-1"><h4 class="text-center">ALL SITES</h4><hr>
            <div class="user-info">
                <?php

                $conn = PDOConnect::getPDOInstance();
                $check = $conn->prepare("SELECT name FROM pornpages ORDER BY LOWER(name)");
                $check->execute(array());
                $result = $check->fetchAll(PDO::FETCH_ASSOC);

                foreach($result as $pornSite){
                    ?>
                    <a class ="link-black" href="pornSite.php?site=<?php echo $pornSite['name']; ?>"><?php echo $pornSite['name']; ?></a><br>
            <?php } ?>
            <br>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>