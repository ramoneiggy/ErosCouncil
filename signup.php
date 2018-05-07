<?php
include "head.php"; 
include "classes.php";
?>        

<!--LOG IN-->
<div class="container">
    <div class="row">  
    <div class="col-sm-12"></div>
        <div class="col-sm-6">
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

                <div class="form-group">
                    <label>Date of birth</label>
                    <input type="date" class="form-control" name="dateOfBirth" required>
                </div>                

                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                    <label>Email address again</label>
                    <input type="email" class="form-control" name="emailAgain" placeholder="Enter email again" required>
                </div>  

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
                    <label>Password again</label>
                    <input type="password" class="form-control" name="pwdAgain" placeholder="Repeat password" required>
                </div>
                
                <div class="form-group">
                    <label>Your location</label>
                    <select class="form-control" name="location" required>
                        <?php
                            $conn = PDOConnect::getPDOInstance();
                            $query = $conn->prepare("SELECT * FROM `apps_countries`");
                            $query->execute();
                            $listOfCountries = $query->fetchAll();

                            foreach ($listOfCountries as $country) {
                                echo "<option value='".$country['country_code']."'>".$country['country_name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                
                <!-- Doesn't work yet -->
                <div class="form-group">
                    <label>Profile picture</label>
                    <input type="file" class="form-control" name="avatar">
                </div>
                <!-- Doesn't work yet -->


                <small class="text-right">*All fields are required. We will never share your data with anyone.</small>
                <br>
                <button type="submit" name="submit" class="float-right btn btn-primary" value="Upload Image">Submit</button>
            
            </form>
        </div>
        <div class="col-6"></div>  
    </div>
</div>

<?php 
include "footer.php";
?>