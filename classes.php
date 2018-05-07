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

        $sql = "SELECT pornpages.id as id ,pornpages.name as name, pornpages.logo, AVG(`rating`) AS average FROM pornpages
        JOIN ratingscore ON ratingscore.PageID = pornpages.id
        GROUP By `PageID` ORDER BY $sortBy";
        
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

    public static function drawLoginForm(){
        //CODE TO DRAW LOGIN OVERLAY
    }

    public static function drawRegistrationForm(){
        //CODE TO DRAW REGISTRATION OVERLAY
    }

}

class PDOConnect
{   

    private static $servername = "localhost"; // 127.0.0.1
    private static $username = "root";
    private static $password = "";
    private static $database = "loginsystem";
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

