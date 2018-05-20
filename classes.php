<?php

class PDOConnect{

    private static $servername = "localhost"; // 127.0.0.1
    private static $username = "root";
    private static $password = "";
    private static $database = "pornreview";
    private static $pdoInstance=NULL;

    //Singleton, we only need to open connection to DB once
    public static function getPDOInstance() {
        //echo "<br><br>";
        if (self::$pdoInstance == null) { //$pdoInstance will be null if we didn't create the connection yet
          self::$pdoInstance = new PDO("mysql:dbname=".self::$database.";host=".self::$servername, self::$username, self::$password);
        }
        return self::$pdoInstance;
      }
}

class test{

    public static function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

class Check{

    public static function ifAdmin($personID){
        //CHECK IF USER IS ADMIN

        $conn = PDOConnect::getPDOInstance();
        $query = $conn->prepare("SELECT isAdmin FROM users where user_id = :personID");
        $query->bindParam(':personID', $personID);
        $query->execute();
        $isAdmin = $query->fetch('0');

        return $isAdmin[0];

    }

}

class Draw{
    //  We will use Draw class to draw different elements of the page.

    public static function drawListUserRecommendedSites($sortBy){

        $sortBy = test::input($sortBy);
        //CODE TO DRAW LIST OF ALL SITES

        $conn = PDOConnect::getPDOInstance();

        if ($sortBy == NULL){
            $sortBy = "average DESC";
        }

        $sql = "SELECT pornpages.id as id ,pornpages.name as name, pornpages.logo, AVG(`rating`) AS average FROM pornpages JOIN ratingscore ON ratingscore.PageID = pornpages.id GROUP By `PageID` ORDER BY $sortBy";

        $query = $conn->query($sql);

        $query->setFetchMode(PDO::FETCH_ASSOC);
        $pornPages = $query->fetchAll();

        echo '
        <div class="container col-lg-8">
            <ul class="list-group">
            ';
        foreach ($pornPages as $pornPage){
            echo "<li class='list-group-item bg-dark'>";
            //LOGO
            echo "<div class='col-sm-4 float-left'><a href='pornSite.php?site=".$pornPage['name']."'>"."<img class='float-left img-fluid logo-stretch' src='".$pornPage['logo']."' alt=porn-site-logo'></a></div>";
            //NAME
            echo "<div class='col-sm-4 float-left'><a class='float-left link-white' href='pornSite.php?site=".$pornPage['name']."'><h3>".$pornPage['name']."</h3></a></div>";
            //RATING
            echo "<div class='col-sm-4 float-left'>";
            Draw::drawRatingSystem($pornPage['id']);
            echo "</div>";
            echo "</li>";
        }
        echo'
            </ul>
        </div>
            ';
    }

    public static function drawListFeaturedSites(){
        //CODE TO DRAW LIST OF FEATURED PAGES
        $conn = PDOConnect::getPDOInstance();
        $sql = "SELECT pornpages.id as id ,pornpages.name as name, pornpages.logo, AVG(`rating`) AS average FROM pornpages
        JOIN ratingscore ON ratingscore.PageID = pornpages.id WHERE `isFeatured` = 1
        GROUP By `PageID` ORDER BY AVG(`rating`) DESC ";
        $query = $conn->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $pornPages = $query->fetchAll();

        echo '
        <div class="container col-lg-8">
            <ul class="list-group">
            ';
        foreach ($pornPages as $pornPage){
            echo "<li class='list-group-item bg-featured'>";
            //LOGO
            echo "<div class='col-sm-4 float-left'><a href='pornSite.php?site=".$pornPage['name']."'>"."<img class='float-left img-fluid logo-stretch' src='".$pornPage['logo']."' alt=porn-site-logo'></a></div>";
            //NAME
            echo "<div class='col-sm-4 float-left'><a class='float-left link-white' href='pornSite.php?site=".$pornPage['name']."'><h3>".$pornPage['name']."</h3></a></div>";
            //RATING
            echo "<div class='col-sm-4 float-left'>";
            Draw::drawRatingSystem($pornPage['id']);
            echo "</div>";
            echo "</li>";
        }
        echo'
            </ul>
        </div>
            ';
    }

