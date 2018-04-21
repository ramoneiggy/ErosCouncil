<?php

class Draw
{
    /*  We will use Draw class to draw different elements of
    //  the page.
    */

    
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

    public static function drawList(){
        //CODE TO DRAW LIST
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
}
