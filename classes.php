<?php

class Draw
{
    //  We will use Draw class to draw different elements of the page.


    public static function drawListUserRecomendedSites($sortBy){
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
        <div class="container col-sm-8">
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
        <div class="container col-sm-8">
            <ul class="list-group">
            ';
        foreach ($pornPages as $pornPage){
            echo "<li class='list-group-item bg-info'>";
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

    public static function userPornRatings(){
        //SHOW USER'S PORN STAR RATINGS

        $conn = PDOConnect::getPDOInstance();

        $query = $conn->prepare("SELECT pornpages.id as id, pornpages.name as name, pornpages.url as url, pornpages.logo as logo, ratingscore.rating as rating FROM pornpages
        INNER JOIN ratingscore ON pornpages.id = ratingscore.PageID
        WHERE ratingscore.personID = :personID
        GROUP BY name ORDER BY rating DESC");

        $query->bindParam(':personID', $_SESSION['u_id']);

        $query->execute();

        $pornPages = $query->fetchAll();

        if ($pornPages == NULL){
            echo "You've not rated anything yet, why don't you go and rate something ;)";
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
            Draw::showYourCurrentRating($pornPage['id'], $_SESSION['u_id']);
            echo "</div>";
            echo "</li>";
        }
        echo'    
            </ul>
            ';
    }

    public static function showUsersReviews($personID){
        //CODE TO DRAW USERS REVIEWS

        $conn = PDOConnect::getPDOInstance();

        $sql = "SELECT users.user_id as personID, users.user_uid as personName, pornpages.id as pornpageID, pornpages.name as pornpageName, comments.content as review, comments.datePublished as dateTime FROM `comments`
        INNER JOIN users on comments.personID = users.user_id
        INNER JOIN pornpages on comments.PageID = pornpages.id
        WHERE personID = $personID
        ORDER BY dateTime DESC";

        $query = $conn->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $allComments = $query->fetchAll();

        if (empty($allComments) == true) {
        echo "<p>No reviews yet, why don't you go and add one.</p>";
        }

        foreach ($allComments as $singleComment){                    
        echo 
        "<li class='list-group-item'>"
        ."<small>You reviewed "."<a href='pornSite.php?site=".$singleComment['pornpageName']."'>".$singleComment['pornpageName']."</a> on ".$singleComment['dateTime']."</small><br>"
        .$singleComment["review"].
        "</li>";                    
        }
    }

    public static function userInfo($personID){
        //CODE TO DRAW USER INFO

        $conn = PDOConnect::getPDOInstance();

        $query = $conn->prepare("SELECT `user_uid` as name, joined, `dateOfBirth` as dob, apps_countries.country_name as location, avatar, gender, `user_email` as email FROM `users` INNER JOIN apps_countries ON users.location = apps_countries.country_code WHERE `user_id` = :personID");
        $query->bindParam(':personID', $personID);
        $query->execute();
        $userInfo = $query->fetch(); 

        $now = date("Y-m-d H:i:s");

        $userInfoAge = ($now-$userInfo['dob']);

        echo "
            <div class='user-info col-sm-12'>
                <div class='row'>
                    <div class='col-sm-4'>
                        <img class='avatar' src='".$userInfo['avatar']."' alt='Avatar'>
                    </div>
                    ";
                    if(array_key_exists("avatar", $_GET) && $_GET["avatar"] == "updated"){
                        echo "<p class='text-green'>Avatar updated!</p>";
                    }
                echo " 
                    
                    <div class='col-sm-8'>
                        <form action='submitAvatar.php' method='post' enctype='multipart/form-data'>
                        <b>Change avatar:</b>
                            <input class='btn' type='file' name='avatar' id='avatar'>
                            <input class='btn btn-warning' type='submit' value='Upload Avatar' name='submit'>
                        </form>
                    </div>
                </div>    
                <hr>
                <p><b>User name:</b> ".$userInfo['name']."</p><hr>
                <p><b>Gender:</b> ".$userInfo['gender']."</p><hr>
                <p><b>E-mail:</b> ".$userInfo['email']."</p><hr>
                <p><b>Date of birth:</b> ".$userInfo['dob']."&nbsp;&nbsp;&nbsp;<b>Age:</b> ".$userInfoAge."</p><hr>
                <p><b>Location:</b> ".$userInfo['location']."</p><hr>
                <p><b>Joined:</b> ".$userInfo['joined']."</p><hr>
            </div>
            ";

    }

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

    public static function drawLoginForm(){
        //CODE TO DRAW LOGIN OVERLAY
    }

    public static function drawRegistrationForm(){
        //CODE TO DRAW REGISTRATION OVERLAY
    }

}

class Check
{
    
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

class PDOConnect
{   

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