    public static function drawRatingSystem($i){
        //CODE TO DRAW RATING SYSTEM

        $conn = PDOConnect::getPDOInstance();
        $query = $conn->prepare("SELECT `PageID`, ROUND(avg(`rating`)) as avgRating FROM `ratingscore` WHERE PageID = :pornPageID");
        $query->bindParam(':pornPageID', $i);
        $query->execute();

        $siteAvgRating = $query->fetch();
        $rating = $siteAvgRating['avgRating'];
        $starSymbol = "&#9734;";

        echo '<p class="ratingSys">';
        for ($i=1; $i<=$rating; $i++) {
            echo $starSymbol;
        }
        echo '</p>';
    }

    public static function showYourCurrentRating($pageID, $personID) {
        //SHOW USERS CURRENT RATING OF PORN SITE

        $conn = PDOConnect::getPDOInstance();

        $query = $conn->prepare("SELECT ratingscore.rating FROM ratingscore WHERE ratingscore.personID = :personID AND ratingscore.PageID = :pornPageID");

        $query->bindParam(':pornPageID', $pageID);
        $query->bindParam(':personID', $personID);
        $query->execute();

        $rating = $query->fetch();

        $starSymbol = "&#9734;";

        echo '<p class="ratingSys">';
        for ($i=1; $i<=$rating['rating']; $i++) {
            echo $starSymbol;
        }
        echo '</p>';

        if ($rating['rating'] == NULL){
            echo "Please leave a rating.<br>You can change it anytime.";
        }
    }

