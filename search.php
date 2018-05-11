<?php
include "head.php";
$conn = PDOConnect::getPDOInstance();
?>

<div class="container-fluid col-11 user-info">
    <h3>SEARCH RESULTS FOR "<?php echo $_POST['search']; ?>":</h3><hr>
    <h4>SITES</h4><hr>
    <div>
    <?php
        if (isset($_POST['submit'])){
            if(strlen($_POST['search']) < 3){
                echo "Search query too short.";
            }else{

            //give variables
        
            $searchQuery = $_POST['search'];
        
            //check if porn site exists in DB
        
            $check = $conn->prepare("SELECT `name` FROM `pornpages` WHERE `name` LIKE ?");
            $check->execute(array("%$searchQuery%"));
            $result = $check->fetchAll(PDO::FETCH_ASSOC);

            if($result == NULL){
                echo "no results";
            }
        
            foreach($result as $pornSite){
                ?>                
                <a class ="link-black" href="pornSite.php?site=<?php echo $pornSite['name']; ?>"><?php echo $pornSite['name']; ?></a><br>
                <?php
            }
            }
        }
    ?>
    </div>
    <br><br>
    <h4>USERS</h4><hr>
    <div>
    <?php
        if (isset($_POST['submit'])){
            if(strlen($_POST['search']) < 3){
                echo "Search query too short.";
            }else{

            //give variables
        
            $searchQuery = $_POST['search'];
        
            //check if porn site exists in DB
        
            $check = $conn->prepare("SELECT `user_uid` FROM users WHERE `user_uid` LIKE ?");
            $check->execute(array("%$searchQuery%"));
            $result = $check->fetchAll(PDO::FETCH_ASSOC);

            if($result == NULL){
                echo "no results";
            }
        
            foreach($result as $user){
                ?>                
                <a class ="link-black" href="profile.php?site=<?php echo $user['user_uid']; ?>"><?php echo $user['user_uid']; ?></a><br>
                <?php
            }
        }
        }
    ?>
    <br><br>
    </div>
</div>
<?php 
include "footer.php";
?>