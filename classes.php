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
    public static function drawList(){
        //CODE TO DRAW LIST

        echo '
                <div class="container float">
                    <ul class="list-group">
            ';
            //Using for to draw List lines 
                    for($i=1;$i<=5;$i++){
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

                                <div class="container m-0 p-0">
                                    <div class="row">

                                        <div class="col-2">
                                            <img src="'.$pornPage["logo"].'" class="img-fluid" alt="">
                                        </div>

                                        <div class="col-8">
                                            <div class="row">
                                                <div class="col-6">
                                                    <button class="btn btn-link text-light" data-target="#description'.$i.'" data-toggle="collapse">
                                                        <h3>'.$pornPage["name"].'</h3>
                                                    </button>
                                                </div>
                                                <div class="col-6">'.self::drawStars($score).'</div>
                                                
                                            </div class="col-12">
                                            <div class="collapse text-white" id="description'.$i.'">
                                                <p>'.$pornPage["description"].'</p>
                                            </div>

                                        </div>

                                        <div class="col-2">
                                            <div class="text-center">
                                                <button class="btn">OPEN</button>
                                            </div>
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
            $code .= '<img src="Pictures/star.png" class="img-fluid">';
        }
        return $code;
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