    // USER INFO
    public static function userInfo($userName){
        //CODE TO DRAW USER INFO

        $conn = PDOConnect::getPDOInstance();

        $query = $conn->prepare("SELECT `user_uid` as name, joined, sexual_orientation.TITLE as sexOrientation, `dateOfBirth` as dob, user_email, apps_countries.country_name as location, avatar, gender FROM `users` INNER JOIN apps_countries ON users.location = apps_countries.country_code INNER JOIN sexual_orientation ON sexOrientation = sexual_orientation.ID WHERE `user_uid` = :userName");
        $query->bindParam(':userName', $userName);
        $query->execute();
        $userInfo = $query->fetch();

        if($userInfo['name'] == NULL){
            die("User doesn't exist.");
        }

        $now = date("Y-m-d H:i:s");

        $userInfoAge = ($now-$userInfo['dob']);

        ?>
        <div class='user-info col-sm-12'>
        <?php
            if (array_key_exists("error", $_GET)) {
                echo "<p class='text-red'>An error occurred, please try again</p>";
            }
            ?>
            <div class='row'>
                <div class='col-sm-5'>
                <img class='avatar' src='<?php echo $userInfo['avatar']; ?>' alt='Avatar'>
                </div>

            <!-- USER INFO -->
            </div>
            <hr>
            <p><b>User name:</b> <?php echo $userInfo['name']; ?></p><hr>
            <p><b>Gender:</b> <?php echo $userInfo['gender']; ?></p><hr>
            <p><b>Sexual orientation:</b> <?php echo $userInfo['sexOrientation']; ?></p><hr>

            <!-- show only for portfolio -->
            <?php
            if ($userName == $_SESSION['u_uid']){
                ?>
                <a class="link-black" data-toggle="collapse" href="#changeData" role="button"><b>CHANGE YOUR AVATAR & INFO</b></a>
                <!-- <br><small>Avatar, E-mail, Password, Gender, Orientation, Location</small> -->
                <div class="collapse" id="changeData">
                    <button class='btn btn-dark-purple' type="button" data-toggle="collapse" data-target="#Avatar">Avatar</button>
                    <button class='btn btn-dark-purple' type="button" data-toggle="collapse" data-target="#E-mail">E-mail</button>
                    <button class='btn btn-dark-purple' type="button" data-toggle="collapse" data-target="#Password">Password</button>
                    <br><br>
                    <button class='btn btn-dark-purple' type="button" data-toggle="collapse" data-target="#Gender">Gender</button>
                    <button class='btn btn-dark-purple' type="button" data-toggle="collapse" data-target="#SexualOrientation">Sexual orientation</button>
                    <button class='btn btn-dark-purple' type="button" data-toggle="collapse" data-target="#Location">Location</button>

                    <br><br>

                    <div class="collapse" id="Avatar">
                        <div class="card card-body">
                            <form action='submitAvatar.php' method='post' enctype='multipart/form-data'>
                                <label><b>Change avatar:</b></label><br>
                                <input class='btn' type='file' name='avatar' id='avatar' required>
                                <input class='btn btn-dark-purple' type='submit' value='Upload Avatar' name='submit'>
                            </form>
                        </div>
                    </div>

                    <div class="collapse" id="E-mail">
                        <div class="card card-body">
                            <form action="infoChange/changeEmail.php" method="post">
                                <div class="form-group">
                                    <label><b>Email address</b></label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                                    <label><b>Email address again</b></label>
                                    <input type="email" class="form-control" name="emailAgain" placeholder="Enter email again" required>
                                    <button type="submit" name="submit" class="float-right btn btn-dark-purple">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="collapse" id="Password">
                        <div class="card card-body">
                            <form action="infoChange/changePassword.php" method="post">
                                <div class="form-group">
                                    <label><b>Old password</b></label>
                                    <input type="password" class="form-control" name="oldPwd" placeholder="Old password" required>
                                    <label><b>New password</b></label>
                                    <input type="password" class="form-control" name="newPwd" placeholder="New password" required>
                                    <label><b>New password again</b></label>
                                    <input type="password" class="form-control" name="newPwdAgain" placeholder="New password again" required>
                                    <button type="submit" name="submit" class="float-right btn btn-dark-purple">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="collapse" id="Gender">
                        <div class="card card-body">
                            <form action="infoChange/changeGender.php" method="post">
                            <div class="form-group col-sm-5">
                                <label><b>Gender</b></label>
                                <div class="form-check">
                                    <input name="gender" type="radio" class="with-gap" value="male">
                                    <label for="male">Male</label>
                                </div>

                                <div class="form-check">
                                    <input name="gender" type="radio" class="with-gap" value="female">
                                    <label for="female">Female</label>
                                </div>

                                <div class="form-check">
                                    <input name="gender" type="radio" class="with-gap" value="other">
                                    <label for="other">Other</label>
                                </div>
                                <button type="submit" name="submit" class="float-right btn btn-dark-purple">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="collapse" id="SexualOrientation">
                        <div class="card card-body">
                        <form action="infoChange/changeSexOrientation.php" method="post">
                            <div class="form-group col-sm-5">
                                <label><b>Sexual orientation</b></label>
                                <div class="form-check">
                                    <input name="sexOrientation" type="radio" class="with-gap" value="1">
                                    <label for="1">Heterosexual</label>
                                </div>

                                <div class="form-check">
                                    <input name="sexOrientation" type="radio" class="with-gap" value="2">
                                    <label for="2">Homosexual</label>
                                </div>

                                <div class="form-check">
                                    <input name="sexOrientation" type="radio" class="with-gap" value="3">
                                    <label for="3">Bisexual</label>
                                </div>

                                <div class="form-check">
                                    <input name="sexOrientation" type="radio" class="with-gap" value="4">
                                    <label for="4">Undefined</label>
                                </div>
                                <button type="submit" name="submit" class="float-right btn btn-dark-purple">Submit</button>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="collapse" id="Location">
                        <div class="card card-body">
                            <form action="infoChange/changeLocation.php" method="post">
                                <div class="form-group">
                                    <label><b>Your location</b></label>
                                    <select class="form-control" name="location" required>
                                        <?php Draw::listCountries() ?>
                                    </select>
                                    <button type="submit" name="submit" class="float-right btn btn-dark-purple">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <p><b>E-mail:</b> <?php echo $userInfo['user_email']; ?></p><hr>
                <p><b>Date of birth:</b> <?php echo $userInfo['dob']; ?></p><hr>
            <?php } ?>

            <p><b>Age:</b> <?php echo $userInfoAge; ?></p><hr>
            <p><b>Location:</b> <?php echo $userInfo['location']; ?></p><hr>
            <p><b>Joined:</b> <?php echo $userInfo['joined']; ?></p><hr>
        </div>
        <?php
    }

