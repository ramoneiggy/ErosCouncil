<?php
session_start();
include "classes.php";

$personID = $_SESSION['u_id'];
$personName = $_SESSION['u_uid'];

$filename = $_FILES["avatar"]["name"];
$target_dir = "uploads/profilePics/".$personName."-".rand()."-";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["avatar"]["size"] > 200000) {
    echo "Sorry, your file is too large. Max 200KB.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {

        // connect to DB
        $conn = PDOConnect::getPDOInstance();        
        
        $defaultAvatar = "uploads/profilePics/user-default.png";

        // delete previous avatar image file if it is not default
        $previousAvatar = $conn->prepare("SELECT `avatar` FROM `users` WHERE `user_id` = :personID");
        $previousAvatar->bindParam(':personID', $personID);
        $previousAvatar->execute();
        $resultPreviousAvatar = $previousAvatar->fetch();

        if($resultPreviousAvatar['avatar'] !== $defaultAvatar){
            unlink($resultPreviousAvatar['avatar']);
        }

        // insert new avatar into DB        
        $query = $conn->prepare("UPDATE users SET avatar = :target_file WHERE user_id = :personID");
        $query->bindParam(':target_file', $target_file);
        $query->bindParam(':personID', $personID);        
        $query->execute();

        echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";

        header("Location: pornfolio.php?avatar=updated");
        exit();

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
header("refresh:5;url=pornfolio.php?avatar=error");
?>
<br><p>Redirecting you to your <a href="https://localhost/PornReview/pornfolio.php">PORNFOLIO</a> in 5 seconds...</p>

