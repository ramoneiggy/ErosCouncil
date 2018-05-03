<?php 
include "head.php";
include "classes.php";

//ovaj dio bi htio prebaciti u klasu, al zasad ne ide. Nalazi se pod drawSinglePornSiteInfo
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
$dateCreated = $siteInfo['dateCreated'];

if ($sitePage !== $name){
    echo "<p>Sorry, site doesn't exist!</p>";
    die();
}

$score = 5;
?>

<div class="container-fluid text-left">
    <h4>
        <?php 
        if (isset($_SESSION['u_id'])){
            echo $_SESSION['u_uid']."! Welcome to - <b>".$name."</b> - profile page.";
        } else {
        echo "Welcome to - <b>".$name."</b> - profile page.<br>Please login or <a href='signup.php'>sign up</a>.";
        }
        ?>
    </h4>
    <hr>

<!--CONTENT-->

    <div class="row">
        <div class="col-sm-3">
            <div class="col-sm-12">
                <a target="_blank" href="<?php echo $url; ?>"><img class="logo-stretch" src="<?php echo $logo; ?>" alt="site-logo"></a>
                <br>
                <p><a target="_blank" class="btn btn-warning" href="<?php echo $url; ?>">VISIT <?php echo $name; ?></a></p>
                <hr>
            </div>
            <div class="col-sm-12">
                <p>USER RATING:</p>
                <?php Draw::drawStars($score);//ovo ne funkcionira ?><hr>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="col-sm 12">
                <h5><?php echo "<b>".$name." description:</b>"; ?><hr></h5>
                <p><?php echo $description; ?></p>
            </div>

            <!-- COMMENTS -->
            <div class="col-sm 12">
                <h6><?php echo "<b>".$name." reviews:</b>"; ?><hr></h6>
                
                <ul class="list-group">

                <?php
                $sql = "SELECT\n"

                . "    users.user_uid,\n"
            
                . "    comments.content,\n"
            
                . "    comments.PageID,\n"
            
                . "    comments.datePublished\n"
            
                . "FROM\n"
            
                . "    `comments`\n"
            
                . "INNER JOIN users ON comments.personID = users.user_id\n"
            
                . "WHERE\n"
            
                . "    comments.PageID = $pageID\n"
            
                . "ORDER BY\n"
            
                . "    datePublished\n"
            
                . "DESC";
                $query = $conn->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $allComments = $query->fetchAll();
                foreach ($allComments as $singleComment){
                    echo 
                    "<li class='list-group-item'>"
                    ."<small>".$singleComment["user_uid"]." said on ".$singleComment['datePublished']."</small><br>"
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