<?php 
include "head.php";
include "classes.php";

if ($_SESSION['u_uid'] !== "adminFaca" && $hashedPwdCheck !== "PustiMe#123"){
    die("<p>RESTRICTED, GO AWAY!!!</p>");//smisliti bolji naćin za ovo
}else{
    echo "<br>WELCOME MR. ADMINISTRATOR!<hr><br>";

}
?>

 <!-- ADD PORN SITE TO DB -->
<div class="container-fluid">
    <div class="row">
        
        <div class="col-sm-3">

            <h4 class="text-center">ADD PORN SITE TO DATABASE</h4><hr>

            <form class="form-control" action="addSiteToDB.php" method="post">

                <label for="name">Porn site name</label><br>
                <input class="form-control" type="text" name="name" required><br>

                <label for="url">Porn site url</label><br>
                <input class="form-control" type="url" name="url" required>            
                <small class="form-text text-muted">Url must be like https://www.example.com</small><br>

                <label for="description">Porn site description</label><br>
                <textarea class="form-control" type="text" name="description" row="3" required></textarea><br>

                <label for="logo">Porn site logo</label><br>
                <input class="form-control" type="url" name="logo" required>
                <small class="form-text text-muted">Url must be like https://www.example.com</small><br>

                <label for="images">Porn site image</label><br>
                <input class="form-control" type="url" name="images" required>
                <small class="form-text text-muted">Url must be like https://www.example.com</small><br>

                <label for="dateAdded">Date when the site was added to our DB</label><br>
                <input class="form-control" type="date" name="dateAdded" required><br>

                <label for="dateCreated">Date when porn site was created</label><br>
                <input class="form-control" type="date" name="dateCreated" required><br>
                <button type="submit" class="btn btn-warning" name="submit">Add site</button>

                <small class="form-text text-muted text-right">*All fields are required. Make sure you entered everything correctly!</small>
                

            </form>
        </div>

        <div class="col-sm-3"><h4 class="text-center">EMPTY FOR NOW</h4><hr></div>
        <div class="col-sm-3"><h4 class="text-center">EMPTY FOR NOW</h4><hr></div>
        <div class="col-sm-3"><h4 class="text-center">EMPTY FOR NOW</h4><hr></div>
    </div>
</div>

<?php 
include "footer.php";
?>