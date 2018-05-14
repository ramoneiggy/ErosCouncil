<?php 
include "head.php";

$sitePage = $_GET['site'];

$conn = PDOConnect::getPDOInstance();

$sql = "SELECT * FROM pornpages WHERE name = '$sitePage'";
$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);

$siteInfo = $query->fetch();

$pageID = $siteInfo['id'];
$name = $siteInfo['name'];
$url = $siteInfo['url'];
$description = $siteInfo['description'];
$logo = $siteInfo['logo'];
$images = $siteInfo['images'];
$dateAdded = $siteInfo['dateAdded'];

if ($sitePage !== $name){
    die("Site doesn't exist.");
}if($sitePage == NULL){
    die("Site doesn't exist.");
}

?>

<div class="container-fluid col-sm-12 text-left">
    <div class="row">
        <div class="d-inline-block col-sm-10">
            <h4>
                <?php 
                if (isset($_SESSION['u_id'])){
                    echo $_SESSION['u_uid']."! Welcome to - <b>".$name."</b> - profile page.";
                } else {
                echo "Welcome to - <b>".$name."</b> - profile page.<br>Please login or <a class='link-black' href='signup.php'>sign up</a>.";
                }
                ?>
            </h4>
        </div>
        <!-- FAVORITES SYSTEM -->
        <?php Draw::addRemoveFavSite($_SESSION['u_id'], $pageID); ?>
    </div>
    <hr>
    

<!--CONTENT-->

    <div class="row">
        <div class="col-sm-3">
            <div class="col-sm-12">
                <a target="_blank" href="<?php echo $url; ?>"><img class="logo-stretch" src="<?php echo $logo; ?>" alt="site-logo"></a>
                <br>
                <p><a target="_blank" class="btn btn-dark-purple" href="<?php echo $url; ?>">VISIT <?php echo $name; ?></a></p>
                <hr>
            </div>

            <!-- AVERAGE RATING -->
            <div class="col-sm-12">
                <h5>AVERAGE RATING:</h5>
                <?php Draw::drawRatingSystem($pageID); ?>
            </div>

            <!-- ADD RATING SYSTEM -->            
            <div class="col-sm-12">
                <h5>YOUR RATING:</h5>
                <?php 
                    if (isset($_SESSION['u_id'])){
                        Draw::showYourCurrentRating($pageID, $_SESSION['u_id']);                                                
                        ?>                        
                        <form action="submitRating.php" method="post">                            
                            <input type="hidden" name="pageID" value="<?php echo $pageID; ?>">
                            <input type="hidden" name="pageNameID" value="<?php echo $name; ?>">
                            <label class="ratingSys">1</label>
                            <input type="radio" name="rating" value="1">
                            <input type="radio" name="rating" value="2">
                            <input type="radio" name="rating" value="3">
                            <input type="radio" name="rating" value="4">
                            <input type="radio" name="rating" value="5">
                            <label class="ratingSys">5</label><br>                                   
                            <button type="submit" class="btn btn-dark-purple" name="submit">RATE <?php echo $name; ?></button>
                        </form>  
                        <?php
                        } else {
                        echo "Please login or <a class='link-black' href='signup.php'>sign up</a> to leave a rating.";
                    }
                ?>
                <hr>
            </div>
        </div>
        

        <!-- SITE DESCRIPTION -->
        <div class="col-sm-6">
            <div class="col-sm 12">
                <h5><?php echo "<b>".$name." description:</b>"; ?><hr></h5>
                <p><?php echo $description; ?></p>
            </div>

            <!-- REVIEWS -->
            <div class="col-sm 12">
                <h6><?php echo "<b>".$name." reviews:</b>"; ?><hr></h6>

                <!-- ADD REVIEW -->
                <?php
                if (!isset($_SESSION['u_id'])) {
                    echo "Please login or <a class='link-black' href='signup.php'>sign up</a> to leave a review.";
                } else{
                ?>
                <form action="submitReview.php" method="post">
                    <input type="hidden" name="pageID" value="<?php echo $pageID; ?>">
                    <input type="hidden" name="pageNameID" value="<?php echo $name; ?>">
                    <textarea name="review" class="form-control" placeholder="Write your review here" rows="1" required></textarea>             
                    <button type="submit" class="btn btn-dark-purple float-right" name="submit">Add review</button>
                    <br>
                </form>
                <?php } ?>
                <br>
                <hr>

                <!-- LIST REVIEWS -->
                <ul class="list-group">

                <?php
                $sql = "SELECT users.user_uid, users.avatar as avatar, comments.content, comments.PageID, comments.datePublished FROM comments INNER JOIN users ON comments.personID = users.user_id WHERE comments.PageID = $pageID ORDER BY datePublished DESC";

                $query = $conn->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $allComments = $query->fetchAll();
            
                if (empty($allComments) == true) {
                    echo "<p>No reviews yet, why don't you add one.</p>";
                }

                foreach ($allComments as $singleComment){                    
                    echo 
                    "<li class='list-group-item'>"
                    ."<a href='profile.php?user=".$singleComment["user_uid"]."'>"
                    ."<img class='avatarInReview' src='".$singleComment["avatar"]."' alt='user-avatar'> "."</a>"
                    ."<small>"."<a class='link-black' href='profile.php?user=".$singleComment["user_uid"]."'>".$singleComment["user_uid"]."</a>"." said on ".$singleComment['datePublished']."</small><br>"
                    .$singleComment["content"].
                    "</li>";            
                }         
                ?>

                </ul>
            </div>
        </div>
    </div>
</div>

<!--FOOTER-->
<?php 
include "footer.php";
?>