    public static function userPornRatings($userName){
        //SHOW USER'S PORN STAR RATINGS

        $conn = PDOConnect::getPDOInstance();

        $id = $conn->prepare("SELECT `user_id` FROM `users` WHERE `user_uid` = :userName");
        $id->bindParam(':userName', $userName);
        $id->execute();
        $id = $id->fetch();
        $personID = htmlspecialchars($id['user_id']);

        $query = $conn->prepare("SELECT pornpages.id as id, pornpages.name as name, pornpages.url as url, pornpages.logo as logo, ratingscore.rating as rating FROM pornpages INNER JOIN ratingscore ON pornpages.id = ratingscore.PageID WHERE ratingscore.personID = :personID GROUP BY name ORDER BY rating DESC ");
        $query->bindParam(':personID', $personID);
        $query->execute();
        $pornPages = $query->fetchAll();

        if ($pornPages == NULL){
            echo "No ratings yet";
        }
        echo '
            <ul class="list-group">
            ';
        foreach ($pornPages as $pornPage){
            echo "<li class='list-group-item bg-dark'>";
            //LOGO
            echo "<div class='col-sm-4 float-left'><a href='pornSite.php?site=".$pornPage['name']."'>"."<img class='float-left img-fluid logo-stretch' src='".$pornPage['logo']."' alt=porn-site-logo'></a></div>";
            //NAME
            echo "<div class='col-sm-4 float-left'><a class='float-left link-white' href='pornSite.php?site=".$pornPage['name']."'><h3>".$pornPage['name']."</h3></a></div>";
            //RATING
            echo "<div class='col-sm-4 float-left'>";
            Draw::showYourCurrentRating($pornPage['id'], $personID);
            echo "</div>";
            echo "</li>";
        }
        echo'
            </ul>
            <br>
            ';
    }

    public static function showUsersReviews($userName){
        //CODE TO DRAW USERS REVIEWS

        $conn = PDOConnect::getPDOInstance();

        $id = $conn->prepare("SELECT `user_id` FROM `users` WHERE `user_uid` = :userName");
        $id->bindParam(':userName', $userName);
        $id->execute();
        $id = $id->fetch();
        $personID = $id['user_id'];

        $sql = "SELECT users.user_id as personID, users.user_uid as personName, pornpages.id as pornpageID, pornpages.name as pornpageName, comments.content as review, comments.datePublished as dateTime FROM `comments`
        INNER JOIN users on comments.personID = users.user_id
        INNER JOIN pornpages on comments.PageID = pornpages.id
        WHERE personID = $personID
        ORDER BY dateTime DESC";

        $query = $conn->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $allComments = $query->fetchAll();

        if (empty($allComments) == true) {
        echo "<p>No reviews yet.</p>";
        }

        foreach ($allComments as $singleComment){
        echo
        "<li class='list-group-item'>"
        ."<small>Reviewed "."<a href='pornSite.php?site=".$singleComment['pornpageName']."'>".$singleComment['pornpageName']."</a> on ".$singleComment['dateTime']."</small><br>"
        .$singleComment["review"].
        "</li>";
        }
    }

