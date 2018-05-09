<?php
include "head.php"; 
include "classes.php";
?>        

<!--LOG IN-->
<div class="container">
    <div class="row">  
    <div class="col-sm-12"></div>
        <div class="col-sm-6 user-info">
            <h2>SIGN UP</h2>

            <form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                <?php
                if (array_key_exists("signup", $_GET) && $_GET["signup"] == "emailOrPasswordNotSame"){
                echo "<p class='text-red'>Email or password error. Please try again.</p>";
                }
                ?>             

                <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="uid" placeholder="Enter user name" required>
                </div>
                <hr>
                <div class="form-group">
                    <label>Date of birth</label>
                    <input type="date" class="form-control" name="dateOfBirth" required>
                </div>
                <hr>
                <!--Radio group-->
                <div class="form-group">
                    <label>Gender</label>
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
                </div>
                <!--Radio group--> 
                <hr>
                <div class="form-group">
                    <label>Your location</label>
                    <select class="form-control" name="location" required>
                        <?php Draw::listCountries() ?>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    <label>Email address again</label>
                    <input type="email" class="form-control" name="emailAgain" placeholder="Enter email again" required>
                </div>  
                <hr>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                    <label>Password again</label>
                    <input type="password" class="form-control" name="pwdAgain" placeholder="Repeat password" required>
                </div>
                <hr>
                <small class="text-muted">*All fields are required. We will never share your data with anyone.</small>
                <br>
                <button type="submit" name="submit" class="float-right btn btn-primary" value="Upload Image">Submit</button>
                <br><br>
            </form>
        </div>
        <div class="col-6"></div>  
    </div>
</div>

<?php 
include "footer.php";
?>