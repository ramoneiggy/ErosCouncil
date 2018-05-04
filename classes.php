<?php

class Draw
{
    /*  We will use Draw class to draw different elements of
    //  the page.
    */

    /* MISLIM DA OVO NE TREBA
    public static function drawHeader(){
        //CODE TO DRAW HEADER
        $headerCode = <<<header
        <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-2 col-4">
                        <div>
                            <img src="Pictures\logo.png" class="float-center img-thumbnail img-fluid"> 
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-8">
                        <h2 class="text-center">Porn Review</h2>
                    </div>
                    
                    <div class="col-md-4 col-12">
                        <button>LOGIN</button><br/>
                        <button>REGISTER</button>
                    
                    </div>
                </div>
            </div>
header;
        echo $headerCode;
        
    }
    */
    public static function drawListUserRecomendedSites(){
        //CODE TO DRAW LIST
        $conn = PDOConnect::getPDOInstance();
        $numberOfSites;

        $sql = "SELECT `name` FROM `pornpages`";

                $query = $conn->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $selectAll = $query->fetchAll();

        echo '
                <div class="container float col-sm-12">
                    <ul class="list-group">
            ';
            //Using for to draw List lines 
                    for($i=1;$i<=count($selectAll);$i++){
                        echo self::drawListLine($i);
                    }
        echo'    
                    </ul>
                </div>
            ';
    }

    public static function drawListLine($i){

        $score=5;

        //Create a connection to database and fetch data.
        $conn = PDOConnect::getPDOInstance();
        $query = $conn->prepare("SELECT * from pornpages WHERE id = ?");//? is a placeholder for $i, security reasons
        $query->execute([$i]);//Pass $i variable

        //This is where the actual query is executed
        $pornPage = $query->fetch();

        $listLineCode = '
                            <li class="list-group-item bg-dark">                                
                                <div class="row">

                                    <div class="col-sm-3">
                                        <a href="pornSite.php?site='.$pornPage["name"].'"><img class="logo-stretch" src="'.$pornPage["logo"].'" class="img-fluid" alt=""></a>
                                    </div>

                                    <div class="col-sm-9">

                                        <div class="row">

                                            <div class="col-sm-6 float-left">
                                                <button class="btn btn-link text-light" data-target="#description'.$i.'" data-toggle="collapse">
                                                <h3>'.$pornPage["name"].'</h3>
                                                
                                                </button>
                                            </div>
                                            <div class="col-sm-6 float-right">
                                                '.self::drawStars($score).'
                                            </div>
                                            
                                        </div>
                                        <div class="collapse text-white" id="description'.$i.'">
                                            <p>'.$pornPage["description"].'</p>
                                            <a class="btn btn-danger" href="pornSite.php?site='.$pornPage["name"].'">View '.$pornPage["name"].'</a>
                                        </div>

                                    </div>
                                </div>                                
                            </li>
                        ';

        return $listLineCode;
    }

    public static function drawListFeatured(){
        //CODE TO DRAW LIST OF FEATURED PAGES
    }

    public static function drawLoginForm(){
        //CODE TO DRAW LOGIN OVERLAY
    }

    public static function drawRegistrationForm(){
        //CODE TO DRAW REGISTRATION OVERLAY
    }

    public static function drawStars($score){
        $code = '';
        for($i=0;$i<$score;$i++){
            $code .= '<img class="float-right" src="Pictures/star.png" class="img-fluid">';
        }
        return $code;
    }

    /*public function drawSinglePornSiteInfo(){
        //CODE TO DRAW SINGLE PORN SITE INFO
        $sitePage = $_GET['site'];

        $pdo = PDOConnect::getPDOInstance();

        $sql = "SELECT * FROM pornpages WHERE name = '$sitePage'";
        $q = $pdo->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);

        $siteInfo = $q->fetch();

        function __construct($id, $name, $url, $description, $logo, $images, $dateAdded, $dateCreated) {

            $this->name = $name;
            $this->url = $url;
            $this->description = $description;
            $this->logo = $logo;
            $this->images = $images;
            $this->dateAdded = $dateAdded;
            $this->dateCreated = $dateCreated;
        $name = $siteInfo['name'];
        $url = $siteInfo['url'];
        $description = $siteInfo['description'];
        $logo = $siteInfo['logo'];
        $images = $siteInfo['images'];
        $dateAdded = $siteInfo['dateAdded'];
        $dateCreated = $siteInfo['dateCreated'];
        }

        if ($sitePage !== $name){
            echo "<p>Sorry, site doesn't exist!</p>";
            die();
        }
    }*/

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

