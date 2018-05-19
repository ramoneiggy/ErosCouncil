<?php

class Draw{
    //  We will use Draw class to draw different elements of the page.

    public static function drawListUserRecommendedSites($sortBy){
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

        $query = $conn->prepare("SELECT `user_uid` as name, joined, `dateOfBirth` as dob, apps_countries.country_name as location, avatar, gender FROM `users` INNER JOIN apps_countries ON users.location = apps_countries.country_code WHERE `user_uid` = :userName");
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
            <div class='row'>
                <div class='col-sm-5'>
                <img class='avatar' src='<?php echo $userInfo['avatar']; ?>' alt='Avatar'>
                </div>
                <!-- CHANGE AVATAR -->
                <?php
                if ($userName == $_SESSION['u_uid']){
                    ?>
                    <div class='col-sm-7'>
                        <form action='submitAvatar.php' method='post' enctype='multipart/form-data'>
                        <b>Change avatar:</b>
                            <input class='btn' type='file' name='avatar' id='avatar'>
                            <input class='btn btn-dark-purple' type='submit' value='Upload Avatar' name='submit'>
                        </form>
                    </div>
                    <?php
                }
                ?>
            <!-- USER INFO -->
            </div>
            <hr>
            <p><b>User name:</b> <?php echo $userInfo['name']; ?></p><hr>
            <p><b>Gender:</b> <?php echo $userInfo['gender']; ?></p><hr>
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

class PDOConnect{

    private static $servername = "localhost"; // 127.0.0.1
    private static $username = "root";
    private static $password = "";
    private static $database = "pornreview";
    private static $pdoInstance=NULL;



    //Singleton, we only need to open connection to DB once
    public static function getPDOInstance() {
        //echo "<br><br>";
        if (self::$pdoInstance == null) { //$pdoInstance will be null if we didnt create the connection yet
          self::$pdoInstance = new PDO("mysql:dbname=".self::$database.";host=".self::$servername, self::$username, self::$password);
        }
        return self::$pdoInstance;
      }
}