    // COUNTRIES DB
    public static function listCountries(){
        //CODE TO DRAW A LIST OF COUNTRIES

        $conn = PDOConnect::getPDOInstance();
        $query = $conn->prepare("SELECT * FROM `apps_countries`");
        $query->execute();
        $listOfCountries = $query->fetchAll();

        foreach ($listOfCountries as $country) {
            echo "<option value='".$country['country_code']."'>".$country['country_name']."</option>";
        }
    }

    // ACTIVE NAV CLASS
    public static function echoActiveClassIfRequestMatches($requestUri){
        //GIVE CLASS "ACTIVE" TO NAV LINK
        $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
        if ($current_file_name == $requestUri){
            echo "active font-effect-neon";
        }
    }

    public static function emptyActiveClass(){
        //NEED TO FIND A BETTER WAY FOR echoActiveClassIfRequestMatches & emptyActiveClass
        if($_SERVER['REQUEST_URI'] == '/PornReview/'){
            echo "active font-effect-neon";
        }
    }

    // ADD SITE TO FAVORITE
    public static function addRemoveFavSite($personID, $pageID){

        $conn = PDOConnect::getPDOInstance();

        $query = $conn->prepare("SELECT * FROM userfavorites WHERE userID = :personID AND pornPageID = :pageID");
        $query->bindParam(':personID', $personID);
        $query->bindParam(':pageID', $pageID);
        $query->execute();
        $favorites = $query->fetch();

        ?><form action="" method="post"><?php
        if($favorites == NULL){
            ?>
            <div class="d-inline-block col-sm-2 text-left">
                <button value="add" type="submit" name="submit" class="btn btn-dark-purple-fav" >&#9734; ADD TO FAVORITES</button>
            </div>
            <?php
        }else{
            ?>
            <div class="d-inline-block col-sm-2 text-left">
                <button value="remove" type="submit" name="submit" class="btn btn-dark-purple-fav" >&#9734; REMOVE FROM FAVORITES</button>
            </div>
            <?php
        }
        ?></form><?php

        if (isset($_POST['submit'])){

            $addRemove = $_POST['submit'];

            if($addRemove == 'add'){
                $addRemove = $conn->prepare("INSERT INTO `userfavorites`(`userID`, `pornPageID`) VALUES (:personID, :pageID)");
                $addRemove->bindParam(':personID', $personID);
                $addRemove->bindParam(':pageID', $pageID);
                $addRemove->execute();
            }elseif($addRemove == 'remove'){
                $addRemove = $conn->prepare("DELETE FROM `userfavorites` WHERE `userID` = :personID AND `pornPageID` = :pageID");
                $addRemove->bindParam(':personID', $personID);
                $addRemove->bindParam(':pageID', $pageID);
                $addRemove->execute();
            }
            header("Refresh:0");
        }
    }

    // LIST USER FAVORITES
    public static function listFavorites($userName){

        $conn = PDOConnect::getPDOInstance();
        $query = $conn->prepare("SELECT userfavorites.userID as personID, pornpages.name as pornSite, pornpages.logo as pornLogo FROM `userfavorites` INNER JOIN pornpages ON userfavorites.pornPageID = pornpages.id WHERE `userID` = (SELECT users.user_id FROM users WHERE users.user_uid = :userName)");
        $query->bindParam(':userName', $userName);
        $query->execute();
        $favorites = $query->fetchAll();

        ?><ul class="list-inline"><?php
        if($favorites == NULL){
            echo "<p><b>No favorites yet...</b></p>";
        }
        foreach($favorites as $favorite){
        ?><li class="list-inline-item"><a href="pornSite.php?site=<?php echo $favorite['pornSite'] ?>"><img class="user-favorite-site-logo" src="<?php echo $favorite['pornLogo']; ?>" alt="porn-site-logo"></a></li><?php
        }
        ?></ul><?php

    }
}