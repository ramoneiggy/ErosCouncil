<?php
include "head.php";
?>

<!--LOG IN-->
<div class="container">
    <div class="row">
    <div class="col-sm-12"></div>
        <div class="col-sm-6 user-info">
            <h2>SIGN UP</h2>

            <form action="includes/signup.inc.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                <!-- ERROR REPORTS -->
                <?php
                if (array_key_exists("signup", $_GET) && $_GET["signup"] == "emailOrPasswordNotSame"){
                echo "<p class='text-red'>Email or password error. Please try again.</p>";
                }
                if (array_key_exists("signup", $_GET) && $_GET["signup"] == "invalidCharacters"){
                    echo "<p class='text-red'>Invalid characters in your choosen user name. Please choose another name and try again.</p>";
                }
                if (array_key_exists("signup", $_GET) && $_GET["signup"] == "email"){
                        echo "<p class='text-red'>Invalid e-mail. Please try again.</p>";
                }
                if (array_key_exists("signup", $_GET) && $_GET["signup"] == "usertaken"){
                            echo "<p class='text-red'>User name is taken. Please choose another name and try again.</p>";
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
                <div class="row col-sm-12">
                <!--Radio group GENDER-->
                    <div class="form-group col-sm-5">
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
                    <hr>
                    <!--Radio group SEXUAL ORIENTATION-->
                    <div class="form-group col-sm-5">
                        <label>Sexual orientation</label>
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
                    </div>
                <!--Radio group-->
                </div>
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
                <button type="submit" name="submit" class="float-right btn btn-dark-purple" value="Upload Image">Submit</button>
                <br><br>
            </form>
        </div>
        <div class="col-6"></div>
    </div>
</div>

<?php
include "footer.php";
?